<?php
include_once '../../Db/daohelper.php';

$id = $_GET['id'];
$conn = connection();
$sql = "SELECT * FROM USUARIO WHERE COD_USU = '$id'";

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
        include_once 'cadastroConvidado.html';
?>
    <h2>Casamento de: <?php echo " $nome e $parceiro"; ?></h2>
        <img class="galeria3" src="<?php echo $imagemLoc ?>">