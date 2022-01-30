<!DOCTYPE html>
<html lang="pt-bre">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Light-Box</title>
</head>
<body>
    <h1>Light-Box</h1>
    <div class="msg-return"> </div>
    <div style="display:none;" class="preload">Carregando...</div>
    <a href="" class="btn-buy">Finalizar Compra</a>
    {!! csrf_field()  !!}
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            // Fazer pagamento na mesma tela da loja (Abrindo janela Pop-Up)
            $(function(){
                $('.btn-buy').click(function(){
                    $.ajax({
                        url: "{{route('pagseguro.lightbox.code')}}",
                        method: "POST",
                        data: {_token: $('input[name=_token').val()},
                        beforeSend: startPreloader() // Enquanto a requisição esta em andamento, chama a função carregando
                    }).done(function(code){
                        lightbox(code);
                    }).fail(function(){
                        alert("Erro inesperado. Tente novamente");
                    }).always(function(){  // a função always(), sempre é executada toda vez que uma ação termina, idependente se foi com sucesso ou erro
                        stopPreloader();
                    });

                    return false;
                });
            });

            function lightbox(code){
                var verifica = PagSeguroLightbox(
                {
                    code: code
                }, {
                    success: function(codigoDaTransicao){
                        $('.msg-return').html("Pedido realizado com sucesso: "+codigoDaTransicao);
                    }, 
                    abort: function(){
                        alert("Voçe Cancelou a Compra!");
                    }
                }
                
                );

                if(!verifica){
                    location.href="{{config('pagseguro.url_redirect_after_request')}}"+code;
                }
            }

            function startPreloader(){
                $('.preload').show();
            }
            function stopPreloader(){
                $('.preload').hide();
            }

        </script>
    <script src="{{config('pagseguro.url_lightbox_sandbox')}}"></script>
</body>
</html>