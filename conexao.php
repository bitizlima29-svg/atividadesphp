<?php
$host = "localhost";
$usuario = "root";
$senha = "senac";
$banco = "db_php";
$porta = "3307";


$conexao = new mysqli(
    $host,
    $usuario,
    $senha,
    $banco,
    $porta
    
);
    
    if ($conexao->connect_error) {
        die ("Erro ao conectar ao banco de dados".$conexao->connect_error);
    }
    echo "Conectado com sucesso ao banco de dados!";

?>