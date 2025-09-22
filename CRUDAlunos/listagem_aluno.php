<?php
$arquivo = fopen("alunos.txt", "r");

if ($arquivo) {
    echo "<h2>Lista de Alunos</h2>";
    echo "<a href='add_aluno.html'><button>Adicionar novo aluno</button></a><br><br>";

    echo "<table border='1' cellpadding='5'>";

    $primeiraLinha = true;
    while (($linha = fgets($arquivo)) !== false) {
        $dados = explode(";", trim($linha));

        if ($primeiraLinha) {
            // Cabeçalho vindo do arquivo
            echo "<tr>";
            foreach ($dados as $coluna) {
                echo "<th>" . htmlspecialchars($coluna) . "</th>";
            }
            echo "<th>Ações</th>";
            echo "</tr>";
            $primeiraLinha = false;
            continue;
        }

        if (count($dados) < 4) continue;

        echo "<tr>";
        foreach ($dados as $dado) {
            echo "<td>" . htmlspecialchars($dado) . "</td>";
        }
        echo "<td>
                <form action='editar_aluno.php' method='GET' style='display:inline'>
                    <input type='hidden' name='matricula' value='{$dados[0]}'>
                    <button type='submit'>Alterar</button>
                </form>
                <form action='excluir_aluno.php' method='GET' style='display:inline' onsubmit=\"return confirm('Deseja realmente excluir?');\">
                    <input type='hidden' name='matricula' value='{$dados[0]}'>
                    <button type='submit'>Excluir</button>
                </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";

    fclose($arquivo);
} else {
    echo "Nenhum aluno cadastrado.";
}
?>
