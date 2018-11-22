<?php

include_once '../../Db/daohelper.php';
try{
if(empty($_POST)){
   
}else if(empty($_FILES)){
  
}else{
    session_start();
    $nomeFoto = isset($_POST['nomeFoto'])?$_POST['nomeFoto']:null;
    $descFoto = isset($_POST['descFoto'])?$_POST['descFoto']:null;
    $imgFoto = isset($_FILES['imgEsc'])?$_FILES['imgEsc']:null;

    $arquivo_tmp = $imgFoto[ 'tmp_name' ];
    $nom = $imgFoto[ 'name' ];
    $extensao = pathinfo ( $nom, PATHINFO_EXTENSION );
    $id = $_SESSION['id'];
    if ( strstr ( '.jpg;.jpeg;.gif;.png;', $extensao) ) {
        $novoNome = uniqid ( time () ) . '.' . $extensao;
        $destino = '../_imagem_usuario/'.$novoNome;

            $conn = connection();
          
            $sql = "INSERT INTO fotos_empresa(nome_foto, desc_foto, url_foto_empresa, cod_empresa)
            VALUES('$nomeFoto', '$descFoto','$destino', '$id');";
            $insert = executeQuery($conn, $sql);
            @move_uploaded_file ( $arquivo_tmp, "$destino" );
            
            
           
           echo'<script>';
           echo"location.href='../perfil/perfil.php'";
           echo '</script>';
    }

}
}catch (Exception $ex){}