<?php
if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    $linhas = file("alunos.txt");
    $saida = "";

    foreach ($linhas as $i => $linha) {
        if ($i == 0) { 
            $saida .= $linha; 
            continue; 
        }
        $dados = explode(";", trim($linha));
        if ($dados[0] == $matricula) {
            continue; // ignora o aluno excluído
        }
        $saida .= $linha;
    }

    file_put_contents("alunos.txt", $saida);

    header("Location: listagem_aluno.php");
    exit;
}
?>
