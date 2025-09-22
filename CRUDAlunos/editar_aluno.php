<?php
$matricula = $_GET['matricula'];
$aluno = null;

$linhas = file("alunos.txt");
foreach ($linhas as $i => $linha) {
    if ($i == 0) continue;
    $dados = explode(";", trim($linha));
    if ($dados[0] == $matricula) {
        $aluno = $dados;
        break;
    }
}

if (!$aluno) {
    die("Aluno não encontrado!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Aluno</title>
</head>
<body>
    <h2>Editar Aluno</h2>
    <form action="atualizar_aluno.php" method="POST">
        <input type="hidden" name="matricula" value="<?php echo $aluno[0]; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $aluno[1]; ?>" required><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $aluno[2]; ?>" required><br>

        <label>Data de Nascimento:</label><br>
        <input type="date" name="dataNascimento" value="<?php echo $aluno[3]; ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
    <br>
    <a href="listagem_aluno.php"><button>Voltar</button></a>
</body>
</html>
