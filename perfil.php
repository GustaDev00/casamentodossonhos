<?php
require_once './Db/daohelper.php';
//require_once './processo.php';
session_start();
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
        
        $select2 = "select * from lista_presentes where cod_usu = '{$_SESSION["id"]}'";
        $execute2 = executeSelect($pdo, $select2);
        $dadosPres = array();
        $dP = 0;
        while($fetch3 = $execute2->fetch(PDO ::FETCH_OBJ)){
            $dadosPres[$dP]['nome_valor_presente'] = $fetch3->nome_valor_presente;
            $dP++;
        }
        
       /* echo "Seu id é: '{$_SESSION["id"]}' <br>";
        echo "Seu email é: $email <br>";
        echo "Seu nome é: $nome <br>";
        echo "Sua senha é: $senha <br>";
        */
        include_once "perfil_clienteL.html";
        //echo ' <img src="' . $imagemL . '" >'. "<br>"/;

    }else if($_SESSION["defini"] == 1){
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
        
        /*echo "Seu id é: '{$_SESSION["id"]}' <br>";
        echo "Seu email é: $email <br>";
        echo "Seu nome é: $nome <br>";
        echo "Sua senha é: $senha <br>";
        //echo ' <img src="' . $imagemL . '" >'. "<br>";*/
        include_once 'perfil_vendedorL.html';
        //echo ' <img src="' . $imagemL . '" >'. "<br>";
    }else if ($_SESSION["defini"] == 3){
        $select = "select * from adm where cod_adm = '{$_SESSION["id"]}'";
        $execute = executeSelect($pdo, $select);
        $fetch2 = $execute->fetch(PDO ::FETCH_OBJ);
        $nome = $fetch2->nome_adm;
        $senha = $fetch2->senha_adm;
        $email = $fetch2->email_adm;
        echo "Seu id é: '{$_SESSION["id"]}' <br>";
        echo "Seu email é: $email <br>";
        echo "Seu nome é: $nome <br>";
        echo "Sua senha é: $senha <br>";

    }
    ?>

    <form action="deslogar.php">
        <a href="deslogar.php"><button type="submit">DESLOGA</button></a>
    </form>
  <?php
}else{
	echo "<script>alert('Faça o Login para continuar!');</script>";
    echo "<script>location.href='login.html'</script>";
}







             