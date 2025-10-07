<!DOCTYPE html>

<html lang="pt-br">
    <head>
        
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Cadastro</h2>

        <?php
            if (isset($_GET['erro'])) {
                if ($_GET['erro'] == 1) {
                    echo "<p style='color:red;'>Usuário já cadastrado!</p>";
                }
            }
        ?>
    <form action="salvar_cadastro.php" method="POST">
        <label>Usuario:</label><br>
        <input type="text" name="email" required><br>

        <label>Senha:</label><br>
        <input type="text" name="senha" required><br>
        
        <label><input type="checkbox" name="admin" value="1">Admin</label>

        <p>Já possui conta? Clique <a href="login.php">aqui</a> </p>

        <input type="submit" value="Cadastrar">
    </form>
    </body>
</html>