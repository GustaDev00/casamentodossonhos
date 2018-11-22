<?php
include_once '../../Db/daohelper.php';


try{

    if(empty($_POST)){
       
    }else{
        $emailConvidado = isset($_POST['confirmEmail'])?$_POST['confirmEmail']:null;
        //echo $emailConvidado;
        $id = isset($_REQUEST['idD'])?$_REQUEST['idD']:NULL;
        $idPres = isset($_REQUEST['iDD'])?$_REQUEST['iDD']:NULL;
        $conn = connection();
        $select = "select * from convidados where email_conv = '$emailConvidado' and cod_usu = '$id';";
        $executeSelect = executeSelect($conn, $select);

        if($executeSelect->rowCount() > 0){
            $fetch4 = $executeSelect->fetch(PDO::FETCH_OBJ);
            $idConv = $fetch4->cod_conv;
            $verific = "select * from lista_presentes where cod_list_pres = '$idPres' and status_presente = 'Confirmado';";
            $executeVerific = executeSelect($conn, $verific);
            if($executeVerific->rowCount() > 0){
                echo '<script>';
                echo 'alert("Alguem já irá dar este Presente! Por favor, Selecione Outro Presente!")';
                echo '</script>';
                echo '<script>';
                echo "location.href='javascript:history.go(-1)'";
                echo '</script>';
                
            }else{
           $update = "update lista_presentes set status_presente = 'Confirmado', COD_CONV = '$idConv' where cod_usu = '$id' and  cod_list_pres = '$idPres' ";
           $sql = executeQuery($conn, $update);
           echo '<script>';
           echo "location.href='javascript:history.go(-1)'";
           echo '</script>';    
            }
        }else{
            echo "asdads";
            echo '<script>';
            echo 'alert("Você ainda não está na lista de convidados! Por favor Confirme a Presença Primeiro!")';
            echo '</script>';

            echo '<script>';
            echo "location.href='javascript:history.go(-1)'";
            echo '</script>';
        }
    }

}catch (Exeption $ex){

}