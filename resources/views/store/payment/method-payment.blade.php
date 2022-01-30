@extends('store.layouts.main')

@section('content')
        <h1 class="title">Escolha o meio de pagamento</h1>
        <a href="#" id="payment-billet">
            <img src="{{url('assets/imgs/billet.png')}}" alt="boleto" style="width:80px;">
        </a>
        <div class="preload" style="display:none;">
            <img src="{{url('assets/imgs/preloader.gif')}}" alt="preload" style="width:80px;"> 
        </div>

                <form action="" method="post" id="form">
                @csrf
                </form>
@endsection

@push('scripts')
<script src="{{config('pagseguro.url_transparente_js')}}"></script>
<script>
        $(function(){
                $("#payment-billet").click(function(){
                    
                $(".preload").show();
                setSessionId();
                return false;
                });
        });

        function setSessionId(){
            var dados = $("#form").serialize();
            $.ajax({
                url: "{{route('pagseguro.code.transparente')}}",
                method: "POST",
                data: dados
            }).done(function(data){
                console.log(data);
                PagSeguroDirectPayment.setSessionId(data);
               paymentBillet();
            }).fail(function(){
                $(".preload").hide();
                alert("Falha ao  Requisitar");
            });
        }

        function paymentBillet(){
            var sendHash =  PagSeguroDirectPayment.getSenderHash();
            var dados = $("#form").serialize()+"&sendHash="+sendHash;
            $.ajax({
                url: "{{route('pagseguro.billet')}}",
                method: "POST",
                data: dados
            }).done(function(data){
                console.log(data);
                if(data.success){
                    location.href=data.payment_link;
                }else{
                    alert("Falha :(");
                }
               
            }).fail(function(){
                alert("Falha ao  Requisitar");
            }).always(function(){
                $(".preload").hide();
            });
        }

</script>
@endpush
