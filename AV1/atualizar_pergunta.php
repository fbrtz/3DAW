<?php
    $id             = $_POST["id"];
    $pergunta       = $_POST['pergunta'];
    $alternativa1   = $_POST['alternativa1'] ?? "";
    $alternativa2   = $_POST['alternativa2'] ?? "";
    $alternativa3   = $_POST['alternativa3'] ?? "";
    $alternativa4   = $_POST['alternativa4'] ?? "";
    $alternativa5   = $_POST['alternativa5'] ?? "";


    $nomeArquivo = "perguntas.txt";
    $arquivo = file($nomeArquivo);
    
    if($arquivo && $id < count($arquivo)){
        $linha_alterada = $pergunta . ";" . $alternativa1 . ";" . $alternativa2 . ";" . $alternativa3 . ";" . $alternativa4 . ";" .  $alternativa5 . "\n";
        $arquivo[$id] = $linha_alterada;
    }

    $arquivoescrita = fopen($nomeArquivo,"w");
    foreach($arquivo as $linha){
        fwrite($arquivoescrita,$linha);    
        
    }
    fclose($arquivoescrita);


    //volto pro menu
    header("Location: menu.html");
    exit;
?>