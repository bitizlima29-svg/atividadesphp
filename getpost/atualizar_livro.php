<?php
require 'banco.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: listar_livros.php');
    exit;
}

$id      = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$titulo  = trim($_POST['titulo'] ?? '');
$autor   = trim($_POST['autor'] ?? '');
$editora = trim($_POST['editora'] ?? '');
$ano     = trim($_POST['ano_publicacao'] ?? '');
$paginas = trim($_POST['paginas'] ?? '');

if (!$id || $titulo === '' || $autor === '' || $editora === '' || $ano === '' || $paginas === '') {
    die('Dados inválidos. <a href="listar_livros.php">Voltar</a>');
}

$sql = 'UPDATE livros
        SET titulo = :titulo,
            autor = :autor,
            editora = :editora,
            ano_publicacao = :ano,
            paginas = :paginas
        WHERE id = :id';

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':titulo'  => $titulo,
    ':autor'   => $autor,
    ':editora' => $editora,
    ':ano'     => (int) $ano,
    ':paginas' => (int) $paginas,
    ':id'      => $id,
]);

header('Location: listar_livros.php?atualizado=1');
exit;