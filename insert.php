<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include 'conecta.php';
    $nome = $_POST['nm_usuario']; //"davi";
    $sobrenome = $_POST['nm_sobrenome'];
    $email = $_POST['nm_email']; //"davi@gmail.com";
    $senha = $_POST['nm_senha']; //"1234" ;
    $login = $_POST['login'];
    $foto = "null";
    $numero = $_POST['nr_fone'];

    $sql = "insert into tb_usuario values (null, '$nome', '$sobrenome', '$email','$login', '$senha',  '$foto', '$numero')";
    if ($conn->query($sql)) {
        // echo "Registro inserido com sucesso!";

        // echo "Nome: ".$nome." <br> Sobrenome: ".$sobrenome."<br>  Email: ".$email." <br> Senha: ".$senha." <br> Login: ".$login." <br>   Foto: ".$foto."<br>  Número: ".$numero."" ;
    }
    ?>

    <button onclick="window.history.back()">Voltar</button>


    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
    <table>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Login</th>
            <th>Foto</th>
            <th>Número</th>
        <tr>
            <td><?php echo $nome; ?></td>
            <td><?php echo $sobrenome; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $senha; ?></td>
            <td><?php echo $login; ?></td>
            <td><?php echo $foto; ?></td>
            <td><?php echo $numero; ?></td>





        </tr>
        </tr>
    </table>





    <div class="containerLocalizar">
        <h1>Localizar Cadastro</h1>

        <form class="formLocalizar" action="localizarCadastro.php" method="post">
            <label for="nm_usuario">Nome:</label>
            <input type="text" name="nm_usuario" id="nm_usuario" required> <br>



            <label for="nm_senha">Senha:</label>
            <input type="password" name="nm_senha" id="nm_senha" required> <br>



            <input type="submit" value="Enviar">
        </form>
    </div>


    <div class="containerExcluir">
        <h1>Excluir Cadastro</h1>

        <form class="formExcluir" action="excluirCadastro.php" method="post">
            <label for="nm_usuario">Nome:</label>
            <input type="text" name="nm_usuario" id="nm_usuario" required> <br>



            <label for="nm_senha">Senha:</label>
            <input type="password" name="nm_senha" id="nm_senha" required> <br>



            <input type="submit" value="Enviar">
        </form>
    </div>



</body>

</html>