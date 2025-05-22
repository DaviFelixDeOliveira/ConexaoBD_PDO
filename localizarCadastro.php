<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="localizarCadastro.php" method="post" >
        <label for="nm_usuario">Nome:</label>
        <input type="text" name="nm_usuario" id="nm_usuario"required > <br>
    
       
    
        <label for="nm_senha">Senha:</label>
        <input type="password" name="nm_senha" id="nm_senha" required> <br>
    
      
    
        <input type="submit" value="Enviar">
    </form>
    
    
</body>
</html>

<?php
 
$nome =  $_POST['nm_usuario'];
$senha =  $_POST['nm_senha'];
 
 
    include 'conecta.php';
 
    $user = $conn->query("SELECT * FROM tb_usuario  WHERE nm_usuario ='".$nome."' AND nm_senha = '".$senha."' ;")->fetch();
    if($user){
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }else{
        echo'usuario não encontrado';
    }
   
?>
 