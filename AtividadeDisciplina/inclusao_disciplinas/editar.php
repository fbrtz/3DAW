<?php
$arquivo = "disciplinas.txt";

// Funções
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
function salvarCSV($arquivo, $dados) {
    $writer = fopen($arquivo, "w");
    foreach ($dados as $linha) {
        fputcsv($writer, $linha,";");
    }
    fclose($writer);
}

// Se clicar em salvar
if (isset($_POST['salvar'])) {
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $carga = $_POST['carga'];

    $dados = lerCSV($arquivo);
    $dados[$id] = [$codigo, $nome, $carga];
    salvarCSV($arquivo, $dados);
    header("Location: listagem.php");
    exit;
}



// Abrir item para editar
$id = $_POST['id'];
$dados = lerCSV($arquivo);
$linha = $dados[$id];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Disciplina</title>
</head>
<body>
    <h2>Editar Disciplina</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        Código: <input type="text" name="codigo" value="<?= htmlspecialchars($linha[0]) ?>"><br>
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($linha[1]) ?>"><br>
        Carga Horária: <input type="text" name="carga" value="<?= htmlspecialchars($linha[2]) ?>"><br><br>
        <button type="submit" name="salvar">Salvar</button>
    </form>
</body>
</html>
