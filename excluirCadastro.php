<button onclick="window.history.back()">Voltar</button>

<?php
$nome = $_POST['nm_usuario'];
$senha = $_POST['nm_senha'];

include 'conecta.php';

$stmt = $conn->query("SELECT * FROM tb_usuario WHERE nm_usuario = '" . $nome . "' AND nm_senha = '" . $senha . "';");
$user = $stmt->fetch();

if (!$user) {
    echo "Usuário não encontrado!";
} else {
    // Exclui o usuário
    $delete = $conn->query("DELETE FROM tb_usuario WHERE nm_usuario = '" . $nome . "' AND nm_senha = '" . $senha . "';");
    if ($delete) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir o usuário!";
    }
}
?>
