
<script type="text/javascript">
		function loginsucessfully(){
			setTimeout("location.href='perfil.php'", 1);
                        
		}

	</script>
<?php

require_once './Db/daohelper.php';
$email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
$senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:null;
    

    $pdo= connection();

    $verificar = ("SELECT email, senha_usu from usuario where 
            email='$email' and senha_usu='$senha';");

//    $validarlogin->bindValue(":email", $_POST['email']);
//    $validarlogin->bindValue(":senha", md5($_POST['senha']));
//    $validarlogin->execute();
$validarLogin = executeSelect($pdo, $verificar);
$fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
//$id = $fetch->cod_usuario;
$count = $validarLogin->rowCount();
    if($count > 0)
    {
        session_start();
        $_SESSION["email"]= $_POST["email"];
        $_SESSION["senha"]= $_POST["senha"];
        //$_SESSION["id"]= $id;
            echo "<script>alert('Logado Com Sucesso!');
              loginsucessfully();
                </script>";
        }
      
    else
    {
        echo "<script>alert('Usuarios Ou Senha Incorretos!');
            top.location.href='login.html';
            </script>";
    }
