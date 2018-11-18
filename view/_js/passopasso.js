// funcao para desabilitar o campo de formulario de empresa ou do casal
// a função também ira trocar o action no form, para assim enviar o formulario para a pagina de cadastro correto
function testee(x){
    if(x == 1){
        $("#msform").attr("action","cadastroEmpresa.php");
        $(".cadastro_Empresa").css("display","block");
        $("#viaC").css("display","block");
        $("#proximo").css("display","block");
        
        $(".cadastro_casal").css("display","none");
    } else{
        $("#msform").attr("action","cadastroCasal.php");
        $(".cadastro_casal").css("display","block");
        $("#viaC").css("display","block");
        $("#proximo").css("display","block");
        
        $(".cadastro_Empresa").css("display","none");
    }
}





//Criando variaveis para troca a caixa 
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(function(){
    // função que ira pegar o nome e o tipo do cadastrante    
    $("#proximo").click(function(){
        var CTipo = $("#SelecaoTipoC option:selected").val(), CNome = $("#NomedoCasal").val();
        if(CTipo == "Selecione"){
            CTipo = "Volte para selecionar";
        }else{}
        if(CNome == ""){
            CNome = "Volte e defina o Nome";
        }
        $(".InfodoC:first-child").text(CNome);
        $(".InfodoC:Last-child").text(CTipo);
        });

        // funcao que remove o campo de folmulario dependendo da escolha acima
$("#valor").click(function(){
    var submi =  $("#msform").attr("action");
    if(submi == "cadastroCasal.php"){
        
        if($("#imgChooser").val() == ""){
            alert("Escolha uma imagem!");
        }else if($("#segundoCasal").val() == ""){
            alert("Defina o nome do parceiro");
        }else if($("#segundoCasal").val() == ""){
            alert("Defina o nome do parceiro");
        }else if($("#PSDB option:selected").val() == "Selecione"){
            alert("Escolha o gênero!");
        }else if($("#DTC2").val() == ""){
            alert("Digite a data de nascimento!");
        }else{
            $(".cadastro_Empresa").remove();
        }
        
    }else{
        if($("#imgChooser").val() == ""){
            alert("Escolha uma imagem!");
        }else if($("#TELC").val() == ""){
            alert("Digite um numero!");
        }else if($("#CCE option:selected").val() == "Selecione a Categoria:"){
            alert("Escolha uma Categoria");
        }else{
            $(".cadastro_casal").remove();
        }
    }
    $("#valor").submit();
    });
    
//else{anima();}
// funcção proximo
$(".next").click(function(){
    if($("#msform").attr("action") == "cadastroEmpresa.php"){

        if($("#NMC").val() == ""){
            alert("Digite o Nome da empresa!");
        }else if($(".CNPJC").val() ==  ""){
            alert("Digite o CNPJ!");
        }else if($("#EMC").val() == ""){
            alert("Digite o email!");
        }else if($("#SAC").val() == ""){
            alert("Digite a senha!");
        }else if($("#CSAC").val() == ""){
            alert("Digite o confirmar senha!");
        }else if($("#SAC").val() != $("#CSAC").val()){
            alert("As senhas não estão iguais.");
        }else if($("#cep").val() == ""){
            alert("Digite o CEP!");
        }else if($("#rua").val() == ""){
            alert("Digite a rua!");
        }else if($("#bairro").val() == ""){
            alert("Digite o bairro!");
        }else if($("#cidade").val() == ""){
            alert("Digite a cidade!");
        }else if($("#uf").val() == ""){
            alert("Digite o estado!");
        }else{anima();}
    }else if($("#msform").attr("action") == "cadastroCasal.php"){
        
        if($(".NMC").val() == ""){
            alert("Digite o Nome!");
        }else if($("#SelecaoTipoC option:selected").val() ==  "Selecione"){
            alert("Selecione o gênero!");
        }else if($(".EMC").val() == ""){
            alert("Digite o email!");
        }else if($(".SAC").val() == ""){
            alert("Digite a senha!");
        }else if($(".CSAC").val() == ""){
            alert("Digite o confirmar senha!");
        }else if($(".SAC").val() != $(".CSAC").val()){
            alert("As senhas não estão iguais.");
        }else if($(".DTC").val() == ""){
            alert("Digite a data de nascimento!");
        }else if($("#cep").val() == ""){
            alert("Digite o CEP!");
        }else if($("#rua").val() == ""){
            alert("Digite a rua!");
        }else if($("#bairro").val() == ""){
            alert("Digite o bairro!");
        }else if($("#cidade").val() == ""){
            alert("Digite a cidade!");
        }else if($("#uf").val() == ""){
            alert("Digite o estado!");
        }else{anima();}
    }
    function anima(){
        if(animating) return false;
animating = true;

current_fs = $(".next").parent();
next_fs = $(".next").parent().next();

//activate next step on progressbar using the index of next_fs
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show(); 
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale current_fs down to 80%
        scale = 1 - (1 - now) * 0.2;
        //2. bring next_fs from the right(50%)
        left = (now * 50)+"%";
        //3. increase opacity of next_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({
    'transform': 'scale('+scale+')'
  });
        next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
        current_fs.hide();
        animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
});
    }

});

//funcao para volta
$(".previous").click(function(){
if(animating) return false;
animating = true;

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//de-activate current step on progressbar
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show(); 
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale previous_fs from 80% to 100%
        scale = 0.8 + (1 - now) * 0.2;
        //2. take current_fs to the right(50%) - from 0%
        left = ((1-now) * 50)+"%";
        //3. increase opacity of previous_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({'left': left});
        previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
        current_fs.hide();
        animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
});
});

$(".submit").click(function(){
return false;
});

// funcao de limpa o Cep (Via Cep)
function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }
        
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {
            

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").attr("placeholder","...");
                    $("#bairro").attr("placeholder","...");
                    $("#cidade").attr("placeholder","...");
                    $("#uf").attr("placeholder","...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });

// funcao de carregar a imagem que o usuario subir
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




});

    