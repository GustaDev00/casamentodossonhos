<?php
    include_once '../../Db/daohelper.php';
    session_start();
    $idProd = $_GET['cod'];
    include_once '../mask/header.html';
    if(empty($idProd)){
        echo " DEU CU";
    }else{
        $conn = connection();
        $select = "   select p.nome_prod, p.preco_prod, p.desc_prod, p.iz_prod, 
        p.local_prod, p.url_foto_prod, 
        c.nome_categoria, c.desc_categoria,
        e.nome_empre, e.email_empre, e.cidade_empre, e.estado_empre, e.tel_empre, e.foto_empre
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
        
        include_once 'index.html';
    }
    if(isset($_SESSION["email"]) and $_SESSION["defini"]!= 3){
    }else{  
     echo '<input id="navbar" type="checkbox">';
     echo '<label for="navbar" id="LHburg">';
     echo "<div class='menuBurg'>";
     echo  "<span class='hamburger'></span>";
     echo   "</div>";
     echo   "</label>";
 
    echo'<ul id="selecton">';
    echo     '<li><a class="HBurg" href="#">+1 ADM</a></li>';
    echo     '<li><a class="HBurg" href="view/perfil/deslogar.php">Deslogar</a></li>';
    echo '</ul>';
    
    }
?> 
    
   
      
?>