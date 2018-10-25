<?php
include_once '../../Db/daohelper.php';
try{

    if(empty($_POST)){
        echo "123";
    }else{
        $nome = isset($_REQUEST['nome_convi'])?$_REQUEST['nome_convi']:null;
        $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
        $acomp = isset($_REQUEST['acomp'])?$_REQUEST['acomp']:null;
        $confirm = isset($_REQUEST['confirm'])?$_REQUEST['confirm']:null;
        $celular = isset($_REQUEST['celular'])?$_REQUEST['celular']:null;
        $id = $_GET['id'];
        $select = "SELECT * FROM CONVIDADOS WHERE EMAIL_CONV = '$email'";
        $conn = connection();
        $execute = executeSelect($conn, $select);
        //echo "$nome , $email , $acomp, $confirm, $celular, $id";
        if($nome == null or $email == null or $acomp == null or $confirm == null or $celular == null){
            echo "n tem nada";
            
           


        }else{
             if($execute->rowCount() > 0){
            echo "convidado ja cadastrado";
        }else{
       session_start();
       

       
       $sql = "INSERT INTO CONVIDADOS(email_conv, num_acomp, nome_convi, presenca, celular_conv, cod_usu)
                           VALUES('$email', '$acomp', '$nome', '$confirm', '$celular', '$id')";
    $executeInsert = executeQuery($conn, $sql);
     
   /* echo '<script>';
    echo "location.href='../index.php'";
    echo '</script>';*/
    
    }


    }

} 
}catch (Exception $ex) {

} 