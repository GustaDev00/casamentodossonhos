<?php
include_once '../../Db/daohelper.php';
session_start();
try{
    if(empty($_FILES)){
        echo'<script>';
        echo"location.href='index.html'";
        echo '</script>';
    }else{
$imagemCasal = isset($_FILES['img_perfil'])?$_FILES['img_perfil']:null;

if($_FILES['img_perfil'] == null){
    echo "vazio porra";
}else{ 
    $arquivo_tmp = $imagemCasal[ 'tmp_name' ];
    $nome = $imagemCasal[ 'name' ];
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    //$extensao = strtolower ( $extensao );
    $email = $_SESSION['email'];


 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Estão enfileradas of formatos permitidos e separados por ; 
    // Isso serve apenas para poder pesquisar dentro desta String
    
        
    // Cria um nome único para esta imagem, Evita nomes com acentos, espaços e caracteres
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        $novoNome = uniqid ( time () ) . '.' . $extensao;
        $destino = '../_imagem_usuario/'.$novoNome;
       
        //$delet = "DELETE FROM usuario
        //WHERE foto_usu = some_value";
        
         @move_uploaded_file ( $arquivo_tmp, "$destino" );
            

            $conn = connection();
            $query = "UPDATE USUARIO SET FOTO_USU = '$destino' where email_usu = '$email'";
            
            $execute = executeQuery($conn, $query);
            echo'<script>';
            echo"location.href='../perfil/perfil.php'";
        echo '</script>';
    }
}
    }
}catch (Exception $ex) {

}