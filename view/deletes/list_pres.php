<?php

require_once '../../Db/daohelper.php';
session_start();

try{
    if(empty($_POST)){
        echo "vazio tio";
    }else{
        $id = $_SESSION['id'];
        $nomePres = isset($_REQUEST['nomePres'])?$_REQUEST['nomePres']:null;
        $conn = connection();
        $delete = "DELETE FROM LISTA_PRESENTES WHERE NOME_VALOR_PRESENTE = '$nomePres' AND COD_USU = '$id'";
        $executeDelete = executeQuery($conn, $delete);
        echo "<script>location.href='../perfil/perfil.php'</script>";
    }
    
    

} catch (Exception $ex) {

}