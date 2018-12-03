<?php
        include_once '../mask/header.html';
        if(isset($_GET['codigo']) and isset($_GET['par'])){
            if(isset($_SESSION["defini"]) != 3){
                include_once 'index.html';   
            }else{
                include_once 'empresa.html';
            }
        }else   if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
            include_once 'perfil_vendedorL.html';
        }else{}

            include_once '../mask/footer.html';
    ?>