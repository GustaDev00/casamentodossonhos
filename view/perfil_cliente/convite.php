<?php
include_once '../../Db/daohelper.php';

$id = $_GET['id'];
$conn = connection();
$sql = "select * from usuario where cod_usu = '$id'";

$execute = executeSelect($conn, $sql);


$fetch = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch->nome_usu;      
        $parceiro = $fetch->nome_par_usu;
        $senha = $fetch->senha_usu;
        $diaCas = $fetch->data_casal; 
        $email = $fetch->email_usu;
        $imagemL = $fetch->foto_usu;
        $imagemLoc = $fetch->foto_local;
        $localCas = $fetch->local_casal;
        $horarioCas = $fetch->horario_casal;
        $select2 = "select * from lista_presentes where cod_usu = '$id' and status_presente='Em Aberto' ";
        $execute2 = executeSelect($conn, $select2);
        $dadosPres = array();
        $dP = 0;
        while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
            $dadosPres[$dP]['nome_valor_presente'] = $fetch3->nome_valor_presente;
            $dadosPres[$dP]['status_presente'] = $fetch3->status_presente;
            $dadosPres[$dP]['cod_list_pres'] = $fetch3->cod_list_pres;
            $dP++;
        }
        include_once 'index.php';
?>
    