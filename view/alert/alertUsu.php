<?php
include_once '../../Db/daohelper.php';
session_start();
try{
 

    if(empty($_POST)){
        echo'<script>';
        echo"alert('Existem Campos Vazios!')";
        echo '</script>';
        echo'<script>';
        echo"location.href='../../index.php'";
        echo '</script>';
    }else{
        $cod = isset($_POST['codAlert'])?$_POST['codAlert']:null;
        $alert = isset($_POST['Alert'])?$_POST['Alert']:null;
        $conn = connection();
        $id = $_SESSION["id"];
        $sql = "insert into alert(msg_alert, cod_usu, cod_adm) values('$alert', '$cod', '$id')";
        $execute = executeQuery($conn, $sql);
        echo'<script>';
        echo"location.href='../../index.php'";
        echo '</script>';
        }
    

}catch (Exception $ex) {

}