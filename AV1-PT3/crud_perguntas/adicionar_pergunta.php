<?php


$pergunta       = $_POST['pergunta'] ?? '';
$alternativa1   = $_POST['alternativa1'] ?? 'err';
$alternativa2   = $_POST['alternativa2'] ?? 'err';
$alternativa3   = $_POST['alternativa3'] ?? 'err';
$alternativa4   = $_POST['alternativa4'] ?? 'err';
$alternativa5   = $_POST['alternativa5'] ?? 'err';


$servidor = "localhost";
$username = "root";
$senha = "";
$database = "av1";

$conn = new mysqli($servidor, $username, $senha, $database);

if ($conn->connect_error) {
    die("Conexao falhou, avise o administrador do sistema");
}

$comandoSQL = "INSERT INTO `Perguntas` (`pergunta`, `alternativa1`, `alternativa2`, `alternativa3`, `alternativa4`, `alternativa5`) VALUES ('"
    . $pergunta . "','" 
    . $alternativa1 . "','" 
    . $alternativa2 . "','" 
    . $alternativa3 . "','" 
    . $alternativa4 . "','" 
    . $alternativa5 . "')";

$resultado = $conn->query($comandoSQL);

if ($resultado === TRUE) {
    echo json_encode(["redirect" => "/AV1-PT2/menu.html"]);
    exit;
} else {
    echo json_encode(["redirect" => "/AV1-PT2/menu.html"]);
    exit;
}


$conn->close();
?>

