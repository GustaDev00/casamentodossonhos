<?php
    include_once '../../Db/daohelper.php';
    if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
        //echo "usuario logado";
        $footer = "roda logado";       
    }else{
        //echo "deslogado";
        //$footer = "roda deslogado";        
    }

    $conn = connection();
    $verificar = "SELECT * FROM produto where produtoID ={$_GET['codigo']}" ;
    
    $querySelect = executeSelect($conn, $verificar);
    if($querySelect->rowCount() > 0){
    $fetch = $querySelect->fetch(PDO::FETCH_ASSOC);
    }else{ echo "erro ao carregar produto, por favor tente novamente."; }
    //var_dump($fetch);
        include_once 'index.html';
       
        //echo $footer;
            

      
?>