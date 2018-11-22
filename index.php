<?php 
    require_once 'Db/daohelper.php';
    session_start();
    $conn = connection();
    $conn->exec("set names utf8");
    include_once 'view/index.html';

?>