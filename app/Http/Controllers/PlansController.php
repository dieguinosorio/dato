<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Empresas;
use App\User;
use App\OpResident;
use App\States;
use App\Areas;
use App\Planes;
use App\PlanesEmpresas;
class PlansController extends Controller
{
    //
    public function InformationPlant($Id){
        $Empresa = User::find($Id);
        $Plan = new PlanesEmpresas();
        $Plan = PlanesEmpresas::where('id_company',$Id)->first();
        $PlanEmpresa = Planes::find($Plan->IdPlan);
        return new response($PlanEmpresa);
    }
}
