<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Product; 
use Session; 


class CartController extends Controller
{

public function cartList()
{
    $title = "Meu Carrimho de compras";
    $cartItems = \Cart::getContent();
    $totalCarrinho = count( $cartItems);

    return view('store.cart.cart', compact('cartItems','title','totalCarrinho'));
  
}


public function addToCart(Request $request, $id)
{
    $product  = Product::find($id);
        if (!$product)
        return redirect()->back();
   
    \Cart::add([
        'id' => $product->id,
        'name' => $product->name,
        'description' => $product->description,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(
            'image' => $product->image
        )
    ]);

    session()->flash('success', 'Produto adicionado ao Carrinho !');
    return redirect()->route('cart.list');

}

public function updateCart(Request $request, $id)
{
    if($request->quantity <=0){

         \Cart::remove($request->id);
         session()->flash('success', 'Item removido!');
         return redirect()->route('cart.list');

    }else{
            \Cart::update( $request->id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]);
            session()->flash('success', 'Um item atualizado!');
            return redirect()->route('cart.list');
     }

}
        

public function removeCart(Request $request, $id)
{

    \Cart::remove($request->id);
    session()->flash('success', 'Item removido !');

    return redirect()->route('cart.list');
}

public function clearAllCart()
{
    \Cart::clear();

    session()->flash('success', 'Todos os items foram removidos !');

    return redirect()->route('cart.list');
}


}



