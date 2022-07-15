<?php

$host = "localhost";
$login = "root";
$senha = "";

$bd = "u-recycle";

$conexao = new mysqli($host, $login, $senha, $bd);

if($conexao->error){
    die("Erro ao Conectar com o Banco de Dados");
}

?>