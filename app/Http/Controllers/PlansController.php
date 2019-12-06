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
    public function __construct() {
        $this->middleware('auth');
    }
    //
    public function InformationPlant($Id){
        $Empresa = User::find($Id);
        $Plan = new PlanesEmpresas();
        $Plan = PlanesEmpresas::where('id_company',$Id)->first();
        $PlanEmpresa = Planes::find($Plan->IdPlan);
        return new response($PlanEmpresa);
    }
    
     public function index($id='') {
        $planes = Planes::all();
        return view('planespagos.plan', array("planes" => $planes));
    }
    
    public function CreatePlanMonth(Request $request){
        $NewPlan = new Planes();
        $NewPlan->Descripcion = $request->input('name');
        $NewPlan->FhInicio = $request->input("fhinicio");
        $NewPlan->FhFin = $request->input("fhfin");
        $NewPlan->Activo = 0;
        $NewPlan->Top = $request->input("top") =='on' ? 1:0;
        $NewPlan->ControlApp = 0;
        $NewPlan->ControlFecha = 1;
        $NewPlan->CantMeses = $request->input("cantmonth");
        $NewPlan->Comentarios = $request->input("comentarios");
        $NewPlan->save();
        return redirect()->route('planes.index')->with("status",'the plant is created with name '.$NewPlan->Descripcion); 
    }
}
