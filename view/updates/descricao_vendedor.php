<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php
require_once '../../Db/daohelper.php';
session_start();
$conn = connection();

try{
    if(empty($_FILES or $_POST)){
        echo'<script>';
        echo"location.href='index.html'";
        echo '</script>';
    }else{
        $cat = isset($_POST['novaCategoria'])?$_POST['novaCategoria']:null;
        $tel = isset($_POST['novoTel'])?$_POST['novoTel']:null;
        $rua = isset($_POST['novaRua'])?$_POST['novaRua']:null;
        $bairro = isset($_POST['novoBairro'])?$_POST['novoBairro']:null;
        $cidade = isset($_POST['novaCidade'])?$_POST['novaCidade']:null;
        $estado = isset($_POST['novoEstado'])?$_POST['novoEstado']:null;
        $id = $_SESSION['id'];

    if($cat == 'Nova Categoria' or empty($cat)){}else{
        $upC = "update empresa
                set categoria_empre = '$cat'
                where cod_empresa = '$id';";
        $execC = executeQuery($conn, $upC);
    }

    if(empty($tel)){}else{
        $upT = "update empresa
                set tel_empre = '$tel'
                where cod_empresa = '$id';";
        $execC = executeQuery($conn, $upT);
    }

    if(empty($rua)){}else{
        $upR = "update empresa
                set rua_empre = '$rua'
                where cod_empresa = '$id';";
        $execC = executeQuery($conn, $upR);
    }

    if(empty($bairro)){}else{
        $upB = "update empresa
                set bairro_empre = '$bairro'
                where cod_empresa = '$id';";
        $execC = executeQuery($conn, $upB);
    }

    if(empty($cidade)){}else{
        $upC = "update empresa
                set cidade_empre = '$cidade'
                where cod_empresa = '$id';";
        $execC = executeQuery($conn, $upC);
    }

    if(empty($estado)){}else{
        $upE = "update empresa
                set estado_empre = '$estado'
                where cod_empresa = '$id';";
        $execC = executeQuery($conn, $upE);
    }

    echo'<script>';
    echo"location.href='../perfil/perfil.php'";
    echo '</script>';

    }
}catch (Exception $ex) {

}