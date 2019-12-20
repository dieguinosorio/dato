<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FuncionesService
 *
 * @author dlaravel
 */
namespace App\Traits;
use App\Planes;
use App\PlanesEmpresas;
use App\User;

trait FuncionesService {
    //put your code here
    public function AplicarPlanEmpresa($IdPlan){
        $Empresa = \Auth::user();
        $PlanEmpresa = Planes::find($IdPlan);
        $PlanEmpresa = new PlanesEmpresas();
        $PlanEmpresa->IdPlan = $IdPlan;
        $PlanEmpresa->id_company = $Empresa->id;
        $PlanEmpresa->Activo =1;
        $PlanEmpresa->FechaAdd = date("Y-m-d H:i:s");
        $PlanEmpresa->save();
        return true;
    }
}
