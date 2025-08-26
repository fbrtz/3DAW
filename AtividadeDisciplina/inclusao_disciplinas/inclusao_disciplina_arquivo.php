<?php
$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome  = $_POST['nomeDisc']  ?? '';
    $sigla = $_POST['siglaDisc'] ?? '';
    $carga = $_POST['cargaDisc'] ?? '';

    echo "Nome: " . $nome . "<br>Sigla: " . $sigla . "<br>Carga: " . $carga . "<br>";

    if (!file_exists('disciplinas.txt')) {
        // Cria o arquivo e escreve o cabeçalho
        $writer = fopen('disciplinas.txt','w') or die("erro ao criar arquivo");
        fputcsv($writer, ['Nome', 'Sigla', 'Carga'], ";");
        fclose($writer);

        $msg = "Arquivo criado e cabeçalho adicionado!<br>";
    }

    // Sempre adiciona a disciplina no final
    $writer = fopen('disciplinas.txt','a') or die("erro ao escrever no arquivo");
    $linha = [$nome,$sigla,$carga];
    fputcsv($writer, $linha,";");
    fclose($writer);

    $msg .= "Disciplina registrada com sucesso!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="inclusao_disciplina_arquivo.php" method="POST" name="inclusao">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nomeDisc" name="nomeDisc"><br>

        <label for="sigla">Sigla:</label><br>
        <input type="text" id="siglaDisc" name="siglaDisc"><br>

        <label for="carga">Carga Horária:</label><br>
        <input type="text" id="cargaDisc" name="cargaDisc"><br>

        <input type="submit" value="Incluir">
    </form>
    <form action="listagem.php">
        <input type="submit" value="Listar">
    </form>

    <p><?php echo $msg; ?></p>
</body>
</html>
