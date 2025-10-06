<?php
    echo "<a href='menu.html'><button>Voltar para o Menu</button></a><br><br>";
    echo "<a href='login.php'><button>Sair</button></a><br><br>";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $id = $_GET["id"];


        $nomeArquivo = "perguntas.txt";
        $linhas = file($nomeArquivo);
        $linha = $linhas[$id]; // pega a linha pelo índice
        $dados = explode(";",trim($linha));


        echo "
            <h2>Cadastro de questão</h2>
            <form action='atualizar_pergunta.php' method='POST'>
                <input type='hidden' name='id' value='{$id}'>
                <label>Pergunta: </label><br>
                <textarea name='pergunta' rows='5' cols='50' placeholder='Digite o texto aqui...' required>{$dados[0]}</textarea><br><br>
                <label>Alternativa A: </label><br>
                <textarea name='alternativa1' rows='2' cols='50' placeholder='Digite o texto aqui...'>{$dados[1]}</textarea><br><br>
                <label>Alternativa B:</label><br>
                <textarea name='alternativa2' rows='2' cols='50' placeholder='Digite o texto aqui...'>{$dados[2]}</textarea><br><br>
                <label>Alternativa C:</label><br>
                <textarea name='alternativa3' rows='2' cols='50' placeholder='Digite o texto aqui...'>{$dados[3]}</textarea><br><br>
                <label>Alternativa D:</label><br>
                <textarea name='alternativa4' rows='2' cols='50' placeholder='Digite o texto aqui...'>{$dados[4]}</textarea><br><br>
                <label>Alternativa E:</label><br>
                <textarea name='alternativa5' rows='2' cols='50' placeholder='Digite o texto aqui...'>{$dados[5]}</textarea><br><br>

                <input type='submit' value='Salvar'>
            </form>";


    }
?> 