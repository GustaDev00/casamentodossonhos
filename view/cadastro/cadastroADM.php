<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php
include_once '../../Db/daohelper.php';
session_start();
try{
    if($_SESSION["defini"] == false){
        echo "você não é um ADM!";
    }else{

    if(empty($_POST)){
        echo'<script>';
        echo"alert('Existem Campos Vazios!')";
        echo '</script>';
        echo'<script>';
        //echo"location.href='../../index.php'";
        echo '</script>';
    }else{
        $conn = connection();
        $nome = isset($_POST['nomeAdm'])?$_POST['nomeAdm']:null;
        $email = isset($_POST['emailAdm'])?$_POST['emailAdm']:null;
        $senha = isset($_POST['senhaAdm'])?$_POST['senhaAdm']:null;
        
        $verificEx = "SELECT * from adm where nome_adm = '$nome' or email_adm = '$email'";
        $execVE = executeSelect($conn, $verificEx);
        
        if($execVE->rowCount() > 0){
        echo'<script>';
        echo"alert('Nome ou Senha do ADM Já Existentes!')";
        echo '</script>';
        echo'<script>';
        echo"location.href='../../'";
        echo '</script>';
        }else{
            $insert = "insert into adm(nome_adm, email_adm, senha_adm, defini_adm)values('$nome', '$email', '$senha', '3')";
            $execI = executeQuery($conn, $insert);
        echo'<script>';
        echo"alert('Novo ADM Cadastrado Com Sucesso!')";
        echo '</script>';
        echo'<script>';
        echo"location.href='../../'";
        echo '</script>';
            }


        }
    


    }

}catch (Exception $ex) {

}