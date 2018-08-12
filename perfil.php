<?php
require_once './Db/daohelper.php';
//require_once './processo.php';
//session_abort();
if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
	//header("Location: login_usuarios/login.php");
	//exit;
  
  
}else{
	//echo "<center>VocÊ está logado! :D</center>";
     echo "DEU CERTO";
}
$pdo= connection();

$verificar = ("SELECT * FROM USUARIO");

//    $validarlogin->bindValue(":email", $_POST['email']);
//    $validarlogin->bindValue(":senha", md5($_POST['senha']));
//    $validarlogin->execute();
$validarLogin = executeSelect($pdo, $verificar);
$fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
$id = $fetch->cod_usuario;

if(($_SESSION["id"] = $id) == true){
    $select = "select * from usuario where cod_usuario = '$id'";
    $execute = executeSelect($pdo, $select);
    $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
    $senha = $fetch2->senha_usu;
    echo $senha;
}
echo "VOCE ESTÁ LOGADO E ESTÁ NO PERFIL SEU MERDA";

?>

<form action="deslogar.php">
    <a href="deslogar.php"><button type="submit">DESLOGA</button></a>
</form>


<?php




             