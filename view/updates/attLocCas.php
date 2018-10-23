<?php 

include_once '../../Db/daohelper.php';
session_start();
try{
   
    if(empty($_POST)){

    }else{
    $dia = isset($_POST['dia'])?$_POST['dia']:null;
    $horario = isset($_POST['hora'])?$_POST['hora']:null;
    $local = isset($_POST['local'])?$_POST['local']:null;
    $id = $_SESSION['id'];
  
    $conn = connection();
    
        if($_POST['dia'] > 0){
            
            $updateDia =  "UPDATE usuario 
                SET data_casal = '$dia'  
                WHERE cod_usu = '$id'; ";   
            $executeD = executeQuery($conn, $updateDia);
        }else{}
        
        if($_POST['hora'] > 0){
            
            $updateHora =  "UPDATE usuario
                            SET horario_casal = '$horario'
                            WHERE cod_usu = '$id';";
            $executeH = executeQuery($conn, $updateHora);
            

        }else{}

            if(empty($local)){}else{ 

                $updateLocal =  "UPDATE usuario
                            SET local_casal = '$local'
                            WHERE cod_usu = '$id';";
            $executeH = executeQuery($conn, $updateLocal);
            
            }
    }
    echo'<script>';
            echo"location.href='../perfil/perfil.php'";
            echo '</script>';

}catch (Exception $ex) {

}