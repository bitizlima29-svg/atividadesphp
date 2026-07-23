<?php
/**
 * banco.php
 * Responsável exclusivamente por abrir a conexão com o banco de dados MySQL.
 * Todos os outros arquivos usam require 'banco.php' para obter a variável $pdo.
 */

$host   = 'host';
$dbname = 'biblioteca';
$user   = 'root';      // ajuste para o usuário do seu MySQL
$senha  = 'senac';           // ajuste para a senha do seu MySQL
$port = '3307';

$dsn = "mysqli:host=$host;port=3307;dbname=$dbname;charset=utf8mb4";
$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $senha, $opcoes);
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}