<?php
session_start();
if (!isset($_SESSION['nm_usuario'])) {
    header("Location: index.html");
    exit;
}
$nomeCompleto = $_SESSION['nm_usuario'] . " " . $_SESSION['nm_sobrenome'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Bem-vindo</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $nomeCompleto ?></h1>
</body>
</html>
