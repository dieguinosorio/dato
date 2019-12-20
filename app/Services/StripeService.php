<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

/**
 * Description of PayPalService
 *
 * @author dlaravel
 */
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ConsumesExternalServices;
use App\Traits\FuncionesService;

class StripeService {

    use ConsumesExternalServices;
    use FuncionesService;
    protected $baseUri;
    protected $key;
    protected $secret;

    public function __construct() {
        //Con config('services.paypal.base_uri') ingresamos a el servicio que instancia el .dev que tiene las condiguraciones
        $this->baseUri = config('services.stripe.base_uri');
        $this->key = config('services.stripe.key');
        $this->secret = config('services.stripe.secret');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers) {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response) {
        return json_decode($response);
    }

    public function resolveAccessToken() {
        return "Bearer {$this->secret}";
    }

    public function handlePayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        $intent = $this->createIntent($request->value, $request->currency, $request->payment_method);

        session()->put('paymentIntentId', $intent->id);

        return redirect()->route('approval');
    }

    public function handlePaymentApproval()
    {
        if (session()->has('paymentIntentId')) {
            $paymentIntentId = session()->get('paymentIntentId');

            $confirmation = $this->confirmPayment($paymentIntentId);

            if ($confirmation->status === 'requires_action') {
                $clientSecret = $confirmation->client_secret;

                return view('stripe.3d-secure')->with([
                    'clientSecret' => $clientSecret,
                ]);
            }

            if ($confirmation->status === 'succeeded') {
                $name = $confirmation->charges->data[0]->billing_details->name;
                $currency = strtoupper($confirmation->currency);
                $amount = $confirmation->amount / $this->resolveFactor($currency);
                $this->AplicarPlanEmpresa(1);
                return redirect()
                    ->route('home')
                    ->withSuccess(['home' => "Thanks, {$name}. We received your {$amount}{$currency} payment."]);
            }
        }

        return redirect()
            ->route('home')
            ->withErrors('We were unable to confirm your payment. Try again, please');
    }
    
    public function createIntent($value,$currency,$paymethod){
        return $this->makeRequest(
            'POST',
            '/v1/payment_intents',
            [],
            [
                'amount' => round($value * $this->resolveFactor($currency)),
                'currency' => 'usd',
                'payment_method' => $paymethod,
                'confirmation_method' => 'manual',
            ]
        );
    }
    
    public function confirmPayment($paymentIntentId)
    {
        return $this->makeRequest(
            'POST',
            "/v1/payment_intents/{$paymentIntentId}/confirm"
        );
    }

    public function resolveFactor($currency)
    {
        $zeroDecimalCurrencies = ['JPY'];

        if (in_array(strtoupper($currency), $zeroDecimalCurrencies)) {
            return 1;
        }

        return 100;
    }

}
