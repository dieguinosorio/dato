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

class PayPalService {

    use ConsumesExternalServices;

    protected $baseUri;
    protected $clientId;
    protected $clientSecret;

    public function __construct() {
        //Con config('services.paypal.base_uri') ingresamos a el servicio que instancia el .dev que tiene las condiguraciones
        /* $this->baseUri = config('services.paypal.base_uri');
          $this->clientId = config('services.paypal.client_id');
          $this->clientSecret = config('services.paypal.client_secret'); */
        $this->baseUri = config('services.paypal.base_uri');
        $this->clientId = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers) {
        //
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response) {
        return json_decode($response);
    }

    public function resolveAccessToken() {
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");
        //Es muy importante el espacio entre Basic {
        return "Basic {$credentials}";
    }

    public function handlePayment(Request $request) {
        $order = $this->createOrder($request->value, $request->moneda);

        $orderLinks = collect($order->links);

        $approve = $orderLinks->where('rel', 'approve')->first();

        session()->put('approvalId', $order->id);

        return redirect($approve->href);
    }

    public function handlePaymentApproval() {
        if (session()->has('approvalId')) {
            $approvalId = session()->get('approvalId');

            $payment = $this->capturePayment($approvalId);

            $name = $payment->payer->name->given_name;
            $payment = $payment->purchase_units[0]->payments->captures[0]->amount;
            $amount = $payment->value;
            $currency = $payment->currency_code;

            return redirect()->route('payment.index')->withSuccess(['status' => "Thanks, {$name}. We received your {$amount}{$currency} payment."]);
        }

        return redirect()->route('payment.index')->withErrors('We cannot capture your payment. Try again, please');
    }

    /**
     * Crear Orden recibe el parametro valor y tipo de moneda
     * @param type $value
     * @param type $Currenci
     */
    public function createOrder($value, $currency) {
        return $this->makeRequest(
                    'POST', '/v2/checkout/orders', [], [
                    'intent' => 'CAPTURE',
                    'purchase_units' => [
                        0 => [
                            'amount' => [
                                'currency_code' => strtoupper($currency),
                                'value' => round($value * $factor = $this->resolveFactor($currency)) / $factor,
                            ]
                        ]
                    ],
                    'application_context' => [
                        'brand_name' => config('app.name'),
                        'shipping_preference' => 'NO_SHIPPING',
                        'user_action' => 'PAY_NOW',
                        'return_url' => route('approval'),
                        'cancel_url' => route('cancelled'),
                    ]
                        ], [], $isJsonRequest = true
        );
    }

    public function capturePayment($approvalId) {
        return $this->makeRequest(
                        'POST', '/v2/checkout/orders/' . $approvalId . '/capture', [], [], [
                    'Content-Type' => 'application/json'
                        ]
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
