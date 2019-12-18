<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaymentPlatformResolver
 *
 * @author dlaravel
 */
namespace App\Resolvers;
use App\PaymentPlatforms;
use Mockery\Exception;
class PaymentPlatformResolver {
    //put your code here
    protected $paymentPlantForm;
    
    public function __construct() {
        $this->paymentPlantForm = PaymentPlatforms::all();
    }
    
    public function resolveService($paymentPlatforId){
        $name = strtolower($this->paymentPlantForm->firstWhere('id',$paymentPlatforId)->name);
        //hace referencia a la configuracion de cada plataforma en el archivo services.php
        $service = config("services.{$name}.class");
        if($service){
            return resolve($service);
        }
        throw new Exception("The selected payment plantform is not configured.",1);
    }
}
