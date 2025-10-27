<?php
header('Content-Type: application/json');

$numquestao = isset($_GET['q']) ? (int)$_GET['q'] : 1;
    
$caminho_arquivo = "../crud_perguntas/perguntas.txt";
$questao = [];

if (file_exists($caminho_arquivo)) {
    $linhas = file($caminho_arquivo);
    
    if ($numquestao < count($linhas)) {
        $linha = trim($linhas[$numquestao]);
        $_questao = explode(";", $linha);
        
        $questao = [
            'numero' => $numquestao,
            'pergunta' => $_questao[0],
            'alternativas' => [
                'A' => $_questao[1] ?? '',
                'B' => $_questao[2] ?? '',
                'C' => $_questao[3] ?? '',
                'D' => $_questao[4] ?? '',
                'E' => $_questao[5] ?? ''
            ],
            'discursiva' => empty(array_filter(array_slice($_questao, 1, 5)))
        ];
        
        echo json_encode([
            'success' => true,
            'data' => $questao
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Questão não encontrada'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Arquivo de perguntas não encontrado'
    ]);
}
?>