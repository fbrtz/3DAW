<?php
$arquivo = fopen("respostas.txt", "r");

if ($arquivo) {
    echo "<h2>Resumo</h2>";
    echo "<table border='1' cellpadding='5'>";
    $primeiraLinha = true;
    while (($linha = fgets($arquivo)) !== false) {
        $dados = explode(";", trim($linha));
        $id = $dados[0];
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
                <form action='editar_resposta.php' method='GET' style='display:inline'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit'>Alterar</button>
                </form>
              </td>";
        echo "</tr>";
        $id++;
    }
    echo "</table>";
    echo "<a href='fim.html'><button>Entregar Prova</button></a><br><br>";
    echo "<a href='login.php'><button>Sair</button></a><br><br>";
    fclose($arquivo);

} else {
    echo "Nenhum aluno cadastrado.";
}
?>