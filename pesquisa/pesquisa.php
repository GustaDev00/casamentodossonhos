<?php
include_once '../Db/daohelper.php';
session_start();
// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante pra home
try{
if (empty($_GET['pesquisar'])) {
  header("Location: /");
  exit;
}else{

$pesquisa = isset($_GET['pesquisar'])?$_GET['pesquisar']:'';
$PDO = connection();
$PDO->exec("set names utf8");

$sql = "SELECT DISTINCT(p.cod_produto), p.nome_prod, p.preco_prod, p.desc_prod, 
p.local_prod, c.nome_categoria, c.desc_categoria,
e.nome_empre
FROM PRODUTO p
INNER JOIN CATEGORIA c
ON p.cod_categoria = c.cod_categoria 
INNER JOIN EMPRESA e
ON e.cod_empresa = e.cod_empresa
where nome_prod like '%$pesquisa%';";

$stmt = $PDO->prepare($sql);
$stmt->bindValue(':search',  $pesquisa );
$stmt->execute();
 
// cria um array com os resultados
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resultado da Busca</title>
    </head>
 
    <body>
         
 
<h1>Resultados da busca</h1>
 
 
        <?php if (count($products) > 0): ?>
         
        <?php 
            $p = 0;
            while($p < count($products)){?>
             
 
<div>
    <hr>
 <h1><?php echo $products[$p]['nome_categoria'].'<br>' ?></h1>
<h3><?php echo $products[$p]['nome_prod'].'<br>' ?></h3>
Preço: R$ <?php echo $products[$p]['preco_prod'].'<br>' ?>
Local onde o Produto ou Serviço está disponível:  <?php echo $products[$p]['local_prod'].'<br>' ?>
Descrição do Produto: <?php echo $products[$p]['desc_prod'].'<br>' ?>
Descrição da Categoria: <?php echo $products[$p]['desc_categoria'].'<br>' ?>
Empresa responsável:  <?php echo $products[$p]['nome_empre'].'<br>' ?>
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

