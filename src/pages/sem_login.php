<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['ID_USUARIO'])){
        die('SEM ACESSO <br> <a href="../../index.html"> VOLTAR </a>');
    } 
?>
