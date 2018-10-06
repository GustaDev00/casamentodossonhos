<?php
    if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
        echo "usuario logado";
        $footer = "roda logado";       
    }else{
        echo "deslogado";
        $footer = "roda deslogado";        
    }

        include_once 'listaproduto.php';
        include_once 'index.html';
       
        echo $footer;
            

      
?>