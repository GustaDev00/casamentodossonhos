<?php
require_once '../../Db/daohelper.php';
session_start();

try{
 if(empty($_POST)){
     echo "post vazio";
 }else{
    $nomeF = isset($_POST['nomefoto'])?$_POST['nomefoto']:null;
    $img= isset($_FILES['EImagem'])?$_FILES['EImagem']:null;
    $desc = isset($_POST['descFoto'])?$_POST['descFoto']:null;
    $id = $_SESSION['id'];
    $idFoto = isset($_POST['codfoto'])?$_POST['codfoto']:null;
    if($_FILES['EImagem'] == null){
        echo "vazio";
    }else{
        echo $_POST['codfoto'];
       /* $arquivo_tmp = $img[ 'tmp_name' ];
    $nome = $img[ 'name' ];
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    $extensao = strtolower ( $extensao );
  
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ) . '.' . $extensao;
            $destino = '../_imagem_usuario/'.$novoNome;
           
            $sql = "UPDATE fotos_empresa
                    SET NOME_FOTO = '$nomeF', DESC_FOTO = '$desc', URL_FOTO_EMPRESA='$destino'
                    WHERE";
          
          //   @move_uploaded_file ( $arquivo_tmp, "$destino" );
                
        }*/
    }
 
}
} catch (Exception $ex) {

}