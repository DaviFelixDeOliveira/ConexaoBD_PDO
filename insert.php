<?php
include 'conecta.php';
$nome = $_POST['nm_usuario']; //"davi";
$email =  $_POST['nm_email']; //"davi@gmail.com";
$senha = $_POST['nm_senha']; //"1234" ;
$login = $_POST['login'];
$foto = "null";
$numero = $_POST['nr_fone'];

$sql = "insert into tb_usuario values (null, '$nome', '$email', '$senha', '$login', '$foto', '$numero')";
if ($conn->query($sql)) {
// echo "Registro inserido com sucesso!";

echo "Nome: ".$nome."<br> Email: ".$email." <br> Senha: ".$senha." <br> Login: ".$login." <br>   Foto: ".$foto."<br>  Número: ".$numero."" ;
} 
?>
