<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Resolvers\PaymentPlatformResolver;
class PaymentController extends Controller
{
    protected $paymentPlatformResolver;
    //Inyectamos la clase PaymentPlatformResolver osea con la variable $paymentPlatformResolver ya podemos usar sus metodos, se pone en el constructor para que se inyecte cada vez que se inicie la clase.
    public function __construct(PaymentPlatformResolver $paymentPlatformResolver) {
        $this->middleware('auth');
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }
    public function pay(Request $request){
        //Realizamos las reglas validaciones.
        $rules = [
            'value'=>['required','numeric','min: 5'],
            'moneda'=>['required','exists:currencies,iso'],
            'payment_platform'=>['required','exists:payment_platforms,id']
        ];
        //Ejecutamos el metodo de validacion de request.
        $request->validate($rules);
        
        //Se encarga de inyectar la clase paypalservice para usar los metodos
        $paymentPlatform = $this->paymentPlatformResolver->resolveService($request->payment_platform);
        session()->put('paymentPlantformId',$request->payment_platform);
        //Devolvemos el resultado.
        return $paymentPlatform->handlePayment($request);
    }
    
    public function approval(){
        if(session()->has('paymentPlantformId')){//Preguntamos primero si existe la sesion
            $IdPlatform = session()->get('paymentPlantformId');
            $paymentPlatform = $this->paymentPlatformResolver->resolveService($IdPlatform);
            return $paymentPlatform->handlePaymentApproval();
        }
        return redirect()->route('payment.index')->withErrors('We cannot capture your  payment plantform. Try again, please');
    }
    
    public function cancelled(){
        return redirect()->route('payment.index')->withErrors('We cannot capture your payment is cancelled. Try again, please');
    }
}
