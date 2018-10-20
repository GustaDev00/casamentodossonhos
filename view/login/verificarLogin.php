
<script type="text/javascript">
		function loginsucessfully(){
			setTimeout("location.href='../perfil/perfil.php'", 1);
                        
		}

	</script>
<?php

require_once '../../Db/daohelper.php';
$email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
$senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:null;
$pdo= connection();


    $verificar = "SELECT email_usu, senha_usu from usuario where email_usu='$email' and senha_usu='$senha';";
    $validarLogin = executeSelect($pdo, $verificar);
    $count = $validarLogin->rowCount();

    if($count > 0){
        session_start();
        $_SESSION["email"]= $_POST["email"];
        $_SESSION["senha"]= $_POST["senha"];
        $_SESSION["defini"] = 2;
        $verificar = ("SELECT cod_usu from usuario where email_usu = '$email' and senha_usu = '$senha';");
                $validarLogin = executeSelect($pdo, $verificar);
                $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
                $id = $fetch->cod_usu;
                $_SESSION["id"] = $id;

            echo "<script>alert('Logado Com Sucesso!');loginsucessfully(); </script>"; 
        }else{

            $verificar = "SELECT email_empre, senha_empre from empresa where email_empre='$email' and senha_empre='$senha';";
            $validarLogin = executeSelect($pdo, $verificar);
            $count = $validarLogin->rowCount();
            if($count > 0){
                session_start();
                $_SESSION["email"]= $_POST["email"];
                $_SESSION["senha"]= $_POST["senha"];
                $_SESSION["defini"] = 1;
                $verificar = ("SELECT cod_empresa from empresa where email_empre = '$email' and senha_empre = '$senha';");
                $validarLogin = executeSelect($pdo, $verificar);
                $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
                $id = $fetch->cod_empresa;
                
                $_SESSION["id"] = $id;

                echo "<script>alert('Logado Com Sucesso!');
                        loginsucessfully();
                </script>";
            }else{
            $verificar = "SELECT email_adm, senha_adm from adm where email_adm='$email' and senha_adm='$senha';";
            $validarLogin = executeSelect($pdo, $verificar);
            $count = $validarLogin->rowCount();
            if($count > 0){
                session_start();
                $_SESSION["email"]= $_POST["email"];
                $_SESSION["senha"]= $_POST["senha"];
                $_SESSION["defini"] = 3;
                $verificar = ("SELECT cod_adm from adm where email_adm = '$email' and senha_adm = '$senha';");
                $validarLogin = executeSelect($pdo, $verificar);
                $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
                $id = $fetch->cod_adm;
                $_SESSION["id"] = $id;
                echo "<script>alert('Logado Com Sucesso!');
                loginsucessfully();
                </script>";
                
            }else{
                echo "<script>alert('Usuarios Ou Senha Incorretos!');
                top.location.href='../login/';
                 </script>";
                }
    }
        }

    

