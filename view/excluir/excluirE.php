<?php
include_once '../../Db/daohelper.php';
session_start();
try{
 
        $conn = connection();
    
        $email = isset($_GET['emailE'])?$_GET['emailE']:null;
        //Achando o cod da empresa...
        $acharCod = "select * from empresa where email_empre = '$email'";
        $select = executeSelect($conn, $acharCod);
        $fetch = $select->fetch(PDO::FETCH_OBJ);
        $codE = $fetch->cod_empresa;
        
        //Começando os deletes...
        $del1 = "delete from alert where cod_empresa = '$codE'";
        $exec1 = executeQuery($conn , $del1);
        $del2 = "delete from fotos_empresa where cod_empresa = '$codE'";
        $exec1 = executeQuery($conn , $del2);
        $del3 = "delete from produto where cod_empresa = '$codE'";
        $exec1 = executeQuery($conn , $del3);
        $del4 = "delete from empresa where cod_empresa = '$codE'";
        $exec1 = executeQuery($conn , $del4);
    
        echo'<script>';
        echo"alert('Todas as Informações da Empresa foram Excluídas!!!')";
        echo '</script>';
        echo'<script>';
        echo"location.href='../../index.php'";
        echo '</script>';
}catch (Exception $ex) {

}