<?php
include_once '../../Db/daohelper.php';
session_start();
// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante pra home
try{
if (empty($_GET['empresa'])) {
  header("Location: /");
  exit;
}else{
 $pesquisa = isset($_GET['empresa'])?$_GET['empresa']:'';
$PDO = connection();
$PDO->exec("set names utf8");
 $sql = "SELECT * from empresa
where nome_empre like '%$pesquisa%';";
 $stmt = $PDO->prepare($sql);
$stmt->bindValue(':search', '%' . $pesquisa . '%');
$stmt->execute();
 echo $pesquisa;
// cria um array com os resultados
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resultado da Busca - ULTIMATE PHP</title>
    </head>
 
    <body>
         
 
<h1>Resultados da busca</h1>
 
 
        <?php if (count($products) > 0): ?>
         
        <?php 
            $p = 0;
            while($p < count($products)){?>
             
 
<div>
    <hr>
 <h1><?php echo $products[$p]['nome_empre'].'<br>' ?></h1>
<h3><?php echo $products[$p]['email_empre'].'<br>' ?></h3>
Código Empresa: <?php echo $products[$p]['cod_empresa'].'<br>' ?>
 <hr>
 <?php  $p++; } ?> 
            </div>
 
             
 
        
 
        <?php else: ?>
 
 
 
Nenhum resultado encontrado
 
 
        <?php endif; ?>
 
    </body>
</html>
<?php
}
}catch (Exception $ex) {
 }
