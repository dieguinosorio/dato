<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\User;

class EmpresasController extends Controller
{
    //
    public function index($id){
        $empresa = User::where('id',$id)->first();
        return view('registro.register',["empresa"=>$empresa]);
    }
    
    public function register(Request $request,$id){
        echo $request->input('opciud');
        die();
    }
}
