<?php

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $id = $_GET["id"];


        $nomeArquivo = "perguntas.txt";
        $linhas = file($nomeArquivo);
        unset($linhas[$id]);
        $linhas = array_values($linhas);

        $arquivoescrita = fopen($nomeArquivo,"w");
        foreach($linhas as $linha){
            fwrite($arquivoescrita,$linha);    
            
        }
        fclose($arquivoescrita);

        //volto pro menu
        header("Location: menu.html");
        exit;


    }

?> 