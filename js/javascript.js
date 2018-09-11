$(function(){
    var x = 1;
    
    var limite  = $('#caixa img').length * $('#caixa img').width() * -1;
    var largura = (limite * (-1)) + $('#caixa img').width();
    var PassaTamanho = "-=" + $('#caixa img').width() + "px";
    $("#link").click(function(){
        if(x == 1){ 
            x = 2;
            $("#submenu").show();
            }else{
                x = 1;
                $("#submenu").hide();
            }
        });
        
        $('#caixa').append('<img>');
        $('#caixa img:last').attr('src','imagens/galeria1.jpeg');
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
        });

        $("#MenuVendedor ol li:first-child").on("click",function(){
            $("#FotosVendedor").css("display","block");
            $("#ProdutosVendedor").css("display","none");
        });
});