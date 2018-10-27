<?php
        //caso a pessoa logada acessar o link para ver o perfil dela, dei prioridade ao perfil deslogado entao ante
        //de carregar a pagina logada ira verificar se existe o codigo para assim carrega a pagina correta!!!
        include_once '../mask/header.html';
        if(isset($_GET['codigo']) and isset($_GET['par'])){
            include_once 'index.html';
        }else{
            
        if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){

        include_once 'perfil_clienteL.html';
        }else{
            include_once 'index.html';
        }
    }
        include_once '../mask/footer.html';
          
    ?>