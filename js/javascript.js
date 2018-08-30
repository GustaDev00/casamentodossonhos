$(function(){
    var x = 1;
    
    var limite  = $('#caixa img').length * $('#caixa img').width() * -1;
    var largura = (limite * (-1)) + $('#caixa img').width();
    var PassaTamanho = "-=" + $('#caixa img').width() + "px";
    console.log(PassaTamanho);
    $("#link").click(function(){
        if(x == 1){ 
            x = 2;
            $("#submenu").show();
            }else{
                x = 1;
                $("#submenu").hide();
            }
        });


        
    console.log(limite,largura);
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
        setInterval(Roda,2000)
});