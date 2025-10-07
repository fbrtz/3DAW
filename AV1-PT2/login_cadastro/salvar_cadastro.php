<?php    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuariopost = $_POST['email'];
        $senhapost   = $_POST['senha'];
        $admin_post = $_POST['admin'];
        $nomearquivo = "usuarios.txt";
        $id = -1;
        $arquivo = fopen($nomearquivo,"r");
        $cadastroValido = true;

        while(($linha = fgets($arquivo)) !== false){
            $linha = trim($linha);
            $dados = explode(";", $linha);

            $usuario = trim($dados[1]);
            $senha   = trim($dados[2]);

            if($usuariopost == $usuario){
                $cadastroValido = false;
                break;
            }
            $id++;
            if($id == 0){
                continue;
            }

        }

        fclose($arquivo);

        if($cadastroValido){
            $nomearquivo = "usuarios.txt";
            $arquivo = fopen($nomearquivo,"a");
            
            if ($admin_post == "1"){
                $admin_post = "sim";
            }else{
                $admin_post = "nao";
            }
            $linhacadastro = $id . ";" . $usuariopost . ";" . $senhapost . ";" . $admin_post . "\n";
            fwrite($arquivo,$linhacadastro);
            header("Location: login.php");
            exit;
        }else{
            header("Location: cadastro.php?erro=1");
            exit;
        }

        
    }
    
    
    
    


?>