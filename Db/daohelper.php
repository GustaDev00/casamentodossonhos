<?php

// Estabelecer conexão com o banco em PDO

function connection($tipoBanco = 'mysql'){
    try{
    $host = 'localhost';
    $port = '3306';
    $dbname = 'casamentodossonhos';
    $user = 'root';
    $password = '';
    switch($tipoBanco){
        case 'mysql':
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname",
                $user,$password);
            break;
        
        case 'oracle':
            break;
        
        case 'sqlserver':
            break;
        default:
            break;
    }
    if(isset($conn)){
        return $conn;
    }
   
    } catch (PDOException $exc){
    throw new Exception($exc->getCode());
    }
}

//Função para ações (insert, update e delet)

function executeQuery(&$conn, $query){
    $conn ->beginTransaction();
    
    $result = $conn ->exec($query);
    if($result){
        $conn->commit();
    }else{
        $conn->rollBack();
    }
    return $result;
}

// Função para ação SELECT
function executeSelect(&$conn,$query){
    $result = $conn->query($query);
    return $result;
}