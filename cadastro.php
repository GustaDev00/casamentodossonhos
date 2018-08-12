<?php

include_once './Db/daohelper.php';
try{
    if(empty($_POST)){
        echo'<script>';
        echo"location.href='index.php'";
        echo '</script>';
    }else{
        $nome = isset($_REQUEST['nome'])?$_REQUEST['nome']:null;
        $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
        $senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:null;
        
        if($nome == null or $email == null or $senha == null){
            echo '<script>';
            echo 'alert("Preencha todos os campos")';
            echo '</script>';

            echo '<script>';
            echo "location.href='cadastro.php'";
            echo '</script>';
        }else{
            $conn = connection();
            $verificar = "SELECT email FROM usuario WHERE email = '$email'";
            $querySelect = executeSelect($conn, $verificar);
            
            if($querySelect->rowCount() > 0){
                echo '<script>';
                echo 'alert("O email que você digitou ja esta cadastrado!")';
                echo '</script>';

                echo '<script>';
                echo "location.href='cadastro.php'";
                echo '</script>';
            }else{
                $queryInsert = "INSERT INTO usuario(email, nome_usu, senha_usu, url_foto_usu)
                         VALUES('$email', '$nome', '$senha','NADA')";
                if(executeQuery($conn, $queryInsert)){
                $querySelect2 = executeSelect($conn, "SELECT cod_usuario FROM usuario ORDER BY cod_usuario DESC LIMIT 1");
                $cod_usu = $querySelect2->fetch(PDO ::FETCH_OBJ);
                $ultimoCod = $cod_usu->cod_usuario;
                session_start();
                $_SESSION['cod_usuario'] = $ultimoCod;
                    echo '<script>';
                    echo 'alert("Seu cadastro foi realizado com sucesso")';
                    echo '</script>';
                    echo '<script>';
                    echo "location.href='login.html'";
                    echo '</script>';
                }else{
                    echo '<script>';
                        echo 'alert("Ops, erro ao cadastrar")';
                        echo '</script>';

                        echo '<script>';
                        echo "location.href='index.php'";
                        echo '</script>';
                }
            }
            
        }
    }
    
    
    
} catch (Exception $ex) {

}