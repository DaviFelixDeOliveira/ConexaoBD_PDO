<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: Poppins, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .logout {
            margin-top: 20px;
            background-color: crimson;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Bem-vindo, <?php echo $usuario['nm_usuario'] . " " . $usuario['nm_sobrenome']; ?>!</h1>
    <a href="logout.php" class="logout">Sair</a>
</body>
</html>
