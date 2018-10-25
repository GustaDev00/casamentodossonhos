<?php

include_once '../../Db/daohelper.php';

try{

    if(empty($_POST)){
        echo "post vazio";
    }else{
        
        $emailO = isset($_POST['Email'])?$_POST['Email']:null;
        $assunto = isset($_POST['Assunto'])?$_POST['Assunto']:null;
        $msg = isset($_POST['mensagem'])?$_POST['mensagem']:null;
        $idProd = isset($_GET['cod'])?$_GET['cod']:null;
    
        $sql = "SELECT *
                FROM EMPRESA E
                INNER JOIN PRODUTO P
                ON E.COD_EMPRESA = P.COD_EMPRESA
                WHERE E.COD_EMPRESA = P.COD_EMPRESA
                AND P.COD_PRODUTO = '$idProd' ";
        $pdo = connection();
        $execute = executeSelect($pdo, $sql);
        if($execute->rowCount() > 0){
        $fetch = $execute->fetch(PDO::FETCH_OBJ);
        $email = $fetch->email_empre;
        echo $email;
        
        $to = "$email";
$subject = "$assunto";
$txt = "$msg";
$headers = "From: $emailO" . "\r\n" .
"CC: $email";

mail($to,$subject,$txt,$headers);



echo "A mensagem de e-mail foi enviada.";

        }else{ echo "Select Nao encontrado";}
    }
} catch(Exeption $ex){

}

?>