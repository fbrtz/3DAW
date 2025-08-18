<?php
    $v1 = $_GET["a"];
    $v2 = $_GET["b"];
    $result = 0;

    if($op == "+")
        $result = $v1 + $v2;
    elseif($op == "-")
        $result = $v1 + $v2;
    elseif($op == "*")
        $result = $v1 + $v2;
    elseif($op == "/")
        $result = $v1 + $v2;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title> Primeiros testes com Php</title>
    </head>
    <body>
        <?php echo "<h1> Resultado: $result<h1>" ?>
        <form action="main.php" method="POST" name="operacao">
            <label for="a">A:</label>
            <input type="text" id="a" name="a">
            <label for="b">B:</label>
            <input type="text" id="b" name="b">
            <label for="op">Operação:</label>
            <input type="text" id="op" name="op">
            <button type="submit">Enviar</button>
        </form>


    </body>
</html>