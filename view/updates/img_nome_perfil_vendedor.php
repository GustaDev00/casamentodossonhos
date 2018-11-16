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
        $img = isset($_FILES['fotoPV'])?$_FILES['fotoPV']:null;
        $nomePV = isset($_POST['nomePV'])?$_POST['nomePV']:null;
        $id = $_SESSION['id'];
        $conn = connection();
if(empty($img or $_FILES['fotoPV'])){echo "vazio";}else{
    
   $arquivo_tmp = $img[ 'tmp_name' ];
   $nome = $img[ 'name' ];
   $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
   $extensao = strtolower ( $extensao );
 if(empty($extensao)){}else{
       if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
           $novoNome = uniqid ( time () ) . '.' . $extensao;
           $destino = '../_imagem_usuario/'.$novoNome;
          
           $upE = "update empresa
           set foto_empre='$destino'
           where cod_empresa = '$id';";
                   $executeE = executeQuery($conn, $upE);
            @move_uploaded_file ( $arquivo_tmp, "$destino" );

            
        
       }
   }
}

if(empty($_POST['nomePV'] or $nomePV)){}else{

    $upPV = "update empresa
            set nome_empre ='$nomePV'
            where cod_empresa = '$id';";
            $executeN = executeQuery($conn, $upPV);

}
            echo'<script>';
            echo"location.href='../perfil/perfil.php'";
            echo '</script>';
    }
}catch (Exception $ex) {

}