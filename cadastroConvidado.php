<?php
include_once './Db/daohelper.php';
try{

    if(empty($_POST)){
        echo "123";
    }else{
        $nome = isset($_REQUEST['nome_convi'])?$_REQUEST['nome_convi']:null;
        $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
        $acomp = isset($_REQUEST['acomp'])?$_REQUEST['acomp']:null;
        $confirm = isset($_REQUEST['confirm'])?$_REQUEST['confirm']:null;
        $celular = isset($_REQUEST['celular'])?$_REQUEST['celular']:null;
        if($nome == null or $email == null or $acomp == null or $confirm == null or $celular == null){
            echo "n tem nada";
            
        }else{
       session_start();
       



    
    }


    }

} catch (Exception $ex) {

} 