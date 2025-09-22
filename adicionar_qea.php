<?php

function ExibirProximaQuestao($num_prox){
    
    $numquestao = 0;
    $arquivo = fopen("qea.txt", "r");


    while($numquestao !== $num_prox){
        $numquestao++;
        ($linha = fgets($arquivo));
        

    $linha = trim($linha);

    $_questao = explode(";", $linha);

    $pergunta     = $_questao[0];
    $alternativa1 = $_questao[1];
    $alternativa2 = $_questao[2];
    $alternativa3 = $_questao[3];
    $alternativa4 = $_questao[4];
    $alternativa5 = $_questao[5];


    
    

    echo "<h2>Questão {$numquestao} </h2><br>";
    echo "<p>{$pergunta}</p>";

    
    echo "<form action='adicionar_qea.php' method='POST'>
            
            <input type='hidden' name='questao' value='{$numquestao}'>
            <input type='hidden' name='pergunta' value='{$pergunta}'>
            <label><input type='radio' name='option' value='A'> A) $alternativa1</label><br>
            <label><input type='radio' name='option' value='B'> B) $alternativa2</label><br>
            <label><input type='radio' name='option' value='C'> C) $alternativa3</label><br>
            <label><input type='radio' name='option' value='D'> D) $alternativa4</label><br>
            <label><input type='radio' name='option' value='E'> E) $alternativa5</label><br><br>

            <input type='submit' value='Enviar Resposta'>
        </form>";
    }

    fclose($arquivo);
    }



if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $questaoIndex = intval($_POST['questao']); //cast
    $resposta = $_POST['option'];

    // Lê todas as linhas do arquivo
    $linhas = file("qea.txt", FILE_IGNORE_NEW_LINES);


    if (isset($linhas[$questaoIndex])) {

        $linhaOriginal = $linhas[$questaoIndex];


        $partes = explode(";", $linhaOriginal);
        if (strpos(end($partes), "RESPOSTA=") === 0) {
            array_pop($partes);
        }

        $partes[] = "RESPOSTA=$resposta";


        $linhas[$questaoIndex] = implode(";", $partes);

        file_put_contents("qea.txt", implode(PHP_EOL, $linhas));

        $questaoIndex ++;
        echo "<p>Resposta salva com sucesso! Questão $questaoIndex → $resposta</p>";

        ExibirProximaQuestao($questaoIndex+1);
    } else {
        echo "<p>Erro: Questão não encontrada.</p>";
    }
} else {
    echo "<p>Método inválido.</p>";
}





?>