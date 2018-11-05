<?php
include_once '../../Db/daohelper.php';


try{

    if(empty($_POST)){
        echo "ta vazio";
    }else{
        $emailConvidado = isset($_POST['confirmEmail'])?$_POST['confirmEmail']:null;
        echo $emailConvidado;
        $id = $_GET['cod'];
        $idPres = $_GET['?pres'];
        echo $idPres .'<br>';
        echo $id;
        $conn = connection();
        $select = "select * from convidados where email_conv = '$emailConvidado' and cod_usu = '$id';";
        $executeSelect = executeSelect($conn, $select);
        $fetch4 = $executeSelect->fetch(PDO::FETCH_OBJ);
        $idConv = $fetch4->cod_conv;
        
        if($executeSelect->rowCount() > 0){
            $verific = "select * from lista_presentes where cod_list_pres = '$idPres' and status_presente = 'Confirmado';";
            $executeVerific = executeSelect($conn, $verific);
            if($executeVerific->rowCount() > 0){
                echo '<script>';
                echo 'alert("Alguem já irá dar este Presente! 
                            Por favor, Selecione Outro Presente!")';
                echo '</script>';
                echo "alguem ja vai da o presente seu lixo";
                
            }else{
           $update = "update lista_presentes set status_presente = 'Confirmado', COD_CONV = '$idConv' where cod_usu = '$id'";
           $sql = executeQuery($conn, $update);
            }
        }else{
            echo '<script>';
            echo 'alert("Você ainda não está na lista de convidados! <br>
                        Por favor Confirme a Presença Primeiro!")';
            echo '</script>';

           /* echo '<script>';
            echo "location.href='../index.php.'";
            echo '</script>';*/
        }
    }

}catch (Exeption $ex){

}