function adicionar(){
    $("#FotosVendedor").css("display","none");
    $("#ProdutosVendedorL").css("display","none"); 
    $("#ProdutosFotos").css("display","block"); 
}

    $(document).ready(function(){   
        $("#MenuVendedor ol li:last-child").click( function(){
            location.href='../perfil/deslogar.php' ;
        });

$("a[rel=modal]").click( function(ev){
ev.preventDefault();

var id = $(this).attr("href");

var alturaTela = "180%";
var larguraTela = "100%";

//colocando o fundo preto
$('#mascara').css({'width':larguraTela,'height':alturaTela});
$('#mascara').fadeIn(1000); 
$('#mascara').fadeTo("slow",0.8);

var left = (($(window).width() /2) - ( $(id).width() / 2 )- 10);
var top = "10%"  ;

$(id).css({'top':top,'left':left});
$(id).show();   
});

$("#mascara").click( function(){
$(this).hide();
$(".window").hide();
});

$('.fechar').click(function(ev){
ev.preventDefault();
$("#mascara").hide();
$(".window").hide();
});

$("a[rel=modal2]").click( function(ev){
ev.preventDefault();

var id = $(this).attr("href");

var alturaTela = "120%";
var larguraTela ="100%";

//colocando o fundo preto
$('#mascara2').css({'width':larguraTela,'height':alturaTela});
$('#mascara2').fadeIn(1000); 
$('#mascara2').fadeTo("fast",0.8);

var left = (($(window).width() /2) - ( $(id).width() / 2 )-10);
var top = "20%";

$(id).css({'top':top,'left':left});
$(id).show();   
});

$("#mascara2").click( function(){
$(this).hide();
$(".window").hide();
});

$('.fechar').click(function(ev){
ev.preventDefault();
$("#mascara2").hide();
$(".window").hide();
});

function readImage() {
if (this.files && this.files[0]) {
var file = new FileReader();
file.onload = function(e) {
document.getElementById("preview").src = e.target.result;

};       
file.readAsDataURL(this.files[0]);
}
}

document.getElementById("imgChooser").addEventListener("change", readImage, false);


/* sei nao ein parceiro tem algo errao aqui */

function readImage2() {
if (this.files && this.files[0]) {
var file = new FileReader();
file.onload = function(e) {
document.getElementById("previewP").src = e.target.result;

};       
file.readAsDataURL(this.files[0]);
}
}

document.getElementById("imgChooserP").addEventListener("change", readImage2, false);

    $(".isoclose").on("click",function(){
       $(".moda").css("display","none");
        $("#fundoE").hide();
    });
    $("#fundoE").on("click",function(){
       $(".moda").css("display","none");
        $("#fundoE").hide();
    });
    
        function readImage3() {
        if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
        document.getElementById("veja").src = e.target.result;        
}
file.readAsDataURL(this.files[0]);
}
}

document.getElementById("Trocaimagem").addEventListener("change", readImage3, false);
    $(".isoclose").on("click",function(){
       $(".modinha").css("display","none");
        $("#fundoP").hide();
    });
    $("#fundoP").on("click",function(){
       $(".modinha").css("display","none");
        $("#fundoP").hide();
    });
    
        function readImage4() {
        if (this.files && this.files[0]) {
        var file = new FileReader();
        file.onload = function(e) {
        document.getElementById("VejaProduto").src = e.target.result;        
}
file.readAsDataURL(this.files[0]);
}
}
document.getElementById("TrocaPimagem").addEventListener("change", readImage4, false);

    
function readImage5() {
    if (this.files && this.files[0]) {
    var file = new FileReader();
    file.onload = function(e) {
    document.getElementById("vejanovafoto").src = e.target.result;        
}
file.readAsDataURL(this.files[0]);
}
}
document.getElementById("nip").addEventListener("change", readImage5, false);
});

var umaunicaimagem = 1, umaimagem = 1, abreEdit = 1, abreDE = 1;
var slideIndex = 1;


function criaimg(){
    if(umaunicaimagem == 1){
       
    $("#quadroft").append('<img id=preview style="width:70%;" alt="Carregue Sua Foto Abaixo">');
    umaunicaimagem = 2;
    }else{
    }
    
    }
    showSlides(slideIndex);
    function criaimg2(){
    if(umaimagem == 1){
    $("#quadroP").append('<img id=previewP style="width:70%;" alt="Carregue Sua Foto Abaixo">');
    umaimagem = 2;
    }else{
    
    }
    
    }
    
    function openModal() {
    document.getElementById('myModal').style.display = "block";
    $('html').addClass('classhtml');
    
    }
    
    
    function closeModal() {
    document.getElementById('myModal').style.display = "none";
    $('html').removeClass('classhtml')
    }
    function myfunction(sr){      
        $("#codfoto").val(sr);
        $(".moda").css("display","block");
        var left = (($(window).width() /2) - ( $(".moda").width() / 2 )- 10);
        var top = "10%";
        $(".moda").css({'top':top,'left':left});
        var alturaTela = "180%";
        var larguraTela = "100%";
        $('#fundoE').css({'width':larguraTela,'height':alturaTela});
        $('#fundoE').fadeIn(1000); 
        $("footer").css("margin-top", "390px");
        $('#fundoE').fadeTo("fast",0.8);
    }

        function functionmy(sr){   
            $("#codproduto").val(sr);
            var left = (($(window).width() /2) - ( $(".modinha").width() / 2 )- 10);
            var top = "10%";
            $(".modinha").css({'top':top,'left':left});
            $("#fundoP").show();
            var alturaTela = "180%";
            var larguraTela = "100%";

            //colocando o fundo preto
            $('#fundoP').css({'width':larguraTela,'height':alturaTela});
            $('#fundoP').fadeIn(1000); 
            $("footer").css("margin-top", "390px");
            $('#fundoP').fadeTo("slow",0.8);
            $(".modinha").show();
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
            showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            }
            slides[slideIndex-1].style.display = "block";
            captionText.innerHTML = dots[slideIndex-1].alt;
            }

            
            
            function editarTopo(){
                if(abreEdit == 1){
                    $('.ETopo').css("display", "block");
                    $(".SumiuTopo").css("display", "none");
                    $(".btnPF").css("display", "inline");
                    $("#btnFe").text("Fechar");
                    abreEdit = 2;
                }else{
                    $('.ETopo').css("display", "none");
                    $(".SumiuTopo").css("display", "block");
                    $("#btnFe").text("Editar");
                    abreEdit = 1;
                }
            }

            function editarDescricao(){
                $(".btnXa").css("display", "none");
                $(".EDescricao").css("display", "block");
                if(abreDE == 1){
                    $('.EDescricao').css("display", "block");
                    $(".btnXa").css("display", "none");
                    $("#FechaD").text("Fechar");
                    abreDE = 2;
                }else{
                    $('.EDescricao').css("display", "none");
                    $(".btnXa").css("display", "block");
                    $("#FechaD").text("Editar");
                    abreDE = 1;
                }

            }