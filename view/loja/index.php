<?php
    if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
        echo "usuario logado";
        $footer = "roda logado";       
    }else{
        include_once '../header.html';
        $footer = '../footer.html';        
    }

        include_once 'listaproduto.php';
        include_once 'index.html';
       
        include_once $footer;
            

      
?>