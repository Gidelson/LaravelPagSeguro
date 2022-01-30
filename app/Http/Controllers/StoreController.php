<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;


class StoreController extends Controller
{
    public function index(Product $product)
    {
        $products =  $product->all();
        $title = "Lançamentos";
        $cartItems = \Cart::getContent();
        $totalCarrinho = count( $cartItems);

        return view('store.home.index', compact('title','products','table','totalCarrinho'));
    }

    public function methodPayment()
    {
        $cartItems = \Cart::getContent();
        $totalCarrinho = count( $cartItems);

        $title = "Escolha o meio de pagamento";
        return view('store.payment.method-payment', compact('title','totalCarrinho'));
    }

}



