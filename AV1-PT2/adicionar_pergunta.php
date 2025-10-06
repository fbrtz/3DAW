<?php
$pergunta       = urldecode($_GET['pergunta']);
$alternativa1   = urldecode($_GET['alternativa1'] ?? "err");
$alternativa2   = urldecode($_GET['alternativa2'] ?? "err");
$alternativa3   = urldecode($_GET['alternativa3'] ?? "err");
$alternativa4   = urldecode($_GET['alternativa4'] ?? "err");
$alternativa5   = urldecode($_GET['alternativa5'] ?? "err");

$nomeArquivo = "perguntas.txt";
$cabecalho = "Questão;alternativa1;alternativa2;alternativa3;alternativa4;alternativa5\n";

$escreverCabecalho = !file_exists($nomeArquivo) || filesize($nomeArquivo) == 0;

$arquivo = fopen($nomeArquivo, "a");

if ($escreverCabecalho) {
    fwrite($arquivo, $cabecalho);
}

// Escreve linha como CSV simples
$linha = '"' . $pergunta . '";"' . $alternativa1 . '";"' . $alternativa2 . '";"' . $alternativa3 . '";"' . $alternativa4 . '";"' . $alternativa5 . '"' . "\n";
fwrite($arquivo, $linha);

fclose($arquivo);

// Redireciona de volta
header("Location: menu.html");
exit;
?>
