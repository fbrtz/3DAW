<?php
$arquivo = "alunos.txt";

// Função para ler arquivo separado por ";"
function lerArquivo($arquivo) {
    if (file_exists($arquivo)) {
        $reader = fopen($arquivo, "r");
        
        while (!feof($reader)) {
            $linha = fgets($reader);
            if ($linha !== "") {
                $dados[] = explode(";", $linha); 
            }
        }
        fclose($reader);
    }
    return $dados;
}

// Lê o arquivo
$dados = lerArquivo($arquivo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
</head>
<body>
    <h2>Lista de Alunos</h2>
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
                        <form action="editar.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $index ?>">
                            <button type="submit">Alterar</button>
                        </form>

                        <form action="excluir.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $index ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <br>
    <form action="inclusao_aluno_arquivo.php">
        <button type="submit">Adicionar Aluno</button>
    </form>
</body>
</html>
