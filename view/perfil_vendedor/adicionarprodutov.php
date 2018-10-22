<?php

include_once "../../Db/daohelper.php";
session_start();
try{
    if(empty($_POST)){
        echo "TEM ALGO ERRADO CUZAO";
    }else{

    if($_FILES['SImagemP'] == null){
        echo "vazio porra";
    }else{
        $img = isset($_FILES['SImagemP'])?$_FILES['SImagemP']:NULL;
        $nome = isset($_POST['nomeproduto'])?$_POST['nomeproduto']:NULL;
        $preco = isset($_POST['precoproduto'])?$_POST['precoproduto']:NULL;

        $descricao = isset($_POST['descricao'])?$_POST['descricao']:NULL;
        $cat = isset($_POST['cat'])?$_POST['cat']:null;
        $local = isset($_POST['localproduto'])?$_POST['localproduto']:null;
        $id = $_SESSION['id'];

        $arquivo_tmp = $img[ 'tmp_name' ];
        $nom = $img[ 'name' ];
        $extensao = pathinfo ( $nom, PATHINFO_EXTENSION );
        //$extensao = strtolower ( $extensao );
       
        if ( strstr ( '.jpg;.jpeg;.gif;.png;', $extensao) ) {
            $novoNome = uniqid ( time () ) . '.' . $extensao;
            $destino = '../_imagem_usuario/'.$novoNome;

                $conn = connection();
                $categoria = "SELECT * FROM CATEGORIA WHERE NOME_CATEGORIA = '$cat';";
                $execute = executeSelect($conn, $categoria);
                $fetch = $execute->fetch(PDO ::FETCH_OBJ);
                $codCat = $fetch->cod_categoria;
                
                $sql = "INSERT INTO PRODUTO(NOME_PROD, PRECO_PROD, DESC_PROD,
                URL_FOTO_PROD, LOCAL_PROD, COD_EMPRESA, COD_CATEGORIA)
                VALUES('$nome', '$preco', '$descricao', '$destino', '$local', $id, $codCat);";
                $insert = executeQuery($conn, $sql);
                @move_uploaded_file ( $arquivo_tmp, "$destino" );
                
                
               
               echo'<script>';
               echo"location.href='../perfil/perfil.php'";
               echo '</script>';
        }
    
//var_dump($_POST);
    }
    }
}catch (Exception $ex){}