<?php
$arquivo = "disciplinas.txt";

// Função para ler CSV
function lerCSV($arquivo) {
    $dados = [];
    if (($reader = fopen($arquivo, "r")) !== FALSE) {
        while (($linha = fgetcsv($reader, 1000, ";")) !== FALSE) {
            $dados[] = $linha;
        }
        fclose($reader);
    }
    return $dados;
}

// Lê o arquivo
$dados = lerCSV($arquivo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Disciplinas</title>
</head>
<body>
    <h2>Lista de Disciplinas</h2>
    <table border="1" cellpadding="5">
        <?php foreach ($dados as $index => $linha): ?>
            <?php if ($index == 0): ?>    
                <tr>
                    <?php foreach ($linha as $coluna): ?>
                        <th><?= htmlspecialchars($coluna) ?></th>
                    <?php endforeach; ?>
                    <th>Ação</th>
                </tr>
            <?php else: ?>
                <tr>
                    <?php foreach ($linha as $coluna): ?>
                        <td><?= htmlspecialchars($coluna) ?></td>
                    <?php endforeach; ?>
                    <td>
                        <form action="editar.php" method="post">
                            <input type="hidden" name="id" value="<?= $index ?>">
                            <button type="submit">Alterar</button>
                        </form>

                            <form action="excluir.php" method="post">
                            <input type="hidden" name="id" value="<?= $index ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        <form action="inclusao_disciplina_arquivo.php">
            <input type="hidden" name="id" value="<?= $index ?>">
            <button type="submit">Adicionar Nova Disciplina</button>
        </form>
    </table>
</body>
</html>
