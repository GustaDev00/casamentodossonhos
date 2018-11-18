<?php
include_once '../../Db/daohelper.php';
session_start();
try{
 
        $conn = connection();
    
        $email = isset($_GET['emailE'])?$_GET['emailE']:null;
      
        
        //Achando o cod_usu do usuario, vamos usar isso para deletar todas as suas informações de outras tabelas!
        $achCod = "select * from usuario where email_usu = '$email'";
        $select = executeSelect($conn, $achCod);
        $fetch = $select->fetch(PDO::FETCH_OBJ);
        $codU = $fetch->cod_usu;
        //Aqui começará os deletes!
        $del1 = "delete from alert where cod_usu = '$codU'";
        $exec1 = executeQuery($conn, $del1);
        //Caso não exista o cod em uma tabela, o query não será executada
        $del2 = "delete from favorita where cod_usu = '$codU'";
        $exec2 = executeQuery($conn, $del2);

        $del3 = "delete from convidados where cod_usu = '$codU'";
        $exec3 = executeQuery($conn, $del3);

        $del4 = "delete from lista_presentes where cod_usu = '$codU'";
        $exec4 = executeQuery($conn, $del4);
        
        $del5 = "delete from usuario where cod_usu = '$codU'";
        $exec5 = executeQuery($conn, $del5);
        
    
        echo'<script>';
        echo"alert('Todas as Informações do Usuário foram Excluídas!!!')";
        echo '</script>';
        echo'<script>';
        echo"location.href='../../index.php'";
        echo '</script>';
}catch (Exception $ex) {

}