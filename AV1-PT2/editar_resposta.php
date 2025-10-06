<?php
    echo "<a href='login.php'><button>Sair</button></a><br><br>";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $id = $_GET["id"];


        header("Location: exibir_prova.php?q=$id&edit=true");
    }
?> 