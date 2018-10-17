<?php
        include_once '../../Db/daohelper.php';
        include_once '../mask/header.html';
        session_start();
        $_SESSION["email"]="";
        $_SESSION["senha"]="";
        
        if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){

        include_once 'perfil_vendedorL.html';
        }else{
            include_once 'index.html';
        }
        include_once '../mask/footer.html';
          
    ?>