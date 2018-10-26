<?php
include_once '../../Db/daohelper.php';


try{

    if(empty($_POST)){
        echo "ta vazio";
    }else{
        $emailConvidado = isset($_POST['confirmEmail'])?$_POST['confirmEmail']:null;
        $id = $_GET['cod'];
        $conn = connection();
        $select = "SELECT * FROM CONVIDADOS WHERE EMAIL_CONV = '$emailConvidado'";
        $executeSelect = executeSelect($conn, $select);
        $fetch = $executeSelect->fetch(PDO::FETCH_OBJ);
        $idConv = $fetch->cod_conv;
        if($executeSelect->rowCount() > 0){
            $verific = "SELECT * FROM LISTA_PRESENTES WHERE COD_CONV = '$idConv' AND STATUS_PRESENTE = 'Confirmado';";
            $executeVerific = executeSelect($conn, $verific);
            if($executeVerific->rowCount() > 0){
                echo '<script>';
                echo 'alert("Alguem já irá dar este Presente! 
                            Por favor, Selecione Outro Presente!")';
                echo '</script>';
                echo "alguem ja vai da o presente seu lixo";
                
            }else{
           $update = "UPDATE LISTA_PRESENTES SET STATUS_PRESENTE = 'Confirmado', COD_CONV = '$idConv' WHERE COD_USU = '$id'";
           $sql = executeQuery($conn, $update);
            }
        }else{
            echo '<script>';
            echo 'alert("Você ainda não está na lista de convidados! <br>
                        Por favor Confirme a Presença Primeiro!")';
            echo '</script>';

            echo '<script>';
            echo "location.href='../index.php.'";
            echo '</script>';
        }
    }

}catch (Exeption $ex){

}