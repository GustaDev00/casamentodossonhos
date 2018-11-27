<?php
        require_once '../../Db/daohelper.php';
        session_start();    
        $pdo = connection();
        $select = "select * from empresa;";
                $exec = executeSelect($pdo, $select);
                $perfilE = array();
                $contE = 0;
                while($fetch = $exec->fetch(PDO::FETCH_ASSOC)){
                    $perfilE[] = $fetch;
                    $contE++;
                }
        $selectU = "select * from usuario;";
        $execU = executeSelect($pdo, $selectU);
        $perfilU = array();
        $contU = 0;
        while($fetchU = $execU->fetch(PDO::FETCH_ASSOC)){
            $perfilU[] = $fetchU;
            $contU++;
        }
        $ahri = array(); 
        for($x=0; $x < count($perfilE) ; $x++){
            $ahri[] = $perfilE[$x]['nome_empre']. ".empresa,$x";
             }
           for($l = 0; $l < count($perfilU); $l++){
             $ahri[] = $perfilU[$l]['nome_usu']. ".casal,$l";
             }
           
            uasort($ahri, "strnatcmp");
        $nomeF = isset($_POST["NomeCC"])?$_POST["NomeCC"]:NULL;
        $checkbox = isset($_POST["escolhaC"])?$_POST["escolhaC"]:NULL;
        if($nomeF != NULL or $checkbox != NULL){
            include_once 'filtroAU.php';
        }
        
        include_once '../mask/header.html';
        include_once 'user.html';
        include_once '../mask/footer.html';
          
    ?>