<?php
        include_once '../mask/header.html';
        
        if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){

        include_once 'perfil_clienteL.html';
        }else{
            include_once 'index.html';
        }
        include_once '../mask/footer.html';
          
    ?>