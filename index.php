<?php 
    require_once 'Db/daohelper.php';
    session_start();
    $conn = connection();
    include_once 'view/index.html';

?>