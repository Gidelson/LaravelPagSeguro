<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagSeguro;


class PagSeguroController extends Controller
{
    public function pagseguro(PagSeguro $pagseguro)
    {
        // Fazer pagamento em outra tela externa ( Do pag Seguro )
        $code =  $pagseguro->generate();
        $urlRedirect = config('pagseguro.url_redirect_after_request').$code;
        return redirect()->away($urlRedirect);
    }

    public function lightbox()
    {
        return view('pagseguro-lightbox');
    }

    public function lightboxCode(PagSeguro $pagseguro)
    {
        // Fazer pagamento na mesma tela da loja (Abrindo janela Pop-Up)
        return $pagseguro->generate();
    }

    public function transparente()
    {
        return  view('pagseguro-transparente');
    }
    // Recumperando o ID da sessão
    public function getCode(PagSeguro $pagseguro)
    {
       return  $pagseguro->getSessionId();
    }

    public function billet(Request $request, PagSeguro $pagseguro)
    {
      $response  =  $pagseguro->paymentBillet($request->sendHash);
      return response()->json($response, 200);
    }
    
    public function card()
    {
        return view('pagseguro-transparent-card');
    }

    public function cardTransaction(Request $request, PagSeguro $pagseguro)
    {
      return $pagseguro->paymentCredCard($request);
    }
    
}
