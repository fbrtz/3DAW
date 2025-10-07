<?php
$pergunta       = $_POST['pergunta'];
$alternativa1   = $_POST['alternativa1'] ?? "err";
$alternativa2   = $_POST['alternativa2'] ?? "err";
$alternativa3   = $_POST['alternativa3'] ?? "err";
$alternativa4   = $_POST['alternativa4'] ?? "err";
$alternativa5   = $_POST['alternativa5'] ?? "err";

$nomeArquivo = "perguntas.txt";
$cabecalho = "Questão;alternativa1;alternativa2;alternativa3;alternativa4;alternativa5\n";

$escreverCabecalho = !file_exists($nomeArquivo) || filesize($nomeArquivo) == 0;

$arquivo = fopen($nomeArquivo, "a");

if ($escreverCabecalho) {
    fwrite($arquivo, $cabecalho);
}


$linha =  $pergunta . ";" . $alternativa1 . ";" . $alternativa2 . ";" . $alternativa3 . ";" . $alternativa4 . ";" . $alternativa5 . "\n";
fwrite($arquivo, $linha);

fclose($arquivo);


echo json_encode(["redirect" => "/AV1-PT2/menu.html"]);
exit;
?>
