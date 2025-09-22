<?php
    $pergunta       = $_POST['pergunta'];
    $alternativa1   = $_POST['alternativa1'] ?? "";
    $alternativa2   = $_POST['alternativa2'] ?? "";
    $alternativa3   = $_POST['alternativa3'] ?? "";
    $alternativa4   = $_POST['alternativa4'] ?? "";
    $alternativa5   = $_POST['alternativa5'] ?? "";


    $nomeArquivo = "perguntas.txt";
    $arquivo = fopen($nomeArquivo, "a");
    
    $cabecalho = "Questão;alternativa1;alternativa2;alternativa3;alternativa4;alternativa5\n";

    if (!file_exists($nomeArquivo) || filesize($nomeArquivo) == 0) {
        //cabeçalho
        fwrite($arquivo, $cabecalho);
    }
        
    
    fwrite($arquivo, $pergunta . ";" . $alternativa1 . ";" . $alternativa2 . ";" . $alternativa3 . ";" . $alternativa4 . ";" . $alternativa5 . "\n");    
    fclose($arquivo);

    //volto pro menu
    header("Location: menu.html");
    exit;
?>