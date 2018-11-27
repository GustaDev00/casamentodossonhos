<?php
        require_once '../../Db/daohelper.php';
if($checkbox != NULL){
    if($nomeF != NULL){
        $nomeF = strtolower($nomeF);
        $arry2 = array();
        foreach($checkbox as $valor){
            $xcont = 0;
            if($valor == "empresa"){
                for($x=0; $x < $CN ; $x++){
                    $nomeMini =strtolower($nome[$x]['nome_empre']);
                    if($nomeF ==  $nomeMini){   
                       $arry2[] = $nome[$x]['nome_empre']. ".empresa,$x";
                    }else if( strstr($nomeMini,$nomeF)){
                        $arry2[] = $nome[$x]['nome_empre']. ".empresa,$x";
                    }else{}
                     }
            }else{}
            if($valor == "produto"){
                for($l = 0; $l < $CR; $l++){
                    $nomeMini =strtolower($produto[$l]['nome_prod']);
                    if($nomeF ==  $nomeMini){
                        $arry2[] = $produto[$l]['nome_prod']. ".produto,$l";
                    }else if( strstr($nomeMini,$nomeF)){
                        $arry2[] = $produto[$l]['nome_prod']. ".produto,$l";
                    }else{}
                    }
            }else{}        
        }
    }else{
        $arry2 = array();
        foreach($checkbox as $valor){
            $xcont = 0;
            if($valor == "empresa"){
                for($x=0; $x < $CN ; $x++){
                    $arry2[] = $nome[$x]['nome_empre']. ".empresa,$x";
                     }
            }else{}
            if($valor == "produto"){
                for($l = 0; $l < $CR; $l++){
                    $arry2[] = $produto[$l]['nome_prod']. ".produto,$l";
                    }
            }else{}        
        }
    }
   
}else{}
    if($nomeF != NULL and $checkbox == NULL){
        $nomeF = strtolower($nomeF);
        $arry2 = array();
        for($x=0; $x < $CN ; $x++){
            $nomeMini =strtolower($nome[$x]['nome_empre']);
            if($nomeF ==  $nomeMini){   
               $arry2[] = $nome[$x]['nome_empre']. ".empresa,$x";
            }else if( strstr($nomeMini,$nomeF)){
                $arry2[] = $nome[$x]['nome_empre']. ".empresa,$x";
            }else{}
             }
             for($l = 0; $l < $CR; $l++){
                $nomeMini =strtolower($produto[$l]['nome_prod']);
                if($nomeF ==  $nomeMini){
                    $arry2[] = $produto[$l]['nome_prod']. ".produto,$l";
                }else if( strstr($nomeMini,$nomeF)){
                    $arry2[] = $produto[$l]['nome_prod']. ".produto,$l";
                }else{}
                }
    }else{}
    
        uasort($arry2, "strnatcmp");
 ?>
