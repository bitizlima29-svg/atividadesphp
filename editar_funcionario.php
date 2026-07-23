<?php
require_once 'funcionario_conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: listar_funcionarios.php');
    exit;
}

$stmt = $conexao->prepare('SELECT id, nome_completo, cargo, departamento, salario, data_admissao, desafio FROM funcionarios WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$funcionario = $result->fetch_assoc();

if (!$funcionario) {
    header('Location: listar_funcionarios.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .container { max-width: 780px; margin: 32px auto; padding: 24px; background: #fff; border-radius: 8px; box-shadow: 0 0 16px rgba(0,0,0,0.08); }
        h1 { margin-top: 0; }
        .menu a { margin-right: 16px; text-decoration: none; color: #1a73e8; }
        .campo { margin-bottom: 16px; }
        .campo label { display: block; margin-bottom: 6px; font-weight: bold; }
        .campo input, .campo textarea { width: 100%; padding: 10px; border: 1px solid #ccd0d7; border-radius: 4px; }
        .campo textarea { min-height: 100px; resize: vertical; }
        button, .botao-cancelar { background: #1a73e8; color: #fff; border: none; padding: 12px 18px; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .botao-cancelar { background: #6c757d; margin-left: 12px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Editar Funcionário</h1>
    <p>Atualize os dados do funcionário <?= htmlspecialchars($funcionario['nome_completo']) ?>.</p>

    <nav class="menu">
        <a href="cadastrar_funcionario.php">Cadastrar Funcionário</a>
        <a href="listar_funcionarios.php">Listar Funcionários</a>
    </nav>

    <form method="POST" action="atualizar_funcionario.php">
        <input type="hidden" name="id" value="<?= (int) $funcionario['id'] ?>">

        <div class="campo">
            <label for="nome_completo">Nome Completo</label>
            <input type="text" id="nome_completo" name="nome_completo" value="<?= htmlspecialchars($funcionario['nome_completo']) ?>" required>
        </div>
        <div class="campo">
            <label for="cargo">Cargo</label>
            <input type="text" id="cargo" name="cargo" value="<?= htmlspecialchars($funcionario['cargo']) ?>" required>
        </div>
        <div class="campo">
            <label for="departamento">Departamento</label>
            <input type="text" id="departamento" name="departamento" value="<?= htmlspecialchars($funcionario['departamento']) ?>" required>
        </div>
        <div class="campo">
            <label for="salario">Salário</label>
            <input type="number" step="0.01" id="salario" name="salario" value="<?= htmlspecialchars($funcionario['salario']) ?>" required>
        </div>
        <div class="campo">
            <label for="data_admissao">Data de Admissão</label>
            <input type="date" id="data_admissao" name="data_admissao" value="<?= htmlspecialchars($funcionario['data_admissao']) ?>" required>
        </div>
        <div class="campo">
            <label for="desafio">Desafio</label>
            <textarea id="desafio" name="desafio" required><?= htmlspecialchars($funcionario['desafio']) ?></textarea>
        </div>

        <button type="submit">Salvar Alterações</button>
        <a class="botao-cancelar" href="listar_funcionarios.php">Cancelar</a>
    </form>
</div>
</body>
</html>
