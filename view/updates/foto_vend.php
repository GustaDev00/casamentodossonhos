<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
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
    $conn = connection();
    if(empty($img)){
       
    }else{
     $arquivo_tmp = $img[ 'tmp_name' ];
    $nome = $img[ 'name' ];
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    $extensao = strtolower ( $extensao );
    if(empty($extensao)){

    }else{
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            $novoNome = uniqid ( time () ) . '.' . $extensao;
            $destino = '../_imagem_usuario/'.$novoNome;
           
            $sql = "update fotos_empresa
            set url_foto_empresa='$destino'
            where cod_foto = '$idFoto' and cod_empresa = '$id';";
                    $exF = executeQuery($conn, $sql);
             @move_uploaded_file ( $arquivo_tmp, "$destino" );
                
        }
    }}
    if(empty($nomeF)){
      
        }else{
        $upN = "update fotos_empresa
                set nome_foto = '$nomeF'
                where cod_foto ='$idFoto' and cod_empresa='$id'";
        $exN = executeQuery($conn, $upN);
    }
    if(empty($desc)){}else{
        $upD = "update fotos_empresa
                set desc_foto = '$desc'
                where cod_foto = '$idFoto' and cod_empresa = '$id'";
        $exD = executeQuery($conn, $upD);
    }

    echo'<script>';
    echo"location.href='../perfil/perfil.php'";
    echo '</script>';
 
}
} catch (Exception $ex) {

}