<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\User;
use App\OpResident;
use App\States;
use App\Areas;
class AplicationController extends Controller
{
    //
    public function loadAplication(Request $request,$Id){
        $Datos = new Empresas();
        $Datos = Empresas::find($Id);
        $Empresa = new User();
        $Empresa = User::find($Datos->id_company);
        $OpResident = OpResident::all();
        $States = States::all();
        $Areas = Areas::all();
        return view('registro.EditAplication', array('app' => $Datos,'empresa'=>$Empresa,'OpResident'=>$OpResident,'states'=>$States,'areas'=>$Areas));
    }
}
