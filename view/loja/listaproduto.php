<?php 
include_once '../../Db/daohelper.php';
try{
$pagina = 1;
 $conn = connection();
 $verificar = "SELECT count(cod_produto) FROM produto";
 $querySelect = executeSelect($conn, $verificar);
    $cod = array();
    $produto = array();
    if($querySelect->rowCount() > 0){
         $qtd = $querySelect->fetch();
        }else{echo "erro"; }
    //aqui farei a veriicação da url para pegar o codigo
    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
        $pl = (10 * ($pagina - 1)) + 1;
        $npl = $pagina * 10;
        for($i=$pl;$i<=$npl;$i++){
             $verificar2 = "SELECT * FROM produto where cod_produto = {$i}";
                $querySelect = executeSelect($conn, $verificar2);
                if($querySelect->rowCount() > 0){
                    while($fetch = $querySelect->fetch(PDO::FETCH_ASSOC)){
                    $produto[] = $fetch;
                    }
                }else{ }
        }
    }else{
        $npl = 10;
        for($i=1;$i<=10;$i++){
             $verificar2 = "SELECT * FROM produto where cod_produto = {$i}";
                $querySelect = executeSelect($conn, $verificar2);
                if($querySelect->rowCount() > 0){
                    while($fetch = $querySelect->fetch(PDO::FETCH_ASSOC)){
                    $produto[] = $fetch;
                    }
                }else{ }
        }
        
    }
}catch (Exception $ex) {
 $ex = "nao esta pegando amiguinho";
    echo $ex;
}
?>


            <!-- echo "Nome Produto {$fetch['nomeproduto']} - descrição {$fetch['descricaoproduto']} <br> ";
            //echo "<img src= '". $fetch['imgproduto'] ."' alt=algumacoisa width=100px>"; -->