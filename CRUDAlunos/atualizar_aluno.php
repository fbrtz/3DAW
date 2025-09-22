<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dataNascimento = $_POST['dataNascimento'];

    // valida e-mail
    if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $email)) {
        die("E-mail inválido! <a href='listagem_aluno.php'>Voltar</a>");
    }

    $linhas = file("alunos.txt");
    $saida = "";

    foreach ($linhas as $i => $linha) {
        if ($i == 0) { 
            $saida .= $linha; 
            continue; 
        }
        $dados = explode(";", trim($linha));
        if ($dados[0] == $matricula) {
            $saida .= $matricula . ";" . $nome . ";" . $email . ";" . $dataNascimento . "\n";
        } else {
            $saida .= $linha;
        }
    }

    file_put_contents("alunos.txt", $saida);

    header("Location: listagem_aluno.php");
    exit;
}
?>
