<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php
require_once '../../Db/daohelper.php';
session_start();

try{
    $idFoto = isset($_GET['cod_foto_empre'])?$_GET['cod_foto_empre']:null;
    $id = $_SESSION['id'];
   // echo $id;
    //echo $idFoto;
    $sql = "DELETE FROM fotos_empresa WHERE cod_foto = '$idFoto' AND cod_empresa = '$id'";
    $conn = connection();
    $execute = executeQuery($conn, $sql);
    echo "<script>location.href='../perfil/perfil.php'</script>";
    

} catch (Exception $ex) {

}