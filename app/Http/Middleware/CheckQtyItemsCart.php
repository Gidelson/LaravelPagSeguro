<?php

namespace App\Http\Middleware;

use Closure;

class CheckQtyItemsCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $cartItems = \Cart::getContent();
        $totalCarrinho = count( $cartItems);
        if( $totalCarrinho < 1)
        return redirect()->back()->with('message','Não existe item no carrinho');

        return $next($request);
    }
}
