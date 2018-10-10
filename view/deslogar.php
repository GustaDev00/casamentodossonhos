<?php
include_once './Db/daohelper.php';
session_start();
session_destroy();

echo "<script>location.href='index.html'</script>";
