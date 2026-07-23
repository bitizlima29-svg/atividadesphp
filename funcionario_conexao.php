<?php
$host = 'localhost';
$usuario = 'root';
$senha = 'senac';
$banco = 'empresa';
$porta = 3307;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);
$conexao->set_charset('utf8mb4');
