<?php

use Illuminate\Support\Facades\Route;
/* Rotas Para Testes

Route::post('pagseguro-transparent-card','PagSeguroController@cardTransaction')->name('pagseguro.card.transaction');
// Recumperar bandeira do cartão e Criando token do cartao de credito
Route::get('pagseguro-transparent-card','PagSeguroController@card')->name('pagseguro.transparent.card');
// pagamento por boleto checkoute Transparente
Route::post('pagseguro-billet','PagSeguroController@billet')->name('pagseguro.billet');
// Recumperando o ID da Sessão
Route::post('pagseguro-transparente','PagSeguroController@getCode')->name('pagseguro.code.transparente');
Route::get('pagseguro-transparente','PagSeguroController@transparente')->name('pagseguro.transparente');
 // Fazer pagamento em outra tela externa ( Do pag Seguro )
Route::get('pagseguro','PagSeguroController@pagseguro')->name('pagseguro');
// Fazer pagamento na mesma tela da loja (Abrindo janela Pop-Up)
Route::get('pagseguro-lightbox','PagSeguroController@lightbox')->name('pagseguro.lightbox');
Route::post('pagseguro-lightbox','PagSeguroController@lightboxCode')->name('pagseguro.lightbox.code');

*/

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    // Rotas Cart
    Route::get('meio-pagamento', 'StoreController@methodPayment')->middleware('check.qty.cart')->name('method.payment');
    Route::post('pagseguro-getcode', 'PagSeguroController@getCode')->name('pagseguro.code.transparente');
    Route::post('pagseguro-payment-billet', 'PagSeguroController@billet')->name('pagseguro.billet');
    // Rotas Perfil
    Route::post('atualizar-perfil','UserController@profileUpdate')->name('profile.update');
    Route::get('logout','UserController@logout')->name('logout');
    Route::get('meu-perfil','UserController@profile')->name('profile');
    Route::get('minha-senha','UserController@password')->name('password');
    Route::post('atualizar-senha','UserController@passwordUpdate')->name('password.update');
});
Route::get('carrinho', 'CartController@cartList')->name('cart.list');;
Route::get('add-cart/{id}','CartController@addToCart')->name('cart.store');
Route::get('/','StoreController@index')->name('home');
Route::get('/home','StoreController@index')->name('home');
Route::post('update-cart/{id}', 'CartController@updateCart')->name('cart.update');
Route::post('remove/{id}', 'CartController@removeCart')->name('cart.remove');
Route::post('clear', 'CartController@clearAllCart')->name('cart.clear');

