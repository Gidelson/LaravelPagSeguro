@extends('store.layouts.main')

@section('content')
    <section class="products">
        <h1 class="title">LANÇAMENTOS</h1>
        @foreach($products as $product)
        <div class="agrupa">
            <div class="prod">
                <article class="">
                    <div class="itenss">
                        <img src="{{url("assets/imgs/temp/$product->image")}}" alt="" >
                        <p><b>Nome:</b> {{$product->name}} </p>
                        <p><b>Preço:</b> R$ {{$product->price}} </p>
                        <a href="{{route('cart.store', $product->id)}}">Adicionar no Carrinho <i class="bi bi-cart-plus-fill"></i></a>
                    </div>
                </article>
            </div>
        </div>
        @endforeach
    </section>
@endsection



