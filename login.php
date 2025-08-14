<?php
session_start();
include 'conecta.php';

$nome = $_POST['nm_usuario'];
$sobrenome = $_POST['nm_sobrenome'];
$senha = $_POST['nm_senha'];
// $email = $_POST['nm_email']; //"davi@gmail.com";
// $login = $_POST['nm_login'];
// $numero = $_POST['nr_fone'];
// $foto = "null";

 "SELECT * FROM tb_usuario 
        WHERE nm_usuario = ? 
        AND nm_sobrenome = ? 
        AND nm_senha= ?";
        //  AND nm_email = ?
        //  AND nm_login = ?
        //  AND nr_fone = ?
        //  AND img_foto IS NULL";

$stmt = $conn->prepare($sql);
$stmt->execute([$nome, $sobrenome, $senha/*, $email, $login, $numero, $foto*/]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    $_SESSION['nm_usuario'] = $usuario['nm_usuario'];
    $_SESSION['nm_sobrenome'] = $usuario['nm_sobrenome'];
    $_SESSION['nm_senha'] = $usuario['nm_senha'];
    //   $_SESSION['nm_email'] = $usuario['nm_email'];
    //   $_SESSION['nm_login'] = $usuario['nm_login'];
    //   $_SESSION['nr_fone'] = $usuario['nr_fone'];
    echo "success";
} else {
    echo "error";
}
?>
