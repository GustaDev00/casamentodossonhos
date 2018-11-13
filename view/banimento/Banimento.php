<?php
include_once '../../Db/daohelper.php';
try{
    session_start();
    $conn = connection();

    $email = isset($_GET['emailB'])?$_GET['emailB']:null;
$fp = fopen("checkBan.txt", "a");
 
// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, "$email");
 
// Fecha o arquivo
fclose($fp);

echo'<script>';
echo"alert('O usuário foi banido!')";
echo '</script>';
echo'<script>';
echo"location.href='../../index.php'";
echo '</script>';

}catch(Exception $ex){

}