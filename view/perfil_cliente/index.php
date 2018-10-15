<?php
        include_once '../../Db/daohelper.php';

        if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){

        include_once 'perfil_clienteL.html';
        }else{
            include_once 'index.html';
        }
       
          
    ?>