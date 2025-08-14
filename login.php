<?php
session_start();
include 'conecta.php';

$nome = $_POST['nm_usuario'];
$sobrenome = $_POST['nm_sobrenome'];
$senha = $_POST['nm_senha'];

$sql = "SELECT * FROM tb_usuario 
        WHERE nm_usuario = ? 
        AND nm_sobrenome = ? 
        AND nm_senha = ?";

$stmt = $conn->prepare($sql);
$stmt->execute([$nome, $sobrenome, $senha]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    $_SESSION['nm_usuario'] = $usuario['nm_usuario'];
    $_SESSION['nm_sobrenome'] = $usuario['nm_sobrenome'];
    // Retorna uma string simples indicando sucesso
    echo "success";
} else {
    echo "error";
}
?>
