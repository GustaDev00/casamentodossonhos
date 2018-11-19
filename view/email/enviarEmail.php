<?php

include_once '../../Db/daohelper.php';

try{

    if(empty($_POST)){
        echo "post vazio";
    }else{
        
        //$emailO = isset($_POST['Email'])?$_POST['Email']:null;
        $conn = connection();
        $msg = isset($_POST['msg'])?$_POST['msg']:null;
        $email = isset($_POST['emailE'])?$_POST['emailE']:null;
        $nomeProd = isset($_POST['nomeProd'])?$_POST['nomeProd']:null;
        $id = $_SESSION["id"];
        $emailUsu = "select * from usuario where cod_usu ='$id'";
        $execute = executeSelect($conn, $emailUsu);
        $fetch = $execute->fetch(PDO::FETCH_OBJ);
        $emailU = $fetch->email_usu;
        $nomeU = $fetch->nome_usu;
        
        $destino = "$email";
        $arquivo = "Mensagem referente ao produto $nomeProd: <br> $msg";
        $assunto = "Casamento dos Sonhos - Contato Produto";
        
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= "From: $nomeU <$emailU>" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $enviaremail = mail($destino, $assunto, $arquivo, $headers);
        if($enviaremail){$mgm = "E-mail enviado com sucesso";
        echo $mgm;
        }else{
            $mgm = "erro ao enviar mensagem";
            echo $mgm;
        }

        
    }
} catch(Exeption $ex){

}

?>