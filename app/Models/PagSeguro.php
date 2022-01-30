<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as Guzzle;


class PagSeguro extends Model
{

    use PagSeguroTrait;

    private $cart, $reference, $user;
    protected $currency = 'BRL';

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        $this->reference = uniqid(date('YmdHis'));
        $this->user = auth()->user();
    }

    public function getSessionId()
    {

        $params = $this->getConfigs();

       // $params = http_build_query($params);

        $guzzle = new Guzzle;

        $response = $guzzle->request('POST', config('pagseguro.url_transparente_session'), [
            'form_params' =>  $params,
            'verify' => false,
        ]);
        
        $contents = $response->getBody()->getContents();
        $xml = simplexml_load_string($contents);   //  convertendo o XML para JSON
       return $xml->id;
       
    }

    // pagamento checkoute Transparente com Boleto
    public function paymentBillet($sendHash)
    {
        $params = [
            'senderHash' => $sendHash,       // sempre será usado em checkout transparente
            'paymentMode' => 'default',
            'paymentMethod' => 'boleto',
            'currency' => $this->currency,
            'reference' => $this->reference,
        ];
            
            //$params = http_build_query($params);   transforma chaves e valores de  Array em url recebendo valores Ex: email=gidelson@gmail&token=sf2d22swrw2&senha=243e33 sucessivamente
            $params =   array_merge($params, $this->getConfigs());
            $params =   array_merge($params, $this->getItems());
            $params =   array_merge($params, $this->getSender());
            $params =   array_merge($params, $this->getShipping());
           
            $guzzle = new Guzzle;
            $response = $guzzle->request('POST', config('pagseguro.url_payment_transpartent'), [
                'form_params' =>  $params,
                'verify' => false,
            ]);
            
            $contents = $response->getBody()->getContents();
            
            $xml = simplexml_load_string( $contents);     // convertendo o XML para JSON
            
            return [
                'success'       => true,
                'payment_link'  => (string)$xml->paymentLink
            ];
            
            
            
    }

     // checkout Transparente utilizando cartão de credito
    public function paymentCredCard($request)
    {
        $params = [
            'email' => config('pagseguro.email'),
            'token' => config('pagseguro.token'),
            'senderHash' => $request->senderHash,       // sempre será usado em checkout transparente
            'paymentMode' => 'default',
            'paymentMethod' => 'boleto',
            'currency' => 'BRL',
            'itemId1' => '0001',
            'itemDescription1' => 'Produto PagSeguroI',
            'itemAmount1' => '99999.99',
            'itemQuantity1' => '1',
            'itemWeight1' => '1000',
            'itemId2' => '0002',
            'itemDescription2' => 'Produto PagSeguroII',
            'itemAmount2' => '99999.98',
            'itemQuantity2' => '2',
            'itemWeight2' => '750',
            'reference' => 'REF1234',
            'senderName' => 'Jose Comprador',
            'senderAreaCode' => '99',
            'senderPhone' => '99999999',
            'senderEmail' => 'c26511255848412745877@sandbox.pagseguro.com.br',
            'senderCPF'=>'54793120652',
            'shippingType' => '1',
            'shippingAddressStreet' => 'Av. PagSeguro',
            'shippingAddressNumber' => '9999',
            'shippingAddressComplement' => '99o andar',
            'shippingAddressDistrict' => 'Jardim Internet',
            'shippingAddressPostalCode' => '99999999',
            'shippingAddressCity' => 'Cidade Exemplo',
            'shippingAddressState' => 'SP',
            'shippingAddressCountry' => 'ATA',
            "creditCardToken" => $request->cardToken,
            "installmentQuantity" => "1",
            "installmentValue" => "10.46",
            "noInterestInstallmentQuantity" => "1",
            "creditCardHolderName" => "Roque Junior",
            "creditCardHolderCPF" => "54793120652",
            "creditCardHolderBirthDate" => "01/01/1900",
            "creditCardHolderAreaCode" => "11",
            "creditCardHolderPhone" => "11111111",
            "billingAddressStreet" => "Estrada do Arraial",
            "billingAddressNumber" => "100",
            "billingAddressComplement" => "complemento",
            "billingAddressDistrict" => "Casa Amarela",
            "billingAddressPostalCode" => "52070-230",
            "billingAddressCity" => "Recife",
            "billingAddressState" => "PE",
            "billingAddressCountry" => "ATA",
        ];
            
            //$params = http_build_query($params);   transforma chaves e valores de  Array em url recebendo valores Ex: email=gidelson@gmail&token=sf2d22swrw2&senha=243e33 sucessivamente

            $guzzle = new Guzzle;

            $response = $guzzle->request('POST', config('pagseguro.url_payment_transpartent_sandbox'), [
                'form_params' =>  $params,
                'verify' => false,
            ]);

            $contents = $response->getBody()->getContents();
            $xml = simplexml_load_string( $contents);     // convertendo o XML para JSON
            return $xml->code;
    }

}
