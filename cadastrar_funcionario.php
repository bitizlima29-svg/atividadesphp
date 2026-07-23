<?php
require_once 'funcionario_conexao.php';

$mensagem = '';
$tipoMensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_completo = trim($_POST['nome_completo'] ?? '');
    $cargo = trim($_POST['cargo'] ?? '');
    $departamento = trim($_POST['departamento'] ?? '');
    $salario = trim($_POST['salario'] ?? '');
    $data_admissao = trim($_POST['data_admissao'] ?? '');
    $desafio = trim($_POST['desafio'] ?? '');

    if ($nome_completo === '' || $cargo === '' || $departamento === '' || $salario === '' || $data_admissao === '' || $desafio === '') {
        $mensagem = 'Preencha todos os campos antes de cadastrar o funcionário.';
        $tipoMensagem = 'erro';
    } elseif (!is_numeric($salario) || $salario < 0) {
        $mensagem = 'Salário deve ser um número positivo.';
        $tipoMensagem = 'erro';
    } else {
        $sql = 'INSERT INTO funcionarios (nome_completo, cargo, departamento, salario, data_admissao, desafio)
                VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('sssdss', $nome_completo, $cargo, $departamento, $salario, $data_admissao, $desafio);
        $stmt->execute();

        $mensagem = 'Funcionário cadastrado com sucesso!';
        $tipoMensagem = 'sucesso';

        $nome_completo = $cargo = $departamento = $data_admissao = $desafio = '';
        $salario = '';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .container { max-width: 780px; margin: 32px auto; padding: 24px; background: #fff; border-radius: 8px; box-shadow: 0 0 16px rgba(0,0,0,0.08); }
        h1 { margin-top: 0; }
        .menu a { margin-right: 16px; text-decoration: none; color: #1a73e8; }
        .alerta { padding: 12px 16px; border-radius: 4px; margin-bottom: 16px; }
        .alerta.sucesso { background: #e6ffed; color: #1a7f37; border: 1px solid #b7f0c3; }
        .alerta.erro { background: #ffecec; color: #9c2d2d; border: 1px solid #f5c2c2; }
        .campo { margin-bottom: 16px; }
        .campo label { display: block; margin-bottom: 6px; font-weight: bold; }
        .campo input, .campo textarea { width: 100%; padding: 10px; border: 1px solid #ccd0d7; border-radius: 4px; }
        .campo textarea { min-height: 100px; resize: vertical; }
        button { background: #1a73e8; color: #fff; border: none; padding: 12px 18px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <h1>Cadastro de Funcionário</h1>
    <p>Preencha os dados abaixo para cadastrar um novo funcionário.</p>

    <nav class="menu">
        <a href="cadastrar_funcionario.php">Cadastrar</a>
        <a href="listar_funcionarios.php">Listar Funcionários</a>
    </nav>

    <?php if ($mensagem): ?>
        <div class="alerta <?= $tipoMensagem ?>"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <form method="POST" action="cadastrar_funcionario.php">
        <div class="campo">
            <label for="nome_completo">Nome Completo</label>
            <input type="text" id="nome_completo" name="nome_completo" value="<?= htmlspecialchars($nome_completo ?? '') ?>" required>
        </div>
        <div class="campo">
            <label for="cargo">Cargo</label>
            <input type="text" id="cargo" name="cargo" value="<?= htmlspecialchars($cargo ?? '') ?>" required>
        </div>
        <div class="campo">
            <label for="departamento">Departamento</label>
            <input type="text" id="departamento" name="departamento" value="<?= htmlspecialchars($departamento ?? '') ?>" required>
        </div>
        <div class="campo">
            <label for="salario">Salário</label>
            <input type="number" step="0.01" id="salario" name="salario" value="<?= htmlspecialchars($salario ?? '') ?>" required>
        </div>
        <div class="campo">
            <label for="data_admissao">Data de Admissão</label>
            <input type="date" id="data_admissao" name="data_admissao" value="<?= htmlspecialchars($data_admissao ?? '') ?>" required>
        </div>
        <div class="campo">
            <label for="desafio">Desafio</label>
            <textarea id="desafio" name="desafio" required><?= htmlspecialchars($desafio ?? '') ?></textarea>
        </div>
        <button type="submit">Cadastrar Funcionário</button>
    </form>
</div>
</body>
</html>
