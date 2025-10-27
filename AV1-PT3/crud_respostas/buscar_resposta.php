<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"] ?? '';
    
    $arquivo = "respostas.txt";
    $respostaEncontrada = null;
    
    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
        
        foreach ($linhas as $index => $linha) {
            if ($index === 0) continue; // Pula cabeçalho
            
            $dados = explode(";", $linha);
            if ($dados[0] == $id) {
                $respostaEncontrada = [
                    'numero' => $dados[0],
                    'questao' => $dados[1],
                    'resposta' => $dados[2]
                ];
                break;
            }
        }
    }
    
    if ($respostaEncontrada) {
        echo json_encode([
            'success' => true,
            'data' => $respostaEncontrada
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Resposta não encontrada'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método não permitido'
    ]);
}
?>