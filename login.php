<?php
session_start();
include 'conecta.php';

$nome = $_POST['nm_usuario'];
$senha = $_POST['nm_senha'];

$sql = "SELECT * FROM tb_usuario WHERE nm_usuario = ? AND nm_senha = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$nome, $senha]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    $_SESSION['nm_usuario'] = $usuario['nm_usuario'];
    $_SESSION['nm_sobrenome'] = $usuario['nm_sobrenome'];
    echo "<script>window.location.href='home.php';</script>";
} else {
    echo "<p style='color:red'>Nome ou senha incorretos.</p>";
}
?>
