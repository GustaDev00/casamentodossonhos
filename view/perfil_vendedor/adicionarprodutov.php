<?php

include_once "../../Db/daohelper.php";
try{
$nome = isset($_POST['nomeproduto'])?$_POST['nomeproduto']:NULL;
$img = isset($_FILE['imgproduto'])?$_FILE['imgproduto']:NULL;
$preco = isset($_POST['precoproduto'])?$_POST['precoproduto']:NULL;
$url = isset($_POST['url'])?$_POST['url']:NULL;
$descricao = isset($_POST['descricao'])?$_POST['descricao']:NULL;

    $verifica = "INSERT INTO produto(nomeproduto, descricaoproduto, imgproduto, precoproduto, urlproduto) 
    values('$nome', '$descricao', '$img', '$preco', '$url');";
    
var_dump($_POST);
    
    }catch (Exception $ex){}