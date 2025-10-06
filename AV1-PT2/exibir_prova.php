<?php
    $numquestao = isset($_GET['q']) ? (int)$_GET['q'] : 1;
    $edicao = isset($_GET['edit']) ? $_GET['edit'] : "";
    $linhas = file("perguntas.txt");

    if ($numquestao < count($linhas)) {
        $linha = trim($linhas[$numquestao]);
        $_questao = explode(";", $linha);

        $pergunta     = $_questao[0];
        $alternativa1 = $_questao[1];
        $alternativa2 = $_questao[2];
        $alternativa3 = $_questao[3];
        $alternativa4 = $_questao[4];
        $alternativa5 = $_questao[5];

        // Verifica se todas alternativas estão vazias
        if (!$alternativa1 && !$alternativa2 && !$alternativa3 && !$alternativa4 && !$alternativa5){
            $discursiva = true;
        }else{
            $discursiva = false;
        }

        echo "<h2>Questão " . ($numquestao) . "</h2><br>";
        echo "<p>$pergunta</p>";


        echo "<form action='adicionar_resposta.php' method='POST'>
                <input type='hidden' name='edit' value='{$edicao}'>
                <input type='hidden' name='numquestao' value='{$numquestao}'>
                <input type='hidden' name='pergunta' value='{$pergunta}'>";
            
                if ($discursiva){
                    echo "<textarea name='option' rows='5' cols='50' placeholder='Digite sua resposta aqui...'></textarea><br><br>";
                }else{
                    echo "<label><input type='radio' name='option' value='A'> A) $alternativa1</label><br>
                    <label><input type='radio' name='option' value='B'> B) $alternativa2</label><br>
                    <label><input type='radio' name='option' value='C'> C) $alternativa3</label><br>
                    <label><input type='radio' name='option' value='D'> D) $alternativa4</label><br>
                    <label><input type='radio' name='option' value='E'> E) $alternativa5</label><br><br>";
                }
            echo " <input type='submit' value='Enviar Resposta'>
                </form>";
    } else {
        header("Location: listar_respostas.php");
        exit;
    }
?>