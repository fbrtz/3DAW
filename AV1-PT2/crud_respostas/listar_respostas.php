<?php
header('Content-Type: application/json');

$arquivo = "respostas.txt";
$respostas = [];

if (file_exists($arquivo) && filesize($arquivo) > 0) {
    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
    
    $cabecalho = explode(";", $linhas[0]);
    
    for ($i = 1; $i < count($linhas); $i++) {
        $dados = explode(";", $linhas[$i]);
        $resposta = [];
        
        for ($j = 0; $j < count($cabecalho); $j++) {
            $resposta[$cabecalho[$j]] = $dados[$j] ?? '';
        }
        
        $respostas[] = $resposta;
    }
}

echo json_encode([
    'success' => true,
    'data' => $respostas
]);
?>