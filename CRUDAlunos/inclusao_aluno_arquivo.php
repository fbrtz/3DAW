<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = trim($_POST['matricula']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $dataNascimento = trim($_POST['dataNascimento']);

    // --- Validação de email ---
    if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/", $email)) {
        die("E-mail inválido! <a href='add_aluno.html'>Voltar</a>");
    }

    // Lê o arquivo (se existir)
    $arquivoPath = "alunos.txt";
    $cabecalho = "matricula;nome;email;data_nascimento\n";

    if (!file_exists($arquivoPath) || filesize($arquivoPath) == 0) {
        // cria com cabeçalho
        file_put_contents($arquivoPath, $cabecalho);
    } else {
        // garante que o cabeçalho existe
        $linhas = file($arquivoPath);
        if (trim($linhas[0]) != trim($cabecalho)) {
            array_unshift($linhas, $cabecalho);
            file_put_contents($arquivoPath, implode("", $linhas));
        }
    }

    // --- Verifica duplicidade de matrícula ---
    $linhas = file($arquivoPath);
    foreach ($linhas as $i => $linha) {
        if ($i == 0) continue; // pula cabeçalho
        $dados = explode(";", trim($linha));
        if ($dados[0] == $matricula) {
            die("Matrícula já cadastrada! <a href='add_aluno.html'>Voltar</a>");
        }
    }

    // --- Grava o novo aluno ---
    $linha = $matricula . ";" . $nome . ";" . $email . ";" . $dataNascimento . "\n";
    $arquivo = fopen($arquivoPath, "a");
    fwrite($arquivo, $linha);
    fclose($arquivo);

    header("Location: listagem_aluno.php");
    exit;
}
?>
