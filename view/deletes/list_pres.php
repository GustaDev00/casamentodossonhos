<?php

require_once '../../Db/daohelper.php';
session_start();

try{
    if(empty($_POST)){
       
    }else{
        $id = $_SESSION['id'];
        $nomePres = isset($_REQUEST['nomePres'])?$_REQUEST['nomePres']:null;
        $conn = connection();
        $delete = "DELETE FROM lista_presente WHERE nome_valor_presente = '$nomePres' AND cod_usu = '$id'";
        $executeDelete = executeQuery($conn, $delete);
        echo "<script>location.href='../perfil/perfil.php'</script>";
    }
    
    

} catch (Exception $ex) {

}