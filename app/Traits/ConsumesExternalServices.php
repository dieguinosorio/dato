<?php

namespace App\Traits;
use GuzzleHttp\Client;
trait ConsumesExternalServices {

    public function makeRequest($method,$requestUrl,$queryParams=[],$formParams=[],$headers=[],$isJsonRequest=false) {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        
        //Hace las validaciones antes de enviar los parametros, y para indicar como se realiza
        if(method_exists($this, 'resolveAuthorization')){
           $this->resolveAuthorization($queryParams,$formParams,$headers);
        }
        
        $response = $client->request($method,$requestUrl,[
            $isJsonRequest == true ? 'json' : 'form_params'=>$formParams,
            'headers'=>$headers,
            'query'=>$queryParams
        ]);
        
        $response = $response->getBody()->getContents();
        
        //para indicar como se decodificara la respuesta
        if(method_exists($this, 'decodeResponse')){//Validamos si existe ese metodo
           $response = $this->decodeResponse($response);
        }
        
        return $response;
    }

}
