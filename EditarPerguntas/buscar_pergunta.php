<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $nomeArquivo = "perguntas.txt";

    if (!file_exists($nomeArquivo)) {
        echo json_encode(["success" => false, "message" => "Arquivo não encontrado"]);
        exit;
    }

    $linhas = file($nomeArquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (!isset($linhas[$id])) {
        echo json_encode(["success" => false, "message" => "Pergunta não encontrada"]);
        exit;
    }

    $dados = explode(";", trim($linhas[$id]));

    $response = [
        "success" => true,
        "id" => $id,
        "pergunta" => $dados[0] ?? "",
        "alternativa1" => $dados[1] ?? "",
        "alternativa2" => $dados[2] ?? "",
        "alternativa3" => $dados[3] ?? "",
        "alternativa4" => $dados[4] ?? "",
        "alternativa5" => $dados[5] ?? "",
        "gabarito" => $dados[6] ?? ""
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["success" => false, "message" => "ID não fornecido"]);
}
?>