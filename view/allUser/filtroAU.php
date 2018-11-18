<?php
if($checkbox != NULL){
    if($nomeF != NULL){
        $nomeF = strtolower($nomeF);
        $ahri = array();
        foreach($checkbox as $valor){
            if($valor == "empresa"){
                for($x=0; $x < count($perfilE) ; $x++){
                    $nomeMini =strtolower($perfilE[$x]['nome_empre']);
                    if($nomeF ==  $nomeMini){   
                       $ahri[] = $perfilE[$x]['nome_empre']. ".empresa,$x";
                    }else if( strstr($nomeMini,$nomeF)){
                        $ahri[] = $perfilE[$x]['nome_empre']. ".empresa,$x";
                    }else{}
                     }
            }else{}
            if($valor == "cliente"){
                for($l = 0; $l < count($perfilU); $l++){
                    $nomeMini =strtolower($perfilU[$l]['nome_usu']);
                    if($nomeF ==  $nomeMini){
                        $ahri[] = $perfilU[$l]['nome_usu']. ".casal,$l";
                    }else if( strstr($nomeMini,$nomeF)){
                        $ahri[] = $perfilU[$l]['nome_usu']. ".casal,$l";
                    }else{}
                    }
            }else{}        
        }
    }else{
        $ahri = array();
        foreach($checkbox as $valor){
            if($valor == "empresa"){
                for($x=0; $x < count($perfilE) ; $x++){
                    $ahri[] = $perfilE[$x]['nome_empre']. ".empresa,$x";
                     }
            }else{}
            if($valor == "cliente"){
                for($l = 0; $l <count($perfilU); $l++){
                    $ahri[] = $perfilU[$l]['nome_usu']. ".casal,$l";
                    }
            }else{}        
        }
    }
   
}else{}
    if($nomeF != NULL and $checkbox == NULL){
        $nomeF = strtolower($nomeF);
        $ahri = array();
        for($x=0; $x <count($perfilE) ; $x++){
            $nomeMini =strtolower($perfilE[$x]['nome_empre']);
            if($nomeF ==  $nomeMini){   
               $ahri[] = $perfilE[$x]['nome_empre']. ".empresa,$x";
            }else if( strstr($nomeMini,$nomeF)){
                $ahri[] = $perfilE[$x]['nome_empre']. ".empresa,$x";
            }else{}
             }
             for($l = 0; $l < count($perfilU); $l++){
                $nomeMini =strtolower($perfilU[$l]['nome_usu']);
                if($nomeF ==  $nomeMini){
                    $ahri[] = $perfilU[$l]['nome_usu']. ".casal,$l";
                }else if( strstr($nomeMini,$nomeF)){
                    $ahri[] = $perfilU[$l]['nome_usu']. ".casal,$l";
                }else{}
                }
    }else{}
    
        uasort($ahri, "strnatcmp");
 ?>
