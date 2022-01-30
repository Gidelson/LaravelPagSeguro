<?php

$enviroment = env('PAGSEGURO_ENVORINMENT');
$isSandibox = ($enviroment == 'sandbox') ? true : false;

$urlCheckout              =  ($isSandibox) ? 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout' :  'https://secure.api.pagseguro.com/' ;  
$urlCheckoutAfterRequest  =  ($isSandibox) ? 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' : 'https://ws.pagseguro.uol.com.br/v2/checkout/payment.html?code=' ;    
$urlLightbox              =  ($isSandibox) ? 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js' : 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js' ;    
$urlSessionTransparent    =  ($isSandibox) ? 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions' : 'https://ws.pagseguro.uol.com.br/v2/sessions/' ;    
$urlTransparentJs         =  ($isSandibox) ? 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js' : 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js' ;    
$urlPaymentTransparent    =  ($isSandibox) ? 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions' : 'https://ws.pagseguro.uol.com.br/v2/transactions' ;    



return [
    'enviroment' => $enviroment,

    'email' => env('PAGSEGURO_EMAIL'),
    'token' => env('PAGSEGURO_TOKEN'),
    // enviando dados tipo POST  para API do pagSeguro via Guzzle para recumperar o codigo
    'url_checkout' => $urlCheckout,
    // Fazer pagamento em outra tela externa ( Do pag Seguro )
    'url_redirect_after_request' => $urlCheckoutAfterRequest,
    // Api Javascript do pagSeguro para fazer pagamento redirecionando o usuario em uma tela externa do pag seguro
    'url_transparente_js' => $urlTransparentJs ,
    // Fazer pagamento na mesma tela da loja
    'url_lightbox' => $urlLightbox,
    // enviando dados tipo POST  para API do pagSeguro via Guzzle para recumperar o ID da Sessão
    'url_transparente_session' => $urlSessionTransparent,
    // pagamento por boleto checkoute Transparente
    'url_payment_transpartent' => $urlPaymentTransparent,

];


