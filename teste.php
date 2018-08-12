<?php

/*
  CREATE TABLE `tb_funcionario` (
  `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
  `nome` varchar(250) NOT NULL,
  `profissao` varchar(250) NOT NULL
  )DEFAULT CHARSET=utf8

 */

// dados da conexao:
$database = 'minha_base_de_dados';
$db_user = 'root';
$db_password = 'toor';


// instancia a classe
$conn = new PDO('mysql:host=localhost;dbname=' . $database, $db_user, $db_password);


// pagina resgatada da URL
$page = (isset($_GET['page'])) ? $_GET['page'] : NULL;


// id restagado da URL
$id = (isset($_GET['id'])) ? (int) $_GET['id'] : 0;

// inicia a mensagem vazia
$mensagem = '';


// verifica se o formulario foi acionado
if (isset($_POST['submit'])) {


    // prepara os dados do formulario
    $post_nome = (isset($_POST['nome'])) ? $_POST['nome'] : 'NULL';
    $post_profissao = (isset($_POST['profissao'])) ? $_POST['profissao'] : 'NULL';
    $post_id = (isset($_POST['id'])) ? (int) $_POST['id'] : 0;



    // verifica se foi o formulario de insert
    if ($_POST['submit'] == 'add') {

        // prepara o SQL
        $sql = $conn->prepare('INSERT INTO tb_funcionarios (nome, profissao)VALUES(:nome, :profissao)');


        // Prepara os dados do formulario
        $data = array(
            ':nome' => $post_nome,
            ':profissao' => $post_profissao,
        );

        try {

            // executa o SQL
            $sql->execute($data);

// Mensagem de alerta
            $mensagem = alert('Registro Adicionado');
        } catch (PDOException $e) {

            // mostra o erro
            $e->getMessage();
        }
    }


    // verifica se foi o formulario de update
    if ($_POST['submit'] == 'edit') {

        // prepara o SQL
        $sql = $conn->prepare('UPDATE tb_funcionarios SET nome= :nome, profissao = :profissao WHERE id= :id');


// Prepara os dados do formulario        
        $data = array(
            ':nome' => $post_nome,
            ':profissao' => $post_profissao,
            ':id' => $post_id,
        );

        try {

// executa
            $sql->execute($data);

// mensagem
            $mensagem = alert('Registro Editado');
        } catch (PDOException $e) {

// mostra o erro
            $e->getMessage();
        }
    }
}

// prepara o SQL
$sql = $conn->prepare('SELECT * FROM tb_funcionarios ORDER BY id DESC');

try {
    // executa o SQL
    $sql->execute();

// Cria uma variavel de listagem
    $listar = $sql->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {

    // mostra o erro
    $e->getMessage();
}





// verifica se o id foi acionadao para o update
if ($id > 0) {

    // prepara o SQL
    $sql = $conn->prepare('SELECT * FROM tb_funcionarios WHERE id= :id');

    // Prepara os dados
    $data = array(':id' => $id);

    try {
        // executa o SQL
        $sql->execute($data);

// Prepara o fecth
        $row = $sql->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
// mostra o erro
        $e->getMessage();
    }
}

/*
 * prepara os dados para ser mostrado
 * no php 5.3 as variaveis devem ser declaradas
 */
$value_id = (isset($row->id)) ? $row->id : FALSE;
$value_nome = (isset($row->nome)) ? $row->nome : '';
$value_profissao = (isset($row->profissao)) ? $row->profissao : '';

// delete
if (($page == 'delete') && $id > 0) {

    // executa o SQL para excluir
    $sql = $conn->prepare('DELETE FROM tb_funcionarios WHERE id= :id');

// prepara os dados
    $data = array(':id' => $id);

    try {
        // executa o SQL
        $sql->execute($data);

// Mostra a mensagem de erro
        $mensagem = alert('Registro deletado.');
    } catch (PDOException $e) {

        // mostra a mensagem
        $e->getMessage();
    }
}



////////////////////////////////////////////////////////

/**  javascript alert() */
function alert($texto, $redirect = TRUE) {
    $redirect = ($redirect) ? 'location.href="crud_pdo.php";' : '';
    return '
        <script type="text/javascript">
        alert("' . $texto . '");
        ' . $redirect . '
        </script>
    ';
}

/* * ***************************************
 * 
 * conteudo da pagina 
 * 
 * **************************************** */


echo '<a href="crud_pdo.php">lista</a> |' . "\n";
echo '<a href="crud_pdo.php?page=add">Add</a> | ' . "\n";
echo '<hr />' . "\n";
echo $mensagem;



/* * ***************************************
 * 
 * Listar registros 
 * 
 * **************************************** */

if ($page == NULL) {

    echo "<h1>listar</h1>\n";

    if (count($listar) > 0):

        foreach ($listar as $row):
            echo "<p>\n";
            echo 'Nome: ', $row->nome, "<br />\n";
            echo 'Profissao: ', $row->profissao, "<br />\n";
            echo '<a href="crud_pdo.php?page=edit&id=' . $row->id . '">Edit</a> | ' . "\n";
            echo '<a href="crud_pdo.php?page=delete&id=' . $row->id . '"">Delete[x]</a>' . "\n";
            echo "</p>\n";
        endforeach;


    else:

        echo 'Adicione um registro <a href="crud_pdo.php?page=add">Aqui</a>';

    endif;





    /*     * ***************************************
     * 
     * Adicionar registro 
     * 
     * **************************************** */
}elseif ($page == 'add') {

    echo "<h1>Add</h1>\n";

    echo '<form method="post">' . "\n";
    echo 'Nome:<br />' . "\n";
    echo '<input type="text" name="nome" style="whidth: 350px" /><br />' . "\n";
    echo 'Profissao:<br />' . "\n";
    echo '<input type="text" name="profissao" style="whidth: 350px" /><br />' . "\n";
    echo '<input type="submit" name="submit" value="add" />' . "\n";
    echo '</form>' . "\n";


    /* * ***************************************
     * 
     * Editar registro
     * 
     * **************************************** */
} elseif ($page == 'edit') {

    echo "<h1>Edit</h1>\n";

    if ($value_id) {

        echo '<form method="post">' . "\n";
        echo '<input type="hidden" name="id" value="' . $value_id . '" /><br />' . "\n";
        echo 'Nome:<br />' . "\n";
        echo '<input type="text" name="nome" value="' . $value_nome . '" style="whidth: 350px" /><br />' . "\n";
        echo 'Profissao:<br />' . "\n";
        echo '<input type="text" name="profissao" value="' . $value_profissao . '" style="whidth: 350px" /><br />' . "\n";
        echo '<input type="submit" name="submit" value="edit" />' . "\n";
        echo '</form>' . "\n";
    } else {

        echo 'Registro nao existe';
    }
}
