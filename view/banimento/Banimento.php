<?php
include_once '../../Db/daohelper.php';
try{
    session_start();
    $conn = connection();

    $email = isset($_GET["emailB"])?$_GET["emailB"]:NULL;
$fp = fopen("checkBan.txt", "a");
 
// Escreve "exemplo de escrita" no bloco1.txt
date_default_timezone_set('America/Sao_Paulo');
$hora =  date('d-m-y');
$horaBanimento =  date('d');
$horaBanimento = $horaBanimento + 5;
$horaBanimento = date($horaBanimento. '-m-y');
$escreve = fwrite($fp, "$email~$horaBanimento,");
 
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