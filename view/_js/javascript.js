   $(function(){
        $("#Categoria_icones").css("display","none");
        var x = 1;
var TrocaLoja = 1;
 $("#ClickLoja").click(function(){
    if(TrocaLoja == 1){
        $("#caixa_produtos").css("display","none");
        $("#Categoria_icones").css("display","block");
        TrocaLoja = 2;
    } else{
        $("#caixa_produtos").css("display","block");
        $("#Categoria_icones").css("display","none");
        TrocaLoja = 1;
    }
});
    var limite  = $('#caixa img').length * $('#caixa img').width() * -1;
    var largura = (limite * (-1)) + $('#caixa img').width();
    var PassaTamanho = "-=" + $('#caixa img').width() + "px";

        
        $('#caixa').append('<img>');
        $('#caixa img:last').attr('src','../_imagens/galeria1.jpeg');
        $('#caixa').css('width',largura);

    function Roda() {					
            $('#caixa').animate({left:PassaTamanho},2000, function() {
                if (   $('#caixa').position().left == limite ) {
                    $('#caixa').css('left',0);
                }
            });
            
        }

        if($(window).width() <= 768 ){
            setInterval(Roda,6000)
                }else{
        }
        //funcao do index 
        var trocaV = 1;
        $("#descrip_produto div:last-child").css("display","none");
        $("#all_icones a:first-child").on("click",function(){
                
                if(trocaV == 1){
                    trocaV = 2;
                    $("#descrip_produto div:first-child").css("display","none");
                    $("#descrip_produto div:last-child").css("display","block");
                }else{
                    trocaV = 1;
                    $("#descrip_produto div:last-child").css("display","none");
                    $("#descrip_produto div:first-child").css("display","block  ");
                    
                }
        });
        //Função Vendedor

        $("#MenuVendedor ol li:last-child").on("click",function(){
            $("#FotosVendedor").css("display","none");
            $("#ProdutosVendedor").css("display","block");
            $("#ProdutosVendedorL").css("display","block");
        });

        $("#MenuVendedor ol li:first-child").on("click",function(){
            $("#FotosVendedor").css("display","block");
            $("#ProdutosVendedor").css("display","none");
            $("#ProdutosVendedorL").css("display","none");
        });
        var definiFuncao;

        if($(window).width() <= 480){
            definiFuncao = DefinirOrientacao480;
        }else if($(window).width() <= 768){
            definiFuncao = DefinirOrientacao768;
        }else if($(window).width() <= 1366){
            definiFuncao = DefinirOrientacao1024;
        }

    var ComparaTamanho, produto, ComparaLargura, teste123;
for(aume=1;aume<=10;aume++){
    produto = "#" + "produto" + aume + " img";  
    ComparaLargura = $(produto).width();
    ComparaTamanho = $(produto).height();

    definiFuncao();
            teste123 = parseFloat(($(".hidde").width() / 2) - ($(produto).width()/2));
            $(produto).css("margin-left", teste123 ); 
            teste123 = parseFloat(($(".hidde").height() / 2) - ($(produto).height()/2));
            $(produto).css("margin-top", teste123 );
}


function DefinirOrientacao480(){
        if(ComparaLargura > ComparaTamanho){
            $(produto).css("width","157px");   
        }else{
            $(produto).css("width","117px");
        }
    }

    function DefinirOrientacao768(){
        if(ComparaLargura > ComparaTamanho){
            $(produto).css("width","177px");
        }else{
            $(produto).css("width","137px");
        }
    }

    function DefinirOrientacao1024(){
        if(ComparaLargura > ComparaTamanho){
            $(produto).css("width","197px");
        }else{
            $(produto).css("width","157px");
        }
    }

    function DefinirOrientacao1366(){
        if(ComparaLargura > ComparaTamanho){
            $(produto).css("width","10px");
        }else{
            $(produto).css("width","10px");
        }
    }
    //funcao de troca o valor fecho mano pqp
    

    //loja trocando para sessão enviar mensage
    x = 1;
    $("#all_icones a:nth-child(2)").on("click", function(){
        if(x == 1){
        $("#SobreProduto").css("display","none");
        $("#MensagemEnviar").css("display","block");
        x =2;
        }else {
        $("#SobreProduto").css("display","block");
        $("#MensagemEnviar").css("display","none");
        x = 1;
        }
    });

    //alluser
    
});