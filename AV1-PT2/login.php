<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php
        if (isset($_GET['erro'])) {
            if ($_GET['erro'] == 1) {
                echo "<p style='color:red;'>Usuário ou senha inválidos!</p>";
            }
        }
    ?>

    <form action="validar_login.php" method="POST">
        <label>Usuário:</label><br>
        <input type="text" name="email" required><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br>

        <p>Não possui conta? Clique <a href="cadastro.php">aqui</a> </p>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>