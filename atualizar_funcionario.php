<?php
require_once 'funcionario_conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome_completo = trim($_POST['nome_completo'] ?? '');
$cargo = trim($_POST['cargo'] ?? '');
$departamento = trim($_POST['departamento'] ?? '');
$salario = trim($_POST['salario'] ?? '');
$data_admissao = trim($_POST['data_admissao'] ?? '');
$desafio = trim($_POST['desafio'] ?? '');

if (!$id || $nome_completo === '' || $cargo === '' || $departamento === '' || $salario === '' || $data_admissao === '' || $desafio === '' || !is_numeric($salario) || $salario < 0) {
    header('Location: listar_funcionarios.php');
    exit;
}

$sql = 'UPDATE funcionarios SET nome_completo = ?, cargo = ?, departamento = ?, salario = ?, data_admissao = ?, desafio = ? WHERE id = ?';
$stmt = $conexao->prepare($sql);
$stmt->bind_param('sssdssi', $nome_completo, $cargo, $departamento, $salario, $data_admissao, $desafio, $id);
$stmt->execute();

header('Location: listar_funcionarios.php?atualizado=1');
exit;
