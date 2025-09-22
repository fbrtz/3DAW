<?php
    $numquestao = 1;
    $arquivo = fopen("qea.txt", "r");


    $linha = fgets($arquivo);

    $linha = trim($linha);

    $_questao = explode(";", $linha);

    $pergunta     = $_questao[0];
    $alternativa1 = $_questao[1];
    $alternativa2 = $_questao[2];
    $alternativa3 = $_questao[3];
    $alternativa4 = $_questao[4];
    $alternativa5 = $_questao[5];



    echo "<h2>Questão $numquestao</h2><br>";
    echo "<p>$pergunta</p>";


    echo "<form action='adicionar_qea.php' method='POST'>
            
            <input type='hidden' name='questao' value='{$numquestao}'>
            <input type='hidden' name='questao' value='{$pergunta}'>
            <label><input type='radio' name='option' value='A'> A) $alternativa1</label><br>
            <label><input type='radio' name='option' value='B'> B) $alternativa2</label><br>
            <label><input type='radio' name='option' value='C'> C) $alternativa3</label><br>
            <label><input type='radio' name='option' value='D'> D) $alternativa4</label><br>
            <label><input type='radio' name='option' value='E'> E) $alternativa5</label><br><br>

            <input type='submit' value='Enviar Resposta'>
        </form>";

    fclose($arquivo);
?>