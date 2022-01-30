<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PagSeguro Transparent Cartão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Pagar com Cartão</h1>
        <form action="" id="form" method="post">
            @csrf
            <div class="form-group">
                <label> Numero do Cartão</label>
                    <input type="text" name="cardNumber" class="form-control" required placeholder="Numero do Cartão " >
            </div><br>
            <div class="form-group">
                <label> Mês de Expiração </label>
                    <input type="text" name="cardExpiryMonth" class="form-control" required placeholder=" Mês de Expiração" >
            </div><br>
            <div class="form-group">
                <label>Ano de Expiração</label>
                    <input type="text" name="cardExpiryYear" class="form-control" required placeholder=" Ano de Expiração" >
            </div><br>
            <div class="form-group">
                <label>Código de Segurança</label>
                    <input type="text" name="cardCvv" class="form-control" required placeholder="( 3 Números ) " >
            </div><br>
    
            <div class="form-group">
                <input type="hidden" value="" name="cardName">
                <input type="hidden" value="" name="cardToken">
                <button class="btn btn-primary btn-buy">Enviar Agora</button>
            </div><br>
        </form>
        <div class="preloader" style="display:none;"> </div>
        <div class="message" style="display:none;"></div>
    </div>
   <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{config('pagseguro.url_transparente_js_sandbox')}}"></script>

    <script>
        $(function(){
            setSessionId();

            $("#form").submit(function(){
                getBrand();
                startPreloader("Carregando...");
                return false;
            });
        });

        function setSessionId(){
            var dados = $("#form").serialize();
            $.ajax({
                url: "{{route('pagseguro.code.transparente')}}",
                method: "POST",
                data: dados,
                beforeSend: startPreloader("Carregando...") // Enquando estiver fazendo a requisição, chama a função startPreloader() ( carregando... )
            }).done(function(data){
                PagSeguroDirectPayment.setSessionId(data);
            }).fail(function(){
                alert("Falha ao  Requisitar");
            }).always(function(){
                endPreloader(); // Quando finalizar a requisição, chama a função endPreloader()  ( parar de carregar )
            });
        }
        // Recumperar Bamndeita do cartão
        function getBrand(){
            PagSeguroDirectPayment.getBrand({
                cardBin: $('input[name=cardNumber]').val().replace(/ /g, ''),
                success: function(response){
                    console.log("Sucesso GetBrand");
                    console.log(response);
                    $("input[name=cardName]").val(response.brand.name);
                    createCredCardToken();
                }, error: function(response){
                    console.log("Error GerBrand");
                    console.log(response);
                }, complete: function(response){
                    console.log("Sucesso GetBrand");
                   // console.log(response);
                }
            });
        }
        // Criando token do cartao de credito
        function createCredCardToken(){
            PagSeguroDirectPayment.createCardToken({
                cardNumber:  $('input[name=cardNumber]').val().replace(/ /g, ''),
                brand: $("input[name=cardName]").val(),
                cvv: $("input[name=cardCvv]").val(),
                expirationMonth: $("input[name=cardExpiryMonth]").val(),
                expirationYear: $("input[name=cardExpiryYear]").val(),
                success: function(response){
                    console.log('Sucesso ao Criar o token');
                    console.log(response);
                    $("input[name=cardToken]").val(response.card.token);
                    createTransactionCard();
                }, error: function(response){
                    console.log(response);
                }, complete: function(response){
                    console.log("Success  ao criar token");
                    endPreloader();
                   // console.log(response);
                }
            });
        }
        // checkout Transparente utilizando cartão de credito
        function createTransactionCard(){
            var senderHash =  PagSeguroDirectPayment.getSenderHash();
            var dados = $("#form").serialize()+"&senderHash="+senderHash;
            $.ajax({
                url: "{{route('pagseguro.card.transaction')}}",
                method: "POST",
                data: dados,
                beforeSend: startPreloader("Realizando  Pagamento com o cartao") // Enquando estiver fazendo a requisição, chama a função startPreloader() ( carregando... )
            }).done(function(code){
                $(".message").html("Código da transação: "+code);
                $(".message").show();
            }).fail(function(){
                alert("Falha ao  Requisitar");
            }).always(function(){
                endPreloader(); // Quando finalizar a requisição, chama a função endPreloader()  ( parar de carregar )
            });
        }

        function startPreloader(msgOPreloader){
            if(msgOPreloader != "")
            $(".preloader").val(msgOPreloader);
            $(".preloader").show();
            $(".btn-buy").addClass('disabled');
        }

        function endPreloader(){
            $(".preloader").hide();
            $(".btn-buy").removeClass('disabled');
        }
    </script>
</body>
</html>