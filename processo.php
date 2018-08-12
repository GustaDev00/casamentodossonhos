<!--<!DOCTYPE html>
<html>
<head>
	<title>Autenticando Usuário</title>-->
	<script type="text/javascript">
		function loginsucessfully(){
			setTimeout("window.location='login.html'", 1);
                        alert('faça um login para continuar');
		}

	</script>
<!--</head>
<body>-->

<?php

include("./Db/daohelper.php");
//session_start();
if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
	//header("Location: login_usuarios/login.php");
	//exit;
  
  
}else{
	//echo "<center>VocÊ está logado! :D</center>";
     echo "<script>loginsucessfully()</script>";
}