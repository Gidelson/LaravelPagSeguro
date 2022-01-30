<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Transparente PagSeguro</title>
</head>
<body>

    
    
    <form action="" method="post" id="form">
        @csrf
    </form>
    
    <a href="#" class="btn-finished">Pagar com boleto bancário</a>
    <div class="payment-methods"> </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{config('pagseguro.url_transparente_js_sandbox')}}"></script>
    <script>
        $(function(){
            $(".btn-finished").click(function(){
                setSessionId();
                return false;
            });
        });
        // recumperando o ID da sessão
        function setSessionId(){
            var dados = $("#form").serialize();
            $.ajax({
                url: "{{route('pagseguro.code.transparente')}}",
                method: "POST",
                data: dados
            }).done(function(data){
                PagSeguroDirectPayment.setSessionId(data);
               // getPaymentMetdods();
               paymentBillet();
            }).fail(function(){
                alert("Falha ao  Requisitar");
            });
        }
        // Mostrando os meios de pagamentos
        function getPaymentMetdods(){
            PagSeguroDirectPayment.getPaymentMethods({
                success: function(response){
                    console.log(response);
                    if( response.error == false ){
                        $.each(response.paymentMethods, function(key, value){
                            $(".payment-methods").append(key+"<br>");
                        });
                    }
                }, error: function(response){
                    console.log(response);
                }, complete: function(response){
                    console.log(response);
                }

            });
        }

        function paymentBillet(){
            var sendHash =  PagSeguroDirectPayment.getSenderHash();
            var dados = $("#form").serialize()+"&sendHash="+sendHash;
            $.ajax({
                url: "{{route('pagseguro.billet')}}",
                method: "POST",
                data: dados
            }).done(function(url){
               location.href=url;
            }).fail(function(){
                alert("Falha ao  Requisitar");
            });
        }

    </script>
</body>
</html>