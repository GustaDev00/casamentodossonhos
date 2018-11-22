<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php
include_once '../../Db/daohelper.php';
session_start();
try{
    if(empty($_FILES)){
        echo'<script>';
        echo"location.href='index.html'";
        echo '</script>';
    }else{
$imagemCasal = isset($_FILES['img_local'])?$_FILES['img_local']:null;

if($_FILES['img_local'] == null){
   
}else{
    $arquivo_tmp = $imagemCasal[ 'tmp_name' ];
    $nome = $imagemCasal[ 'name' ];
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
    $extensao = strtolower ( $extensao );
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
            $query = "update usuario set foto_local = '$destino' where email_usu = '$email'";
            
            $execute = executeQuery($conn, $query);
            echo'<script>';
            echo"location.href='../perfil/perfil.php'";
            echo '</script>';
    }
}
    }
}catch (Exception $ex) {

}