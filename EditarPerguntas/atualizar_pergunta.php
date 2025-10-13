<?php
$id           = $_POST["id"];
$pergunta     = $_POST['pergunta'] ?? "";
$alternativa1 = $_POST['alternativa1'] ?? "";
$alternativa2 = $_POST['alternativa2'] ?? "";
$alternativa3 = $_POST['alternativa3'] ?? "";
$alternativa4 = $_POST['alternativa4'] ?? "";
$alternativa5 = $_POST['alternativa5'] ?? "";

$nomeArquivo = "perguntas.txt";
$success = false;


if (file_exists($nomeArquivo)) {
    $linhas = file($nomeArquivo, FILE_IGNORE_NEW_LINES);
    if (isset($linhas[$id])) {
        $linhas[$id] = "$pergunta;$alternativa1;$alternativa2;$alternativa3;$alternativa4;$alternativa5";

        $fp = fopen($nomeArquivo, "w");
        foreach ($linhas as $linha) {
            fwrite($fp, $linha . "\n");
        }
        fclose($fp);

        $success = true;
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    "success" => $success,
    "message" => $success ? "Pergunta atualizada com sucesso!" : "Erro ao atualizar a pergunta."
]);
?>