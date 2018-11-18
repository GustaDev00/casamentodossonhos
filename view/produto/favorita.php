<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<?php

include_once '../../Db/daohelper.php';
session_start();
$pdo = connection();

try{

    if(empty($_GET)){
        echo "Parâmetro Vazio";
    }else{

        $idUsu = isset($_SESSION["id"])?$_SESSION["id"]:null;
        $idProd = isset($_GET['cod'])?$_GET['cod']:null;
        if(empty($idUsu)){
            echo '<script>';
            echo 'alert("Você precisa estar logado para Favoritar algum Produto ou Serviço!")';
            echo '</script>';
           
            echo '<script>';
                echo "location.href='../login/index.php'";
                echo '</script>';
           
        }else if(empty($idProd)){
           
        }else{
            if($_SESSION["defini"] == 1){
            $verific = "select * from favorita where cod_produto = '$idProd' and cod_usu = '$idUsu'";
            $executeSelect = executeSelect($pdo, $verific);
            if($executeSelect->rowCount() > 0){
                
               $delete = " delete from favorita
                           where cod_produto='$idProd' and cod_usu ='$idUsu';";
                $sql = executeQuery($pdo, $delete);
                echo '<script>';
                echo "location.href='../loja/index.php'";
                echo '</script>';
                
            }else{
            $query = "insert into favorita(cod_produto, cod_status_favorita, cod_usu)
                        values('$idProd', 'A', '$idUsu');";
            $execute = executeQuery($pdo, $query);
            echo '<script>';
                echo "location.href='../loja/index.php'";
                echo '</script>';}
        }
    else{
        echo "você não é um cliente!";
    }
        
    }

}
}
 catch(Exeption $ex){

}