<?php
include_once './Db/daohelper.php';


if(session_start() == true){
    session_destroy();
    echo "CARALHO APRENDEU A DESLOGAR, PARABÉNS SEU BOSTA!";
    echo "<script>location.href='index.php'</script>";
}else{
    echo "<script>alert('IIH CARAIO FODEU');</script>";
}