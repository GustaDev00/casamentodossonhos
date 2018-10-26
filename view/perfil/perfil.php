<?php

require_once '../../Db/daohelper.php';
//require_once './processo.php';
session_start();
$pdo= connection();
if(isset($_SESSION["email"]) and isset($_SESSION["senha"])){
	//header("Location: login_usuarios/login.php");
    //exit;
    $email = $_SESSION["email"];
    $senha = $_SESSION["senha"];
    $pdo= connection();
    if($_SESSION["defini"] == 2){
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
            $dadosPres[$dP]['nome_valor_presente'] = $fetch3->nome_valor_presente;
            $dadosPres[$dP]['status_presente'] = $fetch3->status_presente;
            $dP++;
        }
        
        $selectFavorita = "SELECT p.cod_produto, p.url_foto_prod, p.nome_prod,
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

            $selectConvi = "SELECT * FROM CONVIDADOS WHERE COD_USU = '{$_SESSION["id"]}'";
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
        /* echo "Seu id é: '{$_SESSION["id"]}' <br>";
            echo "Seu email é: $email <br>";
            echo "Seu nome é: $nome <br>";
            echo "Sua senha é: $senha <br>";
            */
            
            include_once "../perfil_cliente/index.php";
            //echo "<script>location.href='perfil_cliente/'</script>";
            //echo ' <img src="' . $imagemL . '" >'. "<br>"/;

    }else if($_SESSION["defini"] == 1){
        $id = $_SESSION['id'];
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
        $dadosFoto = array();
        $df = 0;
        while($fetchFoto = $execFoto->fetch(PDO::FETCH_OBJ)){
            $dadosFot[$df]['nome_foto'] = $fetchFoto->nome_foto;
            $dadosFot[$df]['url_foto_empresa'] = $fetchFoto->url_foto_empresa;
            $dadosFot[$df]['desc_foto'] = $fetchFoto->desc_foto;
            
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
        echo "Seu id é: '{$_SESSION["id"]}' <br>";
        echo "Seu email é: $emailAdm <br>";
        echo "Seu nome é: $nomeAdm <br>";
        echo "Sua senha é: $senhaAdm <br>";
        $selectUsu = "select * from usuario;";
        $executeU = executeSelect($pdo, $selectUsu);
        $fetchU = $executeU->fetch(PDO::FETCH_OBJ);
        $nomeU = $fetchU->nome_usu;
        $tipoU = $fetchU->tipo_usu;      
        $parceiroU = $fetchU->nome_par_usu;
        $senhaU = $fetchU->senha_usu;
        $diaCasU = $fetchU->data_casal; 
        $emailU = $fetchU->email_usu;
        $imagemLU = $fetchU->foto_usu;
        $imagemLocU = $fetchU->foto_local;
        $localCasU = $fetchU->local_casal;
        $horarioCasU = $fetchU->horario_casal;
        $nascimentoU = $fetchU->nascimento_usu;
        $cepU = $fetchU->cep_usu;
        $ruaU = $fetchU->rua_usu;
        $bairroU = $fetchU->bairro_usu;
        $cidadeU = $fetchU->cidade_usu;
        $estadoU = $fetchU->estado_usu;
        $tipo_parU = $fetchU->tipo_par_usu;
        $nascimento_parU = $fetchU->nascimento_par_usu; 

    }
    ?>
  <?php
}else{
    if(isset($_GET['codigo']) and isset($_GET['par'])){
        $_SESSION["id"] = $_GET['codigo'];
        $_SESSION["defini"] = $_GET['par'];
        
        if($_SESSION["defini"] == 2){
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
                $dadosPres[$dP]['nome_valor_presente'] = $fetch3->nome_valor_presente;
                $dP++;
            }
            
            include_once "../perfil_cliente/index.php";

    }else if($_SESSION["defini"] == 1){
        $id = $_SESSION['id'];
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

    
	echo "<script>alert('Faça o Login para continuar!');</script>";
    echo "<script>location.href='../login/index.html'</script>";
}
}








             