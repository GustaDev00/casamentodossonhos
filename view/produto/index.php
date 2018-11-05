<?php
    include_once '../../Db/daohelper.php';
    
    $idProd = $_GET['cod'];
    
    if(empty($idProd)){
        echo " DEU CU";
    }else{
        $conn = connection();
        $select = "   select p.nome_prod, p.preco_prod, p.desc_prod, 
        p.local_prod, p.url_foto_prod, 
        c.nome_categoria, c.desc_categoria,
        e.nome_empre, e.cidade_empre, e.estado_empre, e.tel_empre, e.foto_empre
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
        $nomeE = $fetch->nome_empre;
        $locC = $fetch->cidade_empre;
        $locEst = $fetch->estado_empre;
        $contato = $fetch->tel_empre;
        $fotoE = $fetch->foto_empre;
        
        include_once 'index.html';
    }
 
    
   
      
?>