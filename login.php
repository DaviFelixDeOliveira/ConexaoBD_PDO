 <?php
    include 'conecta.php';
    $nome = $_POST['nm_usuario']; //"davi";
    $senha = $_POST['nm_senha']; //"1234" ;


    select nm_usuario as Nome, nm_senha as Senha from tb_usuario
where nm_senha = "";

// $sql = "insert into tb_usuario values (null, '$nome', '$sobrenome', '$email','$login', '$senha',  '$numero', '$foto')";

$sql =  " select nm_usuario as Nome, nm_senha as Senha from tb_usuario
where nm_senha = '.$senha.'";

    if ($conn->query($sql)) {
        // echo "Registro inserido com sucesso!";

        // echo "Nome: ".$nome." <br> Sobrenome: ".$sobrenome."<br>  Email: ".$email." <br> Senha: ".$senha." <br> Login: ".$login." <br>   Foto: ".$foto."<br>  Número: ".$numero."" ;
    }
    ?>