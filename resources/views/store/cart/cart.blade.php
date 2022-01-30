@extends('store.layouts.main')

@section('content')
        <h1 class="title">Meu Carrinho</h1>
     <table class="table table-striped">
         <tr>
             <th>Item</th>
             <th>Preço</th>
             <th>Quantidade</th>
             <th>Sub. Total</th>
             <th>Açôes</th>
         </tr>
     @forelse($cartItems as $item)
        <tr>
            <td>
                <img src="{{url("assets/imgs/temp/")}}/{{$item->attributes->image}}" class="img-cart" alt="" >
                <p><b>Nome:</b> {{$item->name}}</p>
            </td>
            <td>R$ {{$item->price}}</td>
            <td>
            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id}}" >
                <input type="number" style="width:50px;" name="quantity" value="{{ $item->quantity }}" class="text-center" />
                <button type="submit" class="btn btn-success">Atualizar</button>
            </form>
            </td>
            <td>R$ {{$item->price * $item->quantity}}</td>
            <td>
            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id">
                <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
    @empty
      <div><p>Nenhum item no Carrinho</p><div>
    @endforelse
     </table>
     <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Excluir Todos</button>
      </form>
     <div class="total-cart"><span>Total: ${{Cart::getTotal()}}</span></div>
     <div class="finish-card"><a href="{{route('method.payment')}}">Finalizar Compra</a></div>

@endsection