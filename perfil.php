<?php
require_once './Db/daohelper.php';
//require_once './processo.php';
session_start();
if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
	//header("Location: login_usuarios/login.php");
	//exit;
    $pdo= connection();

    $verificar = ("SELECT * FROM USUARIO");
    
    //    $validarlogin->bindValue(":email", $_POST['email']);
    //    $validarlogin->bindValue(":senha", md5($_POST['senha']));
    //    $validarlogin->execute();
    $validarLogin = executeSelect($pdo, $verificar);
    $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
    $id = $fetch->cod_usu;
    
    if(($_SESSION["id"] = $id) == true){
        $select = "select * from usuario where cod_usu = '$id'";
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_usu;
        $senha = $fetch2->senha_usu;
        $email = $fetch2->email;
        echo "Seu id é: $id <br>";
        echo "Seu email é: $email <br>";
        echo "Seu nome é: $nome <br>";
        echo "Sua senha é: $senha <br>";
    }
    echo "VOCE ESTÁ LOGADO E ESTÁ NO PERFIL SEU MERDA";
    ?>

    <form action="deslogar.php">
        <a href="deslogar.php"><button type="submit">DESLOGA</button></a>
    </form>
  <?php
}else{
	echo "<script>alert('Faça o Login para continuar!');</script>";
    echo "<script>location.href='login.html'</script>";
}







             