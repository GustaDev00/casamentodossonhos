<?php
include ("./Db/daohelper.php");

$msg = false;
if(isset($_FILES['arquivo'])){
   session_start();
   $email = $_SESSION["email"];
    $conexao = connection();
    $ext = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $ext;
    $diretorio = "imagem_usuario/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
    
    $sql = "UPDATE USUARIO SET URL_FOTO_PERFIL='imagem_usuario / $novo_nome.jpg' where email = '$email' ");
    $queryUpdate = executeQuery($conexao, $sql);
    header("Location: perfil.php");
   
   
}
