<?php
include 'conecta.php';
$nome = $_POST['nm_usuario']; //"davi";
$email =  $_POST['nm_email']; //"davi@gmail.com";
$senha = $_POST['nm_senha']; //"1234" ;
$foto = "null";
$numero = $_POST['nr_fone'];

$sql = "insert into tb_usuario values (null, '$nome', '$email', '$senha', '$foto', '$numero')";
if ($conn->query($sql)) {
// echo "Registro inserido com sucesso!";

echo "Nome: ".$nome."<br> Email: ".$email." <br> Senha: ".$senha." <br> Foto: ".$foto."<br>  Número: ".$numero."" ;
} 
?>
