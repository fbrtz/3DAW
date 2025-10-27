<?php    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuariopost = $_POST['email'];
        $senhapost   = $_POST['senha'];
        $nomearquivo = "usuarios.txt";

        $arquivo = fopen($nomearquivo,"r");
        $loginValido = false;

        while(($linha = fgets($arquivo)) !== false){
            $linha = trim($linha);
            $dados = explode(";", $linha);

            $usuario = trim($dados[1]);
            $senha   = trim($dados[2]);
            $admin   = trim($dados[3]);
            echo "<script>console.log('{$admin}');</script>";

            if($usuariopost == $usuario && $senhapost == $senha){
                $loginValido = true;

                if(strtolower($admin) == "sim"){
                    header("Location: ../menu.html");
                } else {
                    header("Location: ../menualun.html");
                }
                exit;
            }
        }

        fclose($arquivo);

        if(!$loginValido){
            header("Location: login.php?erro=1");
            exit;
        }

        
    }
    
    
    
    


?>