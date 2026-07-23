<?php
include'banco.php';

$mensagem = '';
$tipoMensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo  = trim($_POST['titulo'] ?? '');
    $autor   = trim($_POST['autor'] ?? '');
    $editora = trim($_POST['editora'] ?? '');
    $ano     = trim($_POST['ano_publicacao'] ?? '');
    $paginas = trim($_POST['paginas'] ?? '');

    if ($titulo === '' || $autor === '' || $editora === '' || $ano === '' || $paginas === '') {
        $mensagem = 'Preencha todos os campos antes de cadastrar o livro.';
        $tipoMensagem = 'erro';
    } elseif (!ctype_digit($ano) || !ctype_digit($paginas)) {
        $mensagem = 'Ano de publicação e páginas devem ser números inteiros.';
        $tipoMensagem = 'erro';
    } else {
        $sql = 'INSERT INTO livros (titulo, autor, editora, ano_publicacao, paginas)
                VALUES (:titulo, :autor, :editora, :ano, :paginas)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo'  => $titulo,
            ':autor'   => $autor,
            ':editora' => $editora,
            ':ano'     => (int) $ano,
            ':paginas' => (int) $paginas,
        ]);

        $mensagem = 'Livro cadastrado com sucesso!';
        $tipoMensagem = 'sucesso';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="atividade21.css">
</head>
<body>
<div class="container">
    <header class="topo">
        <h1>Cadastro de Livros</h1>
        <p>Preencha o formulário abaixo para adicionar um novo livro ao acervo.</p>
    </header>

    <nav class="menu">
        <a href="cadastrar_livro.php">Cadastrar</a>
        <a href="listar_livros.php">Listar Livros</a>
    </nav>

    <?php if ($mensagem): ?>
        <div class="alerta <?= $tipoMensagem ?>"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <div class="cartao">
        <form method="POST" action="cadastrar_livro.php">
            <div class="campo">
                <label for="titulo">Título do Livro</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="campo">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" required>
            </div>

            <div class="linha-dupla">
                <div class="campo">
                    <label for="editora">Editora</label>
                    <input type="text" id="editora" name="editora" required>
                </div>
                <div class="campo">
                    <label for="ano_publicacao">Ano de Publicação</label>
                    <input type="number" id="ano_publicacao" name="ano_publicacao" min="0" max="2100" required>
                </div>
            </div>

            <div class="campo">
                <label for="paginas">Quantidade de Páginas</label>
                <input type="number" id="paginas" name="paginas" min="1" required>
            </div>

            <button type="submit">Cadastrar Livro</button>
        </form>
    </div>
</div>
</body>
</html>