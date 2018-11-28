<?php
// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante pra home
try{

if (empty($_GET['pesquisar'])) {
  //header("Location: /");
  
$pesquisa =  $_SESSION['pesquisado'];
$PDO = connection();

$sql = "select distinct(p.cod_produto), p.nome_prod, p.preco_prod, p.desc_prod, 
  p.local_prod, p.url_foto_prod, c.nome_categoria, c.desc_categoria,
  e.nome_empre
  from produto p
  inner join categoria c
  on p.cod_categoria = c.cod_categoria 
  inner join empresa e
  on p.cod_empresa = e.cod_empresa
  where nome_prod like '%$pesquisa%' order by p.nome_prod asc;";
$sqlVend = "select * from empresa where nome_empre like '%$pesquisa%' order by nome_empre asc";


// cria um array com os resultados
$stmt = $PDO->prepare($sql);
$stmt->bindValue(':search',  $pesquisa );
$stmt->execute();

$stmt2 = $PDO->prepare($sqlVend);
$stmt2->bindValue(':search',  $pesquisa );
$stmt2->execute();
$produto = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nome = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$CN = count($nome);
$CR = count($produto);
$arry2 = array();

for($x=0; $x < $CN ; $x++){
 $arry2[] = $nome[$x]['nome_empre']. ".empresa,$x";
  }
for($l = 0; $l < $CR; $l++){
  $arry2[] = $produto[$l]['nome_prod']. ".produto,$l";
  }

 uasort($arry2, "strnatcmp");
}else{

$pesquisa = isset($_GET['pesquisar'])?$_GET['pesquisar']:'';
$PDO = connection();

$sql = "select distinct(p.cod_produto), p.nome_prod, p.preco_prod, p.desc_prod, 
  p.local_prod, p.url_foto_prod, c.nome_categoria, c.desc_categoria,
  e.nome_empre
  from produto p
  inner join categoria c
  on p.cod_categoria = c.cod_categoria 
  inner join empresa e
  on p.cod_empresa = e.cod_empresa
  where nome_prod like '%$pesquisa%' order by p.nome_prod asc;";
$sqlVend = "select * from empresa where nome_empre like '%$pesquisa%' order by nome_empre asc";


// cria um array com os resultados
$stmt = $PDO->prepare($sql);
$stmt->bindValue(':search',  $pesquisa );
$stmt->execute();

$stmt2 = $PDO->prepare($sqlVend);
$stmt2->bindValue(':search',  $pesquisa );
$stmt2->execute();
$produto = $stmt->fetchAll(PDO::FETCH_ASSOC);

$nome = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$CN = count($nome);
$CR = count($produto);
$arry2 = array();

for($x=0; $x < $CN ; $x++){
 $arry2[] = $nome[$x]['nome_empre']. ".empresa,$x";
  }
for($l = 0; $l < $CR; $l++){
  $arry2[] = $produto[$l]['nome_prod']. ".produto,$l";
  }

 uasort($arry2, "strnatcmp");
?>

<?php
}
}catch (Exception $ex) {

}

