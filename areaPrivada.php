<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
?>


Seja bem vindo!!!
<a href="sair.php">Sair</a>