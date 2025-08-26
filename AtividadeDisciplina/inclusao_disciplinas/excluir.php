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

// Se clicou em "excluir"
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $dados = lerCSV($arquivo);

    if (isset($dados[$id])) {
        unset($dados[$id]);
        $dados = array_values($dados);
        salvarCSV($arquivo, $dados);
    }

    header("Location: listagem.php");
    exit;
}
?>
