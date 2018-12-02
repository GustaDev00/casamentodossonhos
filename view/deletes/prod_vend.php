<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php
require_once '../../Db/daohelper.php';
session_start();

try{
    $idProd = isset($_GET['cod_prod'])?$_GET['cod_prod']:null;
    $id = $_SESSION['id'];
    echo $id.'<br>';
    echo 'cod prod =  '.$idProd;
    $sql = "DELETE FROM produto WHERE cod_produto = '$idProd' AND cod_empresa = '$id'";
    $conn = connection();
    $execute = executeQuery($conn, $sql);
    echo "<script>location.href='../perfil/perfil.php'</script>";

} catch (Exception $ex) {

}