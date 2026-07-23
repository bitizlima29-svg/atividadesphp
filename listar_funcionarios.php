<?php
require_once 'funcionario_conexao.php';

$mensagem = '';
if (isset($_GET['atualizado'])) {
    $mensagem = 'Funcionário atualizado com sucesso!';
}

$resultado = $conexao->query('SELECT id, nome_completo, cargo, departamento, salario, data_admissao, desafio FROM funcionarios ORDER BY nome_completo');
$funcionarios = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Funcionários</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .container { max-width: 1000px; margin: 32px auto; padding: 24px; background: #fff; border-radius: 8px; box-shadow: 0 0 16px rgba(0,0,0,0.08); }
        h1 { margin-top: 0; }
        .menu a { margin-right: 16px; text-decoration: none; color: #1a73e8; }
        .alerta { padding: 12px 16px; border-radius: 4px; margin-bottom: 16px; background: #e6ffed; color: #1a7f37; border: 1px solid #b7f0c3; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { padding: 12px 10px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #f3f6fb; }
        .botao-editar { display: inline-block; padding: 8px 12px; background: #1a73e8; color: #fff; text-decoration: none; border-radius: 4px; }
        .nenhum { padding: 24px; background: #fff7e6; border: 1px solid #ffe5b4; border-radius: 6px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Funcionários Cadastrados</h1>
    <p>Confira a lista de funcionários e clique em Editar para alterar os dados.</p>

    <nav class="menu">
        <a href="cadastrar_funcionario.php">Cadastrar Funcionário</a>
        <a href="listar_funcionarios.php">Listar Funcionários</a>
    </nav>

    <?php if ($mensagem): ?>
        <div class="alerta"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <?php if (empty($funcionarios)): ?>
        <div class="nenhum">Nenhum funcionário cadastrado ainda.</div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome Completo</th>
                    <th>Cargo</th>
                    <th>Departamento</th>
                    <th>Salário</th>
                    <th>Data de Admissão</th>
                    <th>Desafio</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $funcionario): ?>
                    <tr>
                        <td><?= htmlspecialchars($funcionario['nome_completo']) ?></td>
                        <td><?= htmlspecialchars($funcionario['cargo']) ?></td>
                        <td><?= htmlspecialchars($funcionario['departamento']) ?></td>
                        <td>R$ <?= number_format($funcionario['salario'], 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars(date('d/m/Y', strtotime($funcionario['data_admissao']))) ?></td>
                        <td><?= htmlspecialchars($funcionario['desafio']) ?></td>
                        <td><a class="botao-editar" href="editar_funcionario.php?id=<?= (int) $funcionario['id'] ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
