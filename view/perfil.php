<?php
require_once '../Db/daohelper.php';
//require_once './processo.php';
session_start();
if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
	//header("Location: login_usuarios/login.php");
    //exit;
    $email = $_SESSION["email"];
    $senha = $_SESSION["senha"];
    $pdo= connection();
    if($_SESSION["defini"] == 2){
        $select = "select * from usuario where cod_usu = '{$_SESSION["id"]}'";
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_usu;
        $senha = $fetch2->senha_usu;
        $email = $fetch2->email_usu;
        $imagemL = $fetch2->foto_usu;
        echo "Seu id é: '{$_SESSION["id"]}' <br>";
        echo "Seu email é: $email <br>";
        echo "Seu nome é: $nome <br>";
        echo "Sua senha é: $senha <br>";
        //echo ' <img src="' . $imagemL . '" >'. "<br>"/;

    }else if($_SESSION["defini"] == 1){
        
        $select = "select * from empresa where cod_empresa = '{$_SESSION["id"]}'";
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_empre;
        $senha = $fetch2->senha_empre;
        $email = $fetch2->email_empre;
        $imagemL = $fetch2->foto_empre;
        echo "Seu id é: '{$_SESSION["id"]}' <br>";
        echo "Seu email é: $email <br>";
        echo "Seu nome é: $nome <br>";
        echo "Sua senha é: $senha <br>";
        echo "<script>location.href='perfil_vendedor/index.php'</script>";
        //echo ' <img src="' . $imagemL . '" >'. "<br>";
    }else if ($_SESSION["defini"] == 3){
        $select = "select * from adm where cod_adm = '{$_SESSION["id"]}'";
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_adm;
        $senha = $fetch2->senha_adm;
        $email = $fetch2->email_adm;
        echo "Seu id é: '{$_SESSION["id"]}' <br>";
        echo "Seu email é: $email <br>";
        echo "Seu nome é: $nome <br>";
        echo "Sua senha é: $senha <br>";
        echo "<script>location.href='index.html'</script>";

    }
    ?>

    <form action="deslogar.php">
        <a href="deslogar.php"><button type="submit">DESLOGA</button></a>
    </form>
  <?php
}else{
	echo "<script>alert('Faça o Login para continuar!');</script>";
    echo "<script>location.href='login.html'</script>";
}







             