<?php
$edit       = $_POST["edit"];
$numquestao = $_POST['numquestao'];
$pergunta   = $_POST['pergunta'];
$resposta   = $_POST['option'] ?? "";
$resposta   = str_replace(["\r", "\n", "\t"], "", $resposta);

$nomeArquivo = "respostas.txt";
$cabecalho = "Número;Questão;Resposta\n";

if (!file_exists($nomeArquivo) || filesize($nomeArquivo) == 0) {
    $arquivo = fopen($nomeArquivo, "w");
    fwrite($arquivo, $cabecalho);
    fclose($arquivo);
}


$tudo = file($nomeArquivo, FILE_IGNORE_NEW_LINES);
$existe = false;

foreach ($tudo as $i => $linha) {
    if ($i === 0) continue; // pula cabeçalho
    $dados = explode(";", $linha);
    if ($dados[0] == $numquestao) {
        $tudo[$i] = $numquestao . ";" . $pergunta . ";" . $resposta;
        $existe = true;
        break;
    }
}


if (!$existe) {
    $tudo[] = $numquestao . ";" . $pergunta . ";" . $resposta;
}

$arquivo = fopen($nomeArquivo, "w");
foreach ($tudo as $linha) {
    fwrite($arquivo, $linha . "\n");
}
fclose($arquivo);

$prox = $numquestao + 1;
if ($edit === "true"){
    header("Location: listar_respostas.php");
    exit;
}
header("Location: exibir_prova.php?q=$prox");
exit;
?>
