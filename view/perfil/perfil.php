
<?php

require_once '../../Db/daohelper.php';
session_start();
$pdo = connection();
//require_once './processo.php';
//verifica se existe  codigo para carrega outro pagina de perfil.... a deslogada
if(isset($_GET['codigo']) and isset($_GET['par'])){
    $id = $_GET['codigo'];
    $defini = $_GET['par'];
    if($defini == 1){
        $select = "select * from usuario where cod_usu = '$id'";        
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_usu;      
        $parceiro = $fetch2->nome_par_usu;
        $senha = $fetch2->senha_usu;
        $diaCas = $fetch2->data_casal; 
        $email = $fetch2->email_usu;
        $emailU = $fetch2->email_usu;
        $imagemL = $fetch2->foto_usu;
        $imagemLoc = $fetch2->foto_local;
        $localCas = $fetch2->local_casal;
        $horarioCas = $fetch2->horario_casal;
        $select2 = "select * from lista_presentes where cod_usu = '$id' and status_presente = 'Em Aberto'";
        $execute2 = executeSelect($pdo, $select2);
        $dadosPres = array();
        $dP = 0;
        
        while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
            $dadosPres[$dP]['cod_list_pres'] = $fetch3->cod_list_pres;
            $dadosPres[$dP]['nome_valor_presente'] = $fetch3->nome_valor_presente;
            $dadosPres[$dP]['status_presente'] = $fetch3->status_presente;
            $dP++;
        }
        
        include_once "../perfil_cliente/index.php";

}else if($defini == 2){
    $select = "select * from empresa where cod_empresa = '$id'";
    $execute = executeSelect($pdo, $select);
    $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
    $nome = $fetch2->nome_empre;
    $ruaE = $fetch2->rua_empre;
    $emailE = $fetch2->email_empre;
    $bairroE = $fetch2->bairro_empre;
    $cidadeE = $fetch2->cidade_empre;
    $estadoE = $fetch2->estado_empre;
    $telE = $fetch2->tel_empre;
    $funcE = $fetch2->categoria_empre;
    $imagemL = $fetch2->foto_empre;
    $select2 = "select nome_categoria from categoria;";
    $select3= "select * from produto where cod_empresa = '$id';";
    $execute2 = executeSelect($pdo, $select2);
    $execute3 = executeSelect($pdo, $select3);
    $dadosCat = array();
    $dC = 0;
    while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
        $dadosCat[$dC]['nome_categoria'] = $fetch3->nome_categoria;
        $dC++;
    }
    
    $dadosProd = array();
    $dP = 0;
    while($fetch4 = $execute3->fetch(PDO ::FETCH_OBJ)){
        $dadosProd[$dP]['cod_produto'] = $fetch4->cod_produto;
        $dadosProd[$dP]['nome_produto'] = $fetch4->nome_prod;
        $dadosProd[$dP]['url_foto_prod'] = $fetch4->url_foto_prod;
        
        $dP++;
    }

    $selectFoto = "select * from fotos_empresa where cod_empresa = '$id';";
    $execFoto = executeSelect($pdo, $selectFoto);
    $dadosFoto = array();
    $df = 0;
    while($fetchFoto = $execFoto->fetch(PDO::FETCH_OBJ)){
        $dadosFot[$df]['nome_foto'] = $fetchFoto->nome_foto;
        $dadosFot[$df]['url_foto_empresa'] = $fetchFoto->url_foto_empresa;
        $dadosFot[$df]['desc_foto'] = $fetchFoto->desc_foto;
        $df++;
    }

    include_once '../perfil_vendedor/index.php';
 
}else{}
    
}else{
//pega abaixo

if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
    
    $email = $_SESSION["email"];
    $senha = $_SESSION["senha"];
    
    if( strpos(file_get_contents("../banimento/checkBan.txt"),$email) != false) {
        $recebe = file_get_contents("../banimento/checkBan.txt");
        $hora =  date('d-m-y');    
        $quebra1 = explode(",",$recebe);
        unset($quebra1[0]);
        for($x=1; $x<=(count($quebra1) -1);$x++){            
            $quebra2 = explode("~", $quebra1[$x]);
            if($email == $quebra2[0]){
                if(strtotime($hora) >= strtotime($quebra2[1])){
                     $fp = fopen("../banimento/checkBan.txt", "w");
                     $escreve = fwrite($fp,",");
                     fclose($fp);
                    $fp = fopen("../banimento/checkBan.txt", "a");
                    for($l=1; $l<=(count($quebra1) -1);$l++){
                        if($x == $l){$l++;}else{}
                        $escreve = fwrite($fp, $quebra1[$l].",");
                    }
                    fclose($fp);
                }else{
                    echo "<script>";
                    echo "alert('Você esta Banido até ".$quebra2[1]."!');";
                    echo "top.location.href='deslogar.php';";
                    echo "</script>";
                }
            }else{}
        }
    }
    if($_SESSION["defini"] == 1){
      
        $verificAlert = "select a.msg_alert, dm.nome_adm, dm.cod_adm
        from alert a
        inner join adm dm
        on a.cod_adm = dm.cod_adm
        where cod_usu = '{$_SESSION["id"]}'";
        $executeAlert = executeSelect($pdo, $verificAlert);
        if($executeAlert->rowCount()>0){
        
        $fetchAlert = $executeAlert->fetch(PDO ::FETCH_OBJ);
        $alert = $fetchAlert->msg_alert;
        $codAdmAlert = $fetchAlert->cod_adm;
        $nomeAdmAlert = $fetchAlert->nome_adm;
            echo'<script>';
            echo"alert('Aviso: $alert Enviado de: $nomeAdmAlert')";
            echo '</script>';
            $deleteAlert = "DELETE FROM alert WHERE cod_usu = '{$_SESSION["id"]}' AND cod_adm = '$codAdmAlert' and msg_alert = '$alert'";
            $executeDeleteAlert = executeQuery($pdo, $deleteAlert);
        }
        $select = "select * from usuario where cod_usu = '{$_SESSION["id"]}'";        
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_usu;      
        $parceiro = $fetch2->nome_par_usu;
        $senha = $fetch2->senha_usu;
        $diaCas = $fetch2->data_casal; 
        $email = $fetch2->email_usu;
        $imagemL = $fetch2->foto_usu;
        $imagemLoc = $fetch2->foto_local;
        $localCas = $fetch2->local_casal;
        $horarioCas = $fetch2->horario_casal;
        $select2 = "select * from lista_presentes where cod_usu = '{$_SESSION["id"]}'";
        $execute2 = executeSelect($pdo, $select2);
        $dadosPres = array();
        $dP = 0;
        while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
            $dadosPres[$dP]['cod_list_pres'] = $fetch3->cod_list_pres;
            $dadosPres[$dP]['nome_valor_presente'] = $fetch3->nome_valor_presente;
            $dadosPres[$dP]['status_presente'] = $fetch3->status_presente;
            $dP++;
        }
        
        $selectFavorita = "select p.cod_produto, p.url_foto_prod, p.nome_prod,
        f.cod_status_favorita
        from produto p
        inner join favorita f
        on f.cod_produto = p.cod_produto
        inner join usuario u
        on f.cod_usu = u.cod_usu
        where f.cod_usu = '{$_SESSION["id"]}'
        and   f.cod_produto = p.cod_produto
        and   f.cod_status_favorita = 'A';";

        $execFav = executeSelect($pdo, $selectFavorita);
        $dadosFav = array();
        $dFav = 0;
        while($fetchFav = $execFav->fetch(PDO::FETCH_OBJ)){
            $dadosFav[$dFav]['url_foto_prod'] = $fetchFav->url_foto_prod;
            $dadosFav[$dFav]['cod_produto'] = $fetchFav->cod_produto;
            $dFav++;
        }

            $execFav = executeSelect($pdo, $selectFavorita);
            $dadosFav = array();
            $dFav = 0;
            while($fetchFav = $execFav->fetch(PDO::FETCH_OBJ)){
                $dadosFav[$dFav]['url_foto_prod'] = $fetchFav->url_foto_prod;
                $dadosFav[$dFav]['cod_produto'] = $fetchFav->cod_produto;
                $dFav++;
            }

            $selectConvi = "SELECT * FROM convidados WHERE cod_usu = '{$_SESSION["id"]}'";
            $executeConv = executeSelect($pdo, $selectConvi);
            $dadosConv = array();
            $dConv = 0;
            while($fetchConv = $executeConv->fetch(PDO::FETCH_OBJ)){
                $dadosConv[$dConv]['email_conv'] = $fetchConv->email_conv;
                $dadosConv[$dConv]['num_acomp'] = $fetchConv->num_acomp;
                $dadosConv[$dConv]['nome_convi'] = $fetchConv->nome_convi;
                $dadosConv[$dConv]['presenca'] = $fetchConv->presenca;
                $dadosConv[$dConv]['celular_conv'] = $fetchConv->celular_conv;

                $dConv++;
            }
            include_once "../perfil_cliente/index.php";


            

    }else if($_SESSION["defini"] == 2){
        $verificAlert = "select a.msg_alert, dm.nome_adm, dm.cod_adm
        from alert a
        inner join adm dm
        on a.cod_adm = dm.cod_adm
        where cod_empresa = '{$_SESSION["id"]}'";
        
        $executeAlert = executeSelect($pdo, $verificAlert);
        if($executeAlert->rowCount() > 0){
        
        $fetchAlert = $executeAlert->fetch(PDO ::FETCH_OBJ);
        $alert = $fetchAlert->msg_alert;
        $codAdmAlert = $fetchAlert->cod_adm;
        $nomeAdmAlert = $fetchAlert->nome_adm;
            echo'<script>';
            echo"alert('Aviso: $alert Enviado de: $nomeAdmAlert')";
            echo '</script>';
            $deleteAlert = "DELETE FROM alert WHERE cod_empresa = '{$_SESSION["id"]}' AND cod_adm = '$codAdmAlert' and msg_alert = '$alert'";
            $executeDeleteAlert = executeQuery($pdo, $deleteAlert);
        }else{}


        $select = "select * from empresa where cod_empresa = '{$_SESSION["id"]}'";
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_empre;
        $ruaE = $fetch2->rua_empre;
        $bairroE = $fetch2->bairro_empre;
        $cidadeE = $fetch2->cidade_empre;
        $estadoE = $fetch2->estado_empre;
        $telE = $fetch2->tel_empre;
        $funcE = $fetch2->categoria_empre;
        $imagemL = $fetch2->foto_empre;
        $select2 = "select nome_categoria from categoria;";
        $select3= "select * from produto where cod_empresa = '{$_SESSION["id"]}';";
        $execute2 = executeSelect($pdo, $select2);
        $execute3 = executeSelect($pdo, $select3);
        $dadosCat = array();
        $dC = 0;
        while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
            $dadosCat[$dC]['nome_categoria'] = $fetch3->nome_categoria;
            $dC++;
        }
        
        $dadosProd = array();
        $dP = 0;
        while($fetch4 = $execute3->fetch(PDO ::FETCH_OBJ)){
            $dadosProd[$dP]['cod_produto'] = $fetch4->cod_produto;
            $dadosProd[$dP]['nome_produto'] = $fetch4->nome_prod;
            $dadosProd[$dP]['url_foto_prod'] = $fetch4->url_foto_prod;
            
            $dP++;
        }

        $selectFoto = "select * from fotos_empresa where cod_empresa = '{$_SESSION["id"]}';";
        $execFoto = executeSelect($pdo, $selectFoto);
        $dadosFot = array();
        $df = 0;
        while($fetchFoto = $execFoto->fetch(PDO::FETCH_OBJ)){
            $dadosFot[$df]['nome_foto'] = $fetchFoto->nome_foto;
            $dadosFot[$df]['url_foto_empresa'] = $fetchFoto->url_foto_empresa;
            $dadosFot[$df]['desc_foto'] = $fetchFoto->desc_foto;
            $dadosFot[$df]['cod_foto_empre'] = $fetchFoto->cod_foto;
            $df++;
        }
        include_once '../perfil_vendedor/index.php';
     
    }else if ($_SESSION["defini"] == 3){
        $selectAdm = "select * from adm where cod_adm = '{$_SESSION["id"]}'";
        $execute = executeSelect($pdo, $selectAdm);
        $fetchAdm = $execute->fetch(PDO ::FETCH_OBJ);
        $nomeAdm = $fetchAdm->nome_adm;
        $senhaAdm = $fetchAdm->senha_adm;
        $emailAdm = $fetchAdm->email_adm;
        $selectUsu = "select * from adm;";
        $executeU = executeSelect($pdo, $selectUsu);
        $fetchU = $executeU->fetch(PDO::FETCH_OBJ);
        if(isset($_GET['codigo']) and isset($_GET['par'])){
            if($_GET['par'] == 2){
                $get1 = $_GET['codigo'];
                $select = "select * from empresa where cod_empresa = '$get1'";
                $execute = executeSelect($pdo, $select);
                $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
                $nome = $fetch2->nome_empre;
                $emailE = $fetch2->email_empre;
                $ruaE = $fetch2->rua_empre;
                $bairroE = $fetch2->bairro_empre;
                $cidadeE = $fetch2->cidade_empre;
                $estadoE = $fetch2->estado_empre;
                $telE = $fetch2->tel_empre;
                $funcE = $fetch2->categoria_empre;
                $imagemL = $fetch2->foto_empre;
                $codEmpre = $fetch2->cod_empresa;
                $emailE = $fetch2->email_empre;
                $select2 = "select nome_categoria from categoria;";
                $select3= "select * from produto where cod_empresa = '$get1';";
                $execute2 = executeSelect($pdo, $select2);
                $execute3 = executeSelect($pdo, $select3);
                $dadosCat = array();
                $dC = 0;
                while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
                    $dadosCat[$dC]['nome_categoria'] = $fetch3->nome_categoria;
                    $dC++;
                }
                
                $dadosProd = array();
                $dP = 0;
                while($fetch4 = $execute3->fetch(PDO ::FETCH_OBJ)){
                    $dadosProd[$dP]['cod_produto'] = $fetch4->cod_produto;
                    $dadosProd[$dP]['nome_produto'] = $fetch4->nome_prod;
                    $dadosProd[$dP]['url_foto_prod'] = $fetch4->url_foto_prod;
                    
                    $dP++;
                }
        
                $selectFoto = "select * from fotos_empresa where cod_empresa = '$get1';";
                $execFoto = executeSelect($pdo, $selectFoto);
                $dadosFoto = array();
                $df = 0;
                while($fetchFoto = $execFoto->fetch(PDO::FETCH_OBJ)){
                    $dadosFot[$df]['nome_foto'] = $fetchFoto->nome_foto;
                    $dadosFot[$df]['url_foto_empresa'] = $fetchFoto->url_foto_empresa;
                    $dadosFot[$df]['desc_foto'] = $fetchFoto->desc_foto;
                    $df++;
                }
                include_once '../perfil_vendedor/index.php';
            }else{
                $get2 = $_GET['codigo'];
                $select = "select * from usuario where cod_usu = '$get2'";        
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_usu;      
        $parceiro = $fetch2->nome_par_usu;
        $senha = $fetch2->senha_usu;
        $diaCas = $fetch2->data_casal; 
        $email = $fetch2->email_usu;
        $emailU = $fetch2->email_usu;
        $imagemL = $fetch2->foto_usu;
        $imagemLoc = $fetch2->foto_local;
        $localCas = $fetch2->local_casal;
        $horarioCas = $fetch2->horario_casal;
        $codUsu = $fetch2->cod_usu;
        $emailU = $fetch2->email_usu;
        $select2 = "select * from lista_presentes where cod_usu = '$codUsu'";
        $execute2 = executeSelect($pdo, $select2);
        $dadosPres2 = array();
        $dP = 0;
        while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
            $dadosPres2[$dP]['cod_list_pres'] = $fetch3->cod_list_pres;
            $dadosPres2[$dP]['nome_valor_presente'] = $fetch3->nome_valor_presente;
            $dadosPres2[$dP]['status_presente'] = $fetch3->status_presente;
            $dP++;
        }
        
        $selectFavorita = "select p.cod_produto, p.url_foto_prod, p.nome_prod,
        f.cod_status_favorita
        from produto p
        inner join favorita f
        on f.cod_produto = p.cod_produto
        inner join usuario u
        on f.cod_usu = u.cod_usu
        where f.cod_usu = '{$_SESSION["id"]}'
        and   f.cod_produto = p.cod_produto
        and   f.cod_status_favorita = 'A';";

        $execFav = executeSelect($pdo, $selectFavorita);
        $dadosFav = array();
        $dFav = 0;
        while($fetchFav = $execFav->fetch(PDO::FETCH_OBJ)){
            $dadosFav[$dFav]['url_foto_prod'] = $fetchFav->url_foto_prod;
            $dadosFav[$dFav]['cod_produto'] = $fetchFav->cod_produto;
            $dFav++;
        }

            $execFav = executeSelect($pdo, $selectFavorita);
            $dadosFav = array();
            $dFav = 0;
            while($fetchFav = $execFav->fetch(PDO::FETCH_OBJ)){
                $dadosFav[$dFav]['url_foto_prod'] = $fetchFav->url_foto_prod;
                $dadosFav[$dFav]['cod_produto'] = $fetchFav->cod_produto;
                $dFav++;
            }

            $selectConvi = "SELECT * FROM convidados WHERE cod_usu = '{$_SESSION["id"]}'";
            $executeConv = executeSelect($pdo, $selectConvi);
            $dadosConv = array();
            $dConv = 0;
            while($fetchConv = $executeConv->fetch(PDO::FETCH_OBJ)){
                $dadosConv[$dConv]['email_conv'] = $fetchConv->email_conv;
                $dadosConv[$dConv]['num_acomp'] = $fetchConv->num_acomp;
                $dadosConv[$dConv]['nome_convi'] = $fetchConv->nome_convi;
                $dadosConv[$dConv]['presenca'] = $fetchConv->presenca;
                $dadosConv[$dConv]['celular_conv'] = $fetchConv->celular_conv;

                $dConv++;
            }
                include_once '../perfil_cliente/index.php';
            }
        }else{
        echo '<script>';
        echo "location.href='../../'";
        echo '</script>';
    }
    }
// pega acima
}else{

    

    
	echo "<script>alert('Faça o Login para continuar!');</script>";
    echo "<script>location.href='../login/index.html'</script>";
}
}
?>
<html></html>






             