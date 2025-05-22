<?php
include 'conecta.php';

$nome = $_POST['nm_usuario'];
$email = $_POST['nm_email'];
$senha = $_POST['nm_senha'];


try {
    $sql = "INSERT INTO tb_usuario (nm_usuario, nm_email, nm_senha)
            VALUES (:nome, :email, :senha)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    $stmt->execute();

    echo "Usuário cadastrado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao inserir: " . $e->getMessage();
}
?>
