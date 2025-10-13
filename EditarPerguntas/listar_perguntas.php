<?php
header('Content-Type: application/json; charset=utf-8');

$arquivo = fopen("perguntas.txt", "r");
$response = [];

if ($arquivo) {
    $id = 1;
    $primeiraLinha = true;
    $headers = [];

    while (($linha = fgets($arquivo)) !== false) {
        $dados = explode(";", trim($linha));

        if ($primeiraLinha) {
            $headers = $dados;
            $primeiraLinha = false;
            continue;
        }

        $item = ["id" => $id];
        foreach ($headers as $i => $coluna) {
            $item[$coluna] = $dados[$i] ?? "";
        }

        $response[] = $item;
        $id++;
    }
    fclose($arquivo);

    echo json_encode([
        "success" => true,
        "headers" => $headers,
        "data" => $response
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Nenhum dado encontrado."
    ], JSON_UNESCAPED_UNICODE);
}
?>