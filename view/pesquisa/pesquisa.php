<?php
include_once '../../Db/daohelper.php';
// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante pra home
try{
if (empty($_GET['pesquisar'])) {
  //header("Location: /");
  echo "ta vazio o GET";
  exit;
}else{

$pesquisa = isset($_GET['pesquisar'])?$_GET['pesquisar']:'';
$PDO = connection();
$PDO->exec("set names utf8");

$sql = "select distinct(p.cod_produto), p.nome_prod, p.preco_prod, p.desc_prod, 
p.local_prod, p.url_foto_prod, c.nome_categoria, c.desc_categoria,
e.nome_empre
from produto p
inner join categoria c
on p.cod_categoria = c.cod_categoria 
inner join empresa e
on e.cod_empresa = e.cod_empresa
where nome_prod like '%$pesquisa%';";

$stmt = $PDO->prepare($sql);
$stmt->bindValue(':search',  $pesquisa );
$stmt->execute();
 
// cria um array com os resultados
$produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
$npl = 10;
$CR = count($produto);
?>

<?php
}
}catch (Exception $ex) {

}

