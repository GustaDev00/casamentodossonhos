<?php
    include_once '../../Db/daohelper.php';
    session_start();
    $idProd = $_GET['cod'];
    include_once '../mask/header.html';
    if(empty($idProd)){
    }else{
        $conn = connection();
        $select = "   select p.nome_prod, p.preco_prod, p.desc_prod, p.iz_prod, 
        p.local_prod, p.url_foto_prod, 
        c.nome_categoria, c.desc_categoria,
        e.cod_empresa, e.nome_empre, e.email_empre, e.cidade_empre, e.estado_empre, e.tel_empre, e.foto_empre
        from produto p
        inner join categoria c
        on p.cod_categoria = c.cod_categoria 
        inner join empresa e
        on e.cod_empresa = p.cod_empresa
        where cod_produto = $idProd;";
        $go = executeSelect($conn, $select);
        $fetch = $go->fetch(PDO::FETCH_OBJ);
        $nome = $fetch->nome_prod;
        $preco = $fetch->preco_prod;
        $desc = $fetch->desc_prod;
        $foto = $fetch->url_foto_prod;
        $loc = $fetch->local_prod;
        $sprod = $fetch->iz_prod;
        $nomeE = $fetch->nome_empre;
        $emailE = $fetch->email_empre;
        $locC = $fetch->cidade_empre;
        $locEst = $fetch->estado_empre;
        $contato = $fetch->tel_empre;
        $fotoE = $fetch->foto_empre;
        $codEmpresa = $fetch->cod_empresa;
        
        include_once 'produto.html';
    }


?> 
    
   
