<?php

include_once './Db/daohelper.php';
try{
    if(empty($_POST)){
        echo'<script>';
        echo"location.href='index.html'";
        echo '</script>';
    }else{
        $nomeEmpresa = isset($_REQUEST['nomeEmpresa'])?$_REQUEST['nomeEmpresa']:null;
        $cnpjEmpresa = isset($_REQUEST['cnpjEmpresa'])?$_REQUEST['cnpjEmpresa']:null;
        $emailEmpresa = isset($_REQUEST['emailEmpresa'])?$_REQUEST['emailEmpresa']:null;
        $senhaEmpresa = isset($_REQUEST['senhaEmpresa'])?$_REQUEST['senhaEmpresa']:null;
        $confirmaSenhaEmpresa = isset($_REQUEST['confirma_senhaEmpresa'])?$_REQUEST['confirma_senhaEmpresa']:null;
        $cepEmpresa = isset($_REQUEST['cep'])?$_REQUEST['cep']:null;
        $ruaEmpresa = isset($_REQUEST['rua'])?$_REQUEST['rua']:null;
        $bairroEmpresa = isset($_REQUEST['bairro'])?$_REQUEST['bairro']:null;
        $cidadeEmpresa = isset($_REQUEST['cidade'])?$_REQUEST['cidade']:null;
        $ufEmpresa = isset($_REQUEST['uf'])?$_REQUEST['uf']:null;
        $imagemEmpresa = isset($_FILES['SImagem'])?$_FILES['SImagem']:null;
        $telEmpresa = isset($_REQUEST['telEmpresa'])?$_REQUEST['telEmpresa']:null;
        $categoriaEmpresa = isset($_REQUEST['cate'])?$_REQUEST['cate']:null;

        if($nomeEmpresa == null or $cnpjEmpresa == null or $emailEmpresa == null 
        or $senhaEmpresa == null or $confirmaSenhaEmpresa == null or $cepEmpresa == null
         or $ruaEmpresa == null or $bairroEmpresa == null or $cidadeEmpresa == null
          or $ufEmpresa == null or $imagemEmpresa == null 
        or $telEmpresa == null or $categoriaEmpresa == null){
            echo '<script>';
            echo 'alert("Preencha todos os campos")';
            echo '</script>';

            echo '<script>';
            echo "location.href='cadastro.html'";
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
                $queryInsert = "INSERT INTO usuario(nome_usu, cnpj_usu, email_usu, senha_usu, 
                cep_usu,  rua_usu, bairro_usu, cidade_usu, estado_usu, foto_usu, tel_usu,  
                categoria_usu)
                         VALUES('$nomeEmpresa', '$cnpjEmpresa', '$emailEmpresa', '$senhaEmpresa', '$cepEmpresa'
                         , '$ruaEmpresa', '$bairroEmpresa', '$cidadeEmpresa', '$ufEmpresa', '$imagemEmpresa',
                          '$telEmpresa', '$categoriaEmpresa')";
                if(executeQuery($conn, $queryInsert)){
                $querySelect2 = executeSelect($conn, "SELECT cod_usuario FROM usuario ORDER BY cod_usuario DESC LIMIT 1");
                //$cod_usu = $querySelect2->fetch(PDO ::FETCH_OBJ);
                //$ultimoCod = $cod_usu->cod_usuario;
                session_start();
                //$_SESSION['cod_usuario'] = $ultimoCod;
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
    
    
  
  var_dump($imagemEmpresa);  

} catch (Exception $ex) {

}