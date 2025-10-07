<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numquestao = $_POST['numquestao'] ?? '';
    $pergunta = $_POST['pergunta'] ?? '';
    $resposta = $_POST['resposta'] ?? '';
    
    // Limpa a resposta
    $resposta = str_replace(["\r", "\n", "\t"], "", $resposta);
    
    $nomeArquivo = "respostas.txt";
    $cabecalho = "Número;Questão;Resposta\n";
    
    if (!file_exists($nomeArquivo) || filesize($nomeArquivo) == 0) {
        file_put_contents($nomeArquivo, $cabecalho);
    }
    
    $linhas = file($nomeArquivo, FILE_IGNORE_NEW_LINES);
    $existe = false;
    
    foreach ($linhas as $i => $linha) {
        if ($i === 0) continue;
        $dados = explode(";", $linha);
        if ($dados[0] == $numquestao) {
            $linhas[$i] = $numquestao . ";" . $pergunta . ";" . $resposta;
            $existe = true;
            break;
        }
    }
    
    if (!$existe) {
        $linhas[] = $numquestao . ";" . $pergunta . ";" . $resposta;
    }
    
    file_put_contents($nomeArquivo, implode("\n", $linhas) . "\n");
    
    echo json_encode([
        'success' => true,
        'message' => 'Resposta salva com sucesso'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método não permitido'
    ]);
}
?>