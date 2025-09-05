<?php
session_start();
include 'conecta.php';

if (!isset($_SESSION['nm_usuario'])) {
    header("Location: index.html");
    exit;
}

$sql = "SELECT * FROM tb_usuario";
$stmt = $conn->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Tela Inicial</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-4">

<h1>Bem-vindo!</h1>

<button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#cadastrarModal">
  Cadastrar Usuário
</button>

<div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarModalLabel">Formulário de Cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation " id="form">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="">Nome</label>
              <input type="text" class="form-control" id="nome" name="nm_usuario" placeholder="Nome" >
              
             
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Sobrenome</label>
              <input type="text" class="form-control" id="sobrenome" name="nm_sobrenome" placeholder="Sobrenome" >
              
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="">Email</label>
              <input type="email" class="form-control" id="email" name="nm_email" placeholder="Email" >
             
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Login</label>
              <input type="text" class="form-control" id="login" name="nm_login" placeholder="Login" >
             
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="">Número de telefone</label>
              <input type="tel" class="form-control" id="numero" name="nr_fone" placeholder="Número de telefone" >
             
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Senha</label>
              <input type="password" class="form-control" id="senha" name="nm_senha" placeholder="Senha" >
              <small id="error"></small>
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="">Confirme a Senha</label>
              <input type="password" class="form-control" id="senhaConfirma" placeholder="Confirme a Senha" >
              <small id="errorConfirm"></small>
            </div>
          </div>

          <button  class="enviar btn btn-primary" id="btnSubmit" value="Entrar" disabled type="submit">Cadastrar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <?php foreach ($usuarios as $usuario): ?>
    <div class="col-sm-3 mb-3">
      <div class="card text-center">
        <div class="card-header" style="color: red;">
          #<?php echo ($usuario['cd_usuario']); ?>
        </div>
        <div class="card-body">
          <h5 class="card-title"><?php echo ($usuario['nm_usuario'] . ' ' . $usuario['nm_sobrenome']); ?></h5>
          <p class="card-text"><b>Email:</b> <?php echo ($usuario['nm_email']); ?></p>
          <p class="card-text"><b>Login:</b> <?php echo ($usuario['nm_login']); ?></p>
          <p class="card-text"><b>Telefone:</b> <?php echo ($usuario['nr_fone']); ?></p>
          <a href="#" class="btn btn-warning">Editar <i class="fa-solid fa-pen"></i></a>
          <a href="#" class="btn btn-danger">Excluir <i class="fa-solid fa-trash"></i></a>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script src="script.js"></script>

<!-- 
<script>
$(document).ready(function () {
  const form = $("#form");
  const submit = $("#btnSubmit");
  const senha = $("#senha");
  const senhaConfirmacao = $("#senhaConfirma");
  const errorMessage = $("#error");
  const errorMessageConfirm = $("#errorConfirm");
  const errorMessageEmail = $("#errorEmail");

  const frasesErro = [
    "Preenchimento de senha é obrigatório.",
    "A Senha precisa de no mínimo 8 caracteres.",
    "A senha precisa de pelo menos uma letra minúscula e maiúscula.",
    "A senha precisa conter pelo menos 1 caracter especial (!@#$_%&*).",
    "A senha precisa conter pelo menos 1 número.",
    "Confirmação de senha é obrigatória.",
    "As senhas não conferem. Tente novamente.",
    "O Email não pode estar vazio.",
    "Insira um Email válido.",
  ];

  function checkSenha() {
    const valorSenha = senha.val();
    const valorSenhaConfirmacao = senhaConfirmacao.val();
    const emailValue = $("#email").val();

    const caracter = /([!@#$%&*_])/;
    const numero = /([0-9])/;
    const LetraContem = /([a-z].*[A-Z])|([A-Z].*[a-z])/;

    let mensagemErro = "";
    let mensagemErroEmail = "";
    let mensagemErroConfirm = "";

    if (valorSenha === "") {
      mensagemErro = frasesErro[0];
    } else if (valorSenha.length < 8) {
      mensagemErro = frasesErro[1];
    } else if (!valorSenha.match(LetraContem)) {
      mensagemErro = frasesErro[2];
    } else if (!valorSenha.match(numero)) {
      mensagemErro = frasesErro[4];
    } else if (!valorSenha.match(caracter)) {
      mensagemErro = frasesErro[3];
    }

    if (valorSenhaConfirmacao === "") {
      mensagemErroConfirm = frasesErro[5];
    } else if (valorSenhaConfirmacao !== valorSenha) {
      mensagemErroConfirm = frasesErro[6];
    }

    if (emailValue === "") {
      mensagemErroEmail = frasesErro[7];
    } 

    errorMessage.text(mensagemErro);
    errorMessageConfirm.text(mensagemErroConfirm);
    errorMessageEmail.text(mensagemErroEmail);

    return (
      mensagemErro === "" &&
      mensagemErroConfirm === "" &&
      mensagemErroEmail === ""
    );
  }

  function quandoInputModificado() {
    const valido = checkSenha();
    submit.prop("disabled", !valido);
  }

  form.on("keyup", "input", quandoInputModificado);

  form.on("submit", function (event) {
    event.preventDefault();

    if (checkSenha()) {
      let user = $("#nome").val();
      let sobrenome = $("#sobrenome").val();
      let senha = $("#senha").val();
      let login = $("#login").val();
      let email = $("#email").val();
      let fone = $("#numero").val();

        $.ajax({
          type: "POST",
          url: "insert.php",
        data: {
          nm_usuario: user,
          nm_sobrenome: sobrenome,
          nm_senha: senha,
          nm_login: login,
          nm_email: email,
          nr_fone: fone,
        },
        dataType: "html",
         success: function (response) {
           alert("Usuário Cadastrado com sucesso!.");
         },
        error: function (response) {
          alert("Erro ao cadastrar usuário. Tente novamente.");
        },
      });
    }
  });

  quandoInputModificado();

 
});

</script> -->

</body>
</html>
