<?php
        require_once '../../Db/daohelper.php';
        session_start();
        include_once '../mask/header.html';
        $conn = connection();
        $nomeCat = isset($_GET['categoria'])?$_GET['categoria']:null;
        if($nomeCat == true){
            $sql = "select * from categoria where nome_categoria = '$nomeCat'";
            $exec = executeSelect($conn, $sql);
            $fetch = $exec->fetch(PDO::FETCH_OBJ);
            $codCat = $fetch->cod_categoria;
            include_once 'categoria.php';
           
        }else{
            include_once 'listaproduto.php';
            
        }
    
        include_once 'loja.html';

        include_once '../mask/footer.html';
       
          
    ?>