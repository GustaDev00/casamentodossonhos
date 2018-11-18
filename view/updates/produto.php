<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php
require_once '../../Db/daohelper.php';
session_start();
try{
    if(empty($_POST or $_FILES)){}else{ 
    $nomeP = isset($_POST['nomeproduto'])?$_POST['nomeproduto']:null;
    $end = isset($_POST['enderecoproduto'])?$_POST['enderecoproduto']:null;
    $preco = isset($_POST['precoproduto'])?$_POST['precoproduto']:null;
    $link = isset($_POST['linkprod'])?$_POST['linkprod']:null;
    $img = isset($_FILES['EImagem'])?$_FILES['EImagem']:null;
    $desc = isset($_POST['descricaoproduto'])?$_POST['descricaoproduto']:null;
    $idProd = isset($_POST['codproduto'])?$_POST['codproduto']:null;
    $cat= isset($_POST['novacat'])?$_POST['novacat']:null;
    $id = $_SESSION['id'];
    
    $conn = connection();
    if(empty($img or $_FILES['EImagem'])){}else{
        $arquivo_tmp = $img[ 'tmp_name' ];
       $nome = $img[ 'name' ];
       $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
       $extensao = strtolower ( $extensao );
     if(empty($extensao)){}else{
           if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
               $novoNome = uniqid ( time () ) . '.' . $extensao;
               $destino = '../_imagem_usuario/'.$novoNome;
              
               $sql = "update produto
               set url_foto_prod='$destino'
               where cod_produto = '$idProd' and cod_empresa = '$id';";
                       $exF = executeQuery($conn, $sql);
                @move_uploaded_file ( $arquivo_tmp, "$destino" );
                   
           }
       }}

       if(empty($nomeP)){}else{
        $upN = "update produto
                set nome_prod = '$nomeP'
                where cod_produto ='$idProd' and cod_empresa='$id'";
        $exN = executeQuery($conn, $upN);
    }

    if(empty($end)){}else{
        $upE = "update produto
                set local_prod = '$end'
                where cod_produto ='$idProd' and cod_empresa='$id'";
        $exN = executeQuery($conn, $upE);
    }

    if(empty($preco)){}else{
        $upPrec = "update produto
                set preco_prod = '$preco'
                where cod_produto ='$idProd' and cod_empresa='$id'";
        $exPr = executeQuery($conn, $upPrec);
    }

    if(empty($link)){}else{
        $upLink = "update produto
                set iz_prod = '$link'
                where cod_produto ='$idProd' and cod_empresa='$id'";
        $exLink = executeQuery($conn, $upLink);
    }

    if(empty($desc)){}else{
        $upD = "update produto
                set desc_prod = '$desc'
                where cod_produto ='$idProd' and cod_empresa='$id'";
        $exD = executeQuery($conn, $upD);
    }

    if(empty($cat)){}else{
        $categoria = "SELECT * FROM categoria WHERE nome_categoria = '$cat';";
        $execute = executeSelect($conn, $categoria);
        $fetch = $execute->fetch(PDO ::FETCH_OBJ);
        
        if($cat == 'Nova Categoria'){echo "nova";}else{
            
        $codCat = $fetch->cod_categoria;

        $upC = "update produto
                set cod_categoria = '$codCat'
                where cod_produto ='$idProd' and cod_empresa='$id'";
        $exC = executeQuery($conn, $upC);
        
    }
}

    
    echo'<script>';
    echo"location.href='../perfil/perfil.php'";
    echo '</script>';

    }


}catch(Exeption $ex){

}