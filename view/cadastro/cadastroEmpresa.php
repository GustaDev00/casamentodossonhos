<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php

include_once '../../Db/daohelper.php';
include_once '../funcoes/funcoes.php';
try{
    if(empty($_POST)){
        echo'<script>';
        echo"location.href='../cadastro/'";
        echo '</script>';
    }else{
        $nomeEmpresa = isset($_REQUEST['nomeEmpresa'])?$_REQUEST['nomeEmpresa']:null;
        $cnpj = isset($_REQUEST['cnpjEmpresa'])?$_REQUEST['cnpjEmpresa']:null;
        $emailEmpresa = isset($_REQUEST['emailEmpresa'])?$_REQUEST['emailEmpresa']:null;
        $senhaEmpresa = isset($_REQUEST['senhaEmpresa'])?$_REQUEST['senhaEmpresa']:null;
        $confirmaSenhaEmpresa = isset($_REQUEST['confirmar_senhaEmpresa'])?$_REQUEST['confirmar_senhaEmpresa']:null;
        $cepEmpresa = isset($_REQUEST['cep'])?$_REQUEST['cep']:null;
        $ruaEmpresa = isset($_REQUEST['rua'])?$_REQUEST['rua']:null;
        $bairroEmpresa = isset($_REQUEST['bairro'])?$_REQUEST['bairro']:null;
        $cidadeEmpresa = isset($_REQUEST['cidade'])?$_REQUEST['cidade']:null;
        $ufEmpresa = isset($_REQUEST['uf'])?$_REQUEST['uf']:null;
        $imagemEmpresa = isset($_FILES['SImagem'])?$_FILES['SImagem']:null;
        $telEmpresa = isset($_REQUEST['telEmpresa'])?$_REQUEST['telEmpresa']:null;
        $categoriaEmpresa = isset($_REQUEST['cate'])?$_REQUEST['cate']:null;
    }
   


        if($nomeEmpresa == null or $cnpj == null or $emailEmpresa == null 
        or $senhaEmpresa == null or $confirmaSenhaEmpresa == null or $cepEmpresa == null
         or $ruaEmpresa == null or $bairroEmpresa == null or $cidadeEmpresa == null
          or $ufEmpresa == null or $imagemEmpresa == null 
        or $telEmpresa == null or $categoriaEmpresa == null){
            echo '<script>';
            echo 'alert("Preencha todos os campos")';
            echo '</script>';

            echo '<script>';
            echo "location.href='../cadastro/'";
            echo '</script>';
        }else{

            
            if ( isset( $imagemEmpresa[ 'name' ] ) && $imagemEmpresa[ 'error' ] == 0 ) {
                $arquivo_tmp = $imagemEmpresa[ 'tmp_name' ];
                $nome = $imagemEmpresa[ 'name' ];
                $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
                $extensao = strtolower ( $extensao );
                
                }else{
                        echo 'Não foi possive subir sua imagem, Tente novamente.<br />';
                }
             
                // Somente imagens, .jpg;.jpeg;.gif;.png
                // Estão enfileradas of formatos permitidos e separados por ; 
                // Isso serve apenas para poder pesquisar dentro desta String
                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                    
                // Cria um nome único para esta imagem, Evita nomes com acentos, espaços e caracteres
                    $novoNome = uniqid ( time () ) . '.' . $extensao;
                    $destino = '../_imagem_usuario/' .$novoNome;
                    
                    }else{
                    echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
                    }
            
                     @move_uploaded_file ( $arquivo_tmp, $destino );

            $conn = connection();
            $verificar = "select * from empresa where email_empre = '$emailEmpresa' or cnpj_empre = '$cnpj'";
            $querySelect = executeSelect($conn, $verificar);
            
            if($querySelect->rowCount() > 0){
                echo '<script>';
                echo 'alert("O email ou Cnpj que você digitou ja esta cadastrado!")';
                echo '</script>';

                echo '<script>';
                echo "location.href='../cadastro/'";
                echo '</script>';
               
            }else{
                validar_cnpj($cnpj);
           
            if($cnpj == false){
                echo '<script>';
                echo 'alert("Cnpj Inválido!!!")';
                echo '</script>';
                echo '<script>';
                echo "location.href='../cadastro/'";
                echo '</script>';
}else{
                $queryInsert = "insert into empresa(nome_empre, cnpj_empre, email_empre, senha_empre, 
                cep_empre,  rua_empre, bairro_empre, cidade_empre, estado_empre, foto_empre, tel_empre,  
                categoria_empre, defini_empre)
                         values('$nomeEmpresa', '$cnpj', '$emailEmpresa', '$senhaEmpresa', '$cepEmpresa'
                         , '$ruaEmpresa', '$bairroEmpresa', '$cidadeEmpresa', '$ufEmpresa', '$destino',
                          '$telEmpresa', '$categoriaEmpresa', '2')";
                if(executeQuery($conn, $queryInsert)){
                $querySelect2 = executeSelect($conn, "SELECT cod_empresa FROM empresa ORDER BY cod_empresa DESC LIMIT 1");
                //$cod_usu = $querySelect2->fetch(PDO ::FETCH_OBJ);
                //$ultimoCod = $cod_usu->cod_usuario;
                session_start();
                //$_SESSION['cod_usuario'] = $ultimoCod;
                    echo '<script>';
                    echo 'alert("Seu cadastro foi realizado com sucesso")';
                    echo '</script>';
                    echo '<script>';
                    echo "location.href='../login/'";
                    echo '</script>';
                }else{
                    
                    echo '<script>';
                        echo 'alert("Ops, erro ao cadastrar")';
                        echo '</script>';
                
                        echo '<script>';
                        echo "location.href='../cadastro/'";
                        echo '</script>';
                        
                }
            }
        }

    }
            }
            
      
    
    
    
  


    catch (Exception $ex) {

} 