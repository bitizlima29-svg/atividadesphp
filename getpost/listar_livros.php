<?php
require 'banco.php';

$stmt = $pdo->query('SELECT id, titulo, autor, editora, ano_publicacao, paginas FROM livros ORDER BY titulo');
$livros = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Livros</title>
    <link rel="stylesheet" href="atividade21.css">
</head>
<body>
<div class="container">
    <header class="topo">
        <h1>Acervo de Livros</h1>
        <p>Todos os livros cadastrados no sistema.</p>
    </header>

    <nav class="menu">
        <a href="cadastrar_livro.php">Cadastrar</a>
        <a href="listar_livros.php">Listar Livros</a>
    </nav>

    <?php if (isset($_GET['atualizado'])): ?>
        <div class="alerta sucesso">Livro atualizado com sucesso!</div>
    <?php endif; ?>

    <?php if (empty($livros)): ?>
        <div class="cartao">
            <p class="vazio">Nenhum livro cadastrado ainda.</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Ano</th>
                <th>Páginas</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?= htmlspecialchars($livro['titulo']) ?></td>
                    <td><?= htmlspecialchars($livro['autor']) ?></td>
                    <td><?= htmlspecialchars($livro['editora']) ?></td>
                    <td><?= htmlspecialchars($livro['ano_publicacao']) ?></td>
                    <td><?= htmlspecialchars($livro['paginas']) ?></td>
                    <td>
                        <a class="badge-editar" href="editar_livro.php?id=<?= (int) $livro['id'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>