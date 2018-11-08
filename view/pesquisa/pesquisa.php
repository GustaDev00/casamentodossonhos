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
on p.cod_empresa = e.cod_empresa
where nome_prod like '%$pesquisa%' or nome_empre = '%$pesquisa%' order by p.nome_prod asc;";

$sqlVend = "select * from empresa where nome_empre like '%$pesquisa%' order by nome_empre asc";


$stmt = $PDO->prepare($sql);
$stmt->bindValue(':search',  $pesquisa );
$stmt->execute();

// cria um array com os resultados

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
 echo "Quantidade de produto: ". count($produto). "<br>". "Quantidade de empresa: ". count($nome)."<br>".count($arry2)."<br>";
  foreach($arry2 as $total){
    //echo $total. "<br>";
    $quebra = explode(",", $total);
    //echo "O valor quebrado foi: ".$quebra[0]."<br>". "Nome Produto: ".$produto[$quebra[1]]["nome_prod"]."produto". "<br>". "O valor nome empresa: ". $nome[$quebra[1]]["nome_empre"]. "<hr>";
    $produt = $produto[$quebra[1]]["nome_prod"]."produto";
    //echo $produt. "<br>"; 
    if($quebra[0] == $produto[$quebra[1]]["nome_prod"]."."."produto"){
      echo "produto"."<br>"; 
    }else if($quebra[0] == $nome[$quebra[1]]["nome_empre"].".". "empresa"){
      echo "empresa"."<br>";
    }else{}
  }
  /*
 for($x=0; $x < count($arry2); $x++){
  $quebra = explode(",", $arry2[$x]);
  echo $quebra[0]."<br>". $produto[$quebra[1]]["nome_prod"]. "<hr>". "<hr>". $quebra[0]."<br>". $nome[$quebra[1]]["nome_empre"]. "<hr>";  //73  = 657 = 702 
 } */

 //$teste = $arry2[0];
 //$quebra = array(".", ",");

 //print_r(explode($quebra[0], $teste));
 //$pos = strpos($teste, ".");
 //echo $pos;
 //$pos1 = strpos($teste, ",") + 1 ;
//echo $pos1;    
 //$tipo = substr($teste, $pos+1);
 //echo $tipo;
// var_dump($arry2);
 






?>

<?php
}
}catch (Exception $ex) {

}

