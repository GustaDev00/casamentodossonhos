<?php
        include_once '../mask/header.html';
        if(isset($_GET['codigo']) and isset($_GET['par'])){
            include_once 'index.html';
        }else   if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
            include_once 'perfil_vendedorL.html';
        }else{}
        include_once '../mask/footer.html';
    ?>