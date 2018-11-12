CAx = 1;PFiltro = 1; UFiltro = 1;

function abreCadastro(){
    if(CAx == 1){
        $("#NewADM").css("transition","5s");
        $("#NewADM").css("display","block");
        $("#abriAdd").text("Fechar");
        $("#DesceMA").css("transition", ".25s .1s cubic-bezier(0, 1.07, 0, 1.02)");
        $("#DesceMA").css("margin-top", "300px");
        $("#abriAdd").css("margin-top", "245px");
        CAx = 2;
    }else{
        $("#NewADM").css("display","none");
        $("#abriAdd").css("margin-top", "0px");
        $("#DesceMA").css("margin-top", "0px");
        $("#abriAdd").text("+1 ADM");
        CAx = 1;
    }
}

function abrirF(){
            $(".somenteE").toggle("slow");
}

function alerta(){
    $(".CAlerta").css("display","block");
}
function FechaAlert(){
    $(".CAlerta").css("display","none");
}