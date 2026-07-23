<?php
require_once __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: formulario.php');
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = trim($_POST['nome'] ?? '');
$sobrenome = trim($_POST['sobrenome'] ?? '');
$usuario = trim($_POST['usuario'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');

if (!$id || $nome === '' || $sobrenome === '' || $usuario === '' || $cidade === '') {
    echo 'Preencha todos os campos.';
    exit;
}

$sql = 'UPDATE form SET nome = ?, sobrenome = ?, usuario = ?, cidade = ? WHERE id = ?';
$stmt = $conexao->prepare($sql);
$stmt->bind_param('ssssi', $nome, $sobrenome, $usuario, $cidade, $id);

if ($stmt->execute()) {
    echo 'Cliente atualizado com sucesso.';
} else {
    echo 'Erro ao atualizar cliente: ' . $stmt->error;
}

