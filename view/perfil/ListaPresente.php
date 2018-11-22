<?php 
require_once "../../Db/daohelper.php";

session_start();

try{
    if(empty($_POST)){
       
    }else{
       $nomePres = isset($_REQUEST['nomePresente'])?$_REQUEST['nomePresente']:null;
       $tipoPres = isset($_REQUEST['tipoPresente'])?$_REQUEST['tipoPresente']:null;
        $id = $_SESSION['id'];
        if($nomePres ==  null){
            echo "<script>alert('Preencha o Campo!')</script>";
            echo "<script>location.href='perfil.php'</script>";
        }else{
       $insert = "insert into lista_presentes(nome_valor_presente, tipo_presente, status_presente, cod_usu) values('$nomePres', '$tipoPres', 'Em Aberto', '$id');";
       $conn = connection();
       $query = executeQuery($conn, $insert);
       echo "<script>location.href='perfil.php'</script>";
        }

    }




 }catch (Exception $ex) {

}
