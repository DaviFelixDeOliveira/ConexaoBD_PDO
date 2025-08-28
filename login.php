<?php
session_start();
include 'conecta.php';

$nome = $_POST['nm_usuario'] ?? '';
$sobrenome = $_POST['nm_sobrenome'] ?? '';
$senha = $_POST['nm_senha'] ?? '';

if (empty($nome) || empty($sobrenome) || empty($senha)) {
    echo "faltando campos";
    exit;
}

$sql = "SELECT * FROM tb_usuario 
        WHERE nm_usuario = ? 
        AND nm_sobrenome = ? 
        AND nm_senha = ?";

$stmt = $conn->prepare($sql);
$stmt->execute([$nome, $sobrenome, $senha]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    $_SESSION['nm_usuario']   = $usuario['nm_usuario'];
    $_SESSION['nm_sobrenome'] = $usuario['nm_sobrenome'];
    $_SESSION['nm_senha']     = $usuario['nm_senha'];
    $_SESSION['nm_email']     = $usuario['nm_email'] ?? null;
    $_SESSION['nm_login']     = $usuario['nm_login'] ?? null;
    $_SESSION['nr_fone']      = $usuario['nr_fone'] ?? null;
    
    echo "success";
} else {
    echo "error";
}
