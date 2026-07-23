<?php
require 'banco.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: listar_livros.php');
    exit;
}

$stmt = $pdo->prepare('SELECT id, titulo, autor, editora, ano_publicacao, paginas FROM livros WHERE id = :id');
$stmt->execute([':id' => $id]);
$livro = $stmt->fetch();

if (!$livro) {
    header('Location: listar_livros.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="atividade21.css">
</head>
<body>
<div class="container">
    <header class="topo">
        <h1>Editar Livro</h1>
        <p>Atualize os dados de "<?= htmlspecialchars($livro['titulo']) ?>".</p>
    </header>

    <nav class="menu">
        <a href="cadastrar_livro.php">Cadastrar</a>
        <a href="listar_livros.php">Listar Livros</a>
    </nav>

    <div class="cartao">
        <form method="POST" action="atualizar_livro.php">
            <input type="hidden" name="id" value="<?= (int) $livro['id'] ?>">

            <div class="campo">
                <label for="titulo">Título do Livro</label>
                <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
            </div>

            <div class="campo">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
            </div>

            <div class="linha-dupla">
                <div class="campo">
                    <label for="editora">Editora</label>
                    <input type="text" id="editora" name="editora" value="<?= htmlspecialchars($livro['editora']) ?>" required>
                </div>
                <div class="campo">
                    <label for="ano_publicacao">Ano de Publicação</label>
                    <input type="number" id="ano_publicacao" name="ano_publicacao" min="0" max="2100"
                           value="<?= htmlspecialchars($livro['ano_publicacao']) ?>" required>
                </div>
            </div>

            <div class="campo">
                <label for="paginas">Quantidade de Páginas</label>
                <input type="number" id="paginas" name="paginas" min="1"
                       value="<?= htmlspecialchars($livro['paginas']) ?>" required>
            </div>

            <button type="submit">Salvar Alterações</button>
            <a class="botao secundario" href="listar_livros.php">Cancelar</a>
        </form>
    </div>
</div>
</body>
</html>