<?php
        require_once '../../Db/daohelper.php';
        session_start();
        include_once '../mask/header.html';
        $nomeF = isset($_POST["nomeF"])?$_POST["nomeF"]:NULL;
        $checkbox = isset($_POST["escolhaC"])?$_POST["escolhaC"]:NULL;
        $pesquisa = isset($_GET['pesquisar'])?$_GET['pesquisar']:NULL;
        if(($checkbox != NULL) or ($nomeF != NULL)){
          include_once 'pesquisa.php';
          include_once 'filtroEP.php';
        }else{
        include_once 'pesquisa.php';
        if((isset($_SESSION['pesquisado'])) and ($_SESSION['pesquisado'] == $pesquisa)){
        }else{
        $_SESSION['pesquisado'] = $pesquisa;
      }
        }
        include_once 'pesquisa.html';

        include_once '../mask/footer.html';
    ?>