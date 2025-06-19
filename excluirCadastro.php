    <button onclick="window.history.back()">Voltar</button>

<?php
 
$nome =  $_POST['nm_usuario'];
$senha =  $_POST['nm_senha'];
 
 
    include 'conecta.php';
 
    $user = $conn->query("DELETE  FROM tb_usuario  WHERE nm_usuario ='".$nome."' AND nm_senha = '".$senha."' ;")->fetch();
    if($user){

        
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    }else{
        echo'Usuário excluído com sucesso!';
    }
   
?>
 