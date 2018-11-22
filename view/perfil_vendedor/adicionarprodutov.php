<?php

include_once "../../Db/daohelper.php";
session_start();
try{
    if(empty($_POST)){
        echo'<script>';
        echo"location.href='../perfil/perfil.php'";
        echo '</script>';
    }else{

    if($_FILES['SImagemP'] == null){
        
    }else{
        $img = isset($_FILES['SImagemP'])?$_FILES['SImagemP']:NULL;
        $nome = isset($_POST['nomeproduto'])?$_POST['nomeproduto']:NULL;
        $preco = isset($_POST['precoproduto'])?$_POST['precoproduto']:NULL;

        $descricao = isset($_POST['descricao'])?$_POST['descricao']:NULL;
        $cat = isset($_POST['cat'])?$_POST['cat']:null;
        $local = isset($_POST['localproduto'])?$_POST['localproduto']:null;
        $sprod = isset($_POST['linkproduto'])?$_POST['linkproduto']:NULL;
        $id = $_SESSION['id'];

        $arquivo_tmp = $img[ 'tmp_name' ];
        $nom = $img[ 'name' ];
        $extensao = pathinfo ( $nom, PATHINFO_EXTENSION );
        //$extensao = strtolower ( $extensao );
       
        if ( strstr ( '.jpg;.jpeg;.gif;.png;', $extensao) ) {
            $novoNome = uniqid ( time () ) . '.' . $extensao;
            $destino = '../_imagem_usuario/'.$novoNome;

                $conn = connection();
                $categoria = "select * from categoria where nome_categoria = '$cat';";
                $execute = executeSelect($conn, $categoria);
                $fetch = $execute->fetch(PDO ::FETCH_OBJ);
                $codCat = $fetch->cod_categoria;
                
                $sql = "insert into produto(nome_prod, preco_prod, desc_prod,
                url_foto_prod, local_prod, iz_prod, cod_empresa, cod_categoria)
                values('$nome', '$preco', '$descricao', '$destino', '$local', '$sprod' ,'$id', '$codCat');";
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