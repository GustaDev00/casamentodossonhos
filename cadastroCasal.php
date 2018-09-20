<?php

include_once './Db/daohelper.php';
try{
    if(empty($_POST)){
        echo'<script>';
        echo"location.href='index.html'";
        echo '</script>';
    }else{
        $nomeCasal = isset($_REQUEST['nomeCasal'])?$_REQUEST['nomeCasal']:null;
        $casalDefinicao = isset($_REQUEST['casalDefinicao'])?$_REQUEST['casalDefinicao']:null;
        $emailCasal = isset($_REQUEST['emailCasal'])?$_REQUEST['emailCasal']:null;
        $senhaCasal = isset($_REQUEST['senhaCasal'])?$_REQUEST['senhaCasal']:null;
        $confirmaSenhaCasal = isset($_REQUEST['confirma_senhaCasal'])?$_REQUEST['confirma_senhaCasal']:null;
        $NascimentoCasal = isset($_REQUEST['NascimentoCasal'])?$_REQUEST['NascimentoCasal']:null;
        $cepCasal = isset($_REQUEST['cep'])?$_REQUEST['cep']:null;
        $ruaCasal = isset($_REQUEST['rua'])?$_REQUEST['rua']:null;
        $bairroCasal = isset($_REQUEST['bairro'])?$_REQUEST['bairro']:null;
        $cidadeCasal = isset($_REQUEST['cidade'])?$_REQUEST['cidade']:null;
        $ufCasal = isset($_REQUEST['uf'])?$_REQUEST['uf']:null;
        $imagemCasal = isset($_FILES['SImagem'])?$_FILES['SImagem']:null;
        $NomeParceiro = isset($_REQUEST['segundoCasal'])?$_REQUEST['segundoCasal']:null;
        $casalDefinicao2 = isset($_REQUEST['casalDefinicao2'])?$_REQUEST['casalDefinicao2']:null;
        $NascimentoCasal2 = isset($_REQUEST['NascimentoCasal2'])?$_REQUEST['NascimentoCasal2']:null;
        $DataCasal = isset($_REQUEST['DataCasal'])?$_REQUEST['DataCasal']:null;
        

        if($nomeCasal == null or $casalDefinicao == null or $emailCasal == null 
        or $senhaCasal == null or $confirmaSenhaCasal == null or $NascimentoCasal == null 
        or $cepCasal == null or $ruaCasal == null or $bairroCasal == null 
        or $cidadeCasal == null or $ufCasal == null or $imagemCasal == null 
        or $NomeParceiro == null or $casalDefinicao2 == null or $NascimentoCasal2 == null ){
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
                $queryInsert = "INSERT INTO usuario(nome_usu, tipo_usu, email_usu, senha_usu, 
                nascimento_usu, cep_usu,  rua_usu, bairro_usu, cidade_usu, estado_usu, foto_usu, nome_par_usu,  
                tipo_par_usu, nascimento_par_usu, data_casal)
                         VALUES('$nomeCasal', '$casalDefinicao' ,'$emailCasal', '$senhaCasal', '$NascimentoCasal', '$cepCasal'
                         , '$ruaCasal', '$bairroCasal', '$cidadeCasal', '$ufCasal', '$imagemCasal', '$NomeParceiro', '$casalDefinicao2'
                         , '$NascimentoCasal2', '$DataCasal')";
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
    
    
  
  var_dump($imagemCasal);  
} catch (Exception $ex) {

}