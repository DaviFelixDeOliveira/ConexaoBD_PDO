    <button onclick="window.history.back()">Voltar</button>

    <?php

    $nome =  $_POST['nm_usuario'];
    $senha =  $_POST['nm_senha'];


    include 'conecta.php';
//FAZER SELEC PARA VERIFICAR SE O CADASTRO EXISTE
    $user = $conn->query("DELETE  FROM tb_usuario  WHERE nm_usuario ='" . $nome . "' AND nm_senha = '" . $senha . "' ;")->fetch();
    if ($user) {

        echo "Usuário não encontrado!";
    } else {
        echo 'Usuário excluído com sucesso!';
    }

    ?>