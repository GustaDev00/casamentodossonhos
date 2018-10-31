<?php
require_once '../../Db/daohelper.php';
session_start();

try{
    $idFoto = isset($_GET['cod_foto_empre'])?$_GET['cod_foto_empre']:null;
    $id = $_SESSION['id'];
    echo $id;
    echo $idFoto;
    $sql = "DELETE FROM FOTOS_EMPRESA WHERE COD_FOTO = '$idFoto' AND COD_EMPRESA = '$id'";
    $conn = connection();
    $execute = executeQuery($conn, $sql);
    

} catch (Exception $ex) {

}