<?php
$arquivo = fopen("perguntas.txt", "r");

if ($arquivo) {
    echo "<h2>Lista de Perguntas</h2>";
    echo "<a href='add_pergunta.html'><button>Adicionar nova pergunta</button></a><br><br>";
    echo "<a href='menu.html'><button>Voltar para o Menu</button></a><br><br>";
    echo "<a href='login.php'><button>Sair</button></a><br><br>";
    echo "<table border='1' cellpadding='5'>";
    $id = 1;
    $primeiraLinha = true;
    while (($linha = fgets($arquivo)) !== false) {
        $dados = explode(";", trim($linha));

        if ($primeiraLinha) {
            echo "<tr>";
            foreach ($dados as $coluna) {
                echo "<th>" . htmlspecialchars($coluna) . "</th>";
            }
            echo "<th>Ações</th>";
            echo "</tr>";
            $primeiraLinha = false;
            continue;
        }


        echo "<tr>";
        foreach ($dados as $dado) {
            echo "<td>" . htmlspecialchars($dado) . "</td>";
        }
        echo "<td>
                <form action='editar_pergunta.php' method='GET' style='display:inline'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit'>Alterar</button>
                </form>
                <form action='excluir_pergunta.php' method='GET' style='display:inline' onsubmit=\"return confirm('Deseja realmente excluir?');\">
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit'>Excluir</button>
                </form>
              </td>";
        echo "</tr>";
        $id++;
    }
    echo "</table>";

    fclose($arquivo);
} else {
    echo "Nenhum aluno cadastrado.";
}
?>