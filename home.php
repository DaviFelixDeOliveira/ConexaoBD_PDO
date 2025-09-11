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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-4">

<h1>Bem-vindo!</h1>

<button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#cadastrarModal">
  Cadastrar Usuário
</button>

<!-- Modal cadastrar -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarModalLabel">Formulário de Cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">

        <form class="needs-validation" id="formCadastrar" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="fotoCadastrar" class="form-label">Foto (Opcional)</label>
            <input type="file" class="form-control" name="img_foto" id="fotoCadastrar">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="nomeCadastrar" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nomeCadastrar" name="nm_usuario" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sobrenomeCadastrar" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="sobrenomeCadastrar" name="nm_sobrenome" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="emailCadastrar" class="form-label">Email</label>
              <input type="email" class="form-control" id="emailCadastrar" name="nm_email" required>
              <small id="errorEmailCadastrar" class="text-danger"></small>
            </div>
            <div class="col-md-6 mb-3">
              <label for="loginCadastrar" class="form-label">Login</label>
              <input type="text" class="form-control" id="loginCadastrar" name="nm_login" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="numeroCadastrar" class="form-label">Número de telefone</label>
              <input type="tel" class="form-control" id="numeroCadastrar" name="nr_fone" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="senhaCadastrar" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senhaCadastrar" name="nm_senha" required>
              <small id="errorSenhaCadastrar" class="text-danger"></small>
            </div>
          </div>

          <div class="mb-3">
            <label for="senhaConfirmaCadastrar" class="form-label">Confirme a Senha</label>
            <input type="password" class="form-control" id="senhaConfirmaCadastrar" required>
            <small id="errorConfirmCadastrar" class="text-danger"></small>
          </div>

          <button class="btn btn-primary" id="btnSubmitCadastrar" value="Entrar" disabled type="submit">Cadastrar</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarModalLabel">Editar Cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">

        <form class="needs-validation" id="formEditar" enctype="multipart/form-data">
          <input type="hidden" id="idUsuario" name="cd_usuario">
          
          <div class="mb-3">
            <label for="fotoEditar" class="form-label">Foto (Opcional)</label>
            <input type="file" class="form-control" name="img_foto" id="fotoEditar">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="nomeEditar" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nomeEditar" name="nm_usuario" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sobrenomeEditar" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="sobrenomeEditar" name="nm_sobrenome" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="emailEditar" class="form-label">Email</label>
              <input type="email" class="form-control" id="emailEditar" name="nm_email" required>
              <small id="errorEmailEditar" class="text-danger"></small>
            </div>
            <div class="col-md-6 mb-3">
              <label for="loginEditar" class="form-label">Login</label>
              <input type="text" class="form-control" id="loginEditar" name="nm_login" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="telefoneEditar" class="form-label">Número de telefone</label>
              <input type="tel" class="form-control" id="telefoneEditar" name="nr_fone" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="senhaEditar" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senhaEditar" name="nm_senha" required>
              <small id="errorSenhaEditar" class="text-danger"></small>
            </div>
          </div>

          <div class="mb-3">
            <label for="senhaConfirmaEditar" class="form-label">Confirme a Senha</label>
            <input type="password" class="form-control" id="senhaConfirmaEditar" required>
            <small id="errorConfirmEditar" class="text-danger"></small>
          </div>

          <button class="btn btn-primary" id="btnSubmitEditar" type="submit">Editar</button>
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
          <a href="#" 
             class="btn btn-warning btn-editar" 
             data-bs-toggle="modal" 
             data-bs-target="#editarModal"
             data-id="<?php echo $usuario['cd_usuario']; ?>"
             data-nome="<?php echo htmlspecialchars($usuario['nm_usuario']); ?>"
             data-sobrenome="<?php echo htmlspecialchars($usuario['nm_sobrenome']); ?>"
             data-email="<?php echo htmlspecialchars($usuario['nm_email']); ?>"
             data-login="<?php echo htmlspecialchars($usuario['nm_login']); ?>"
             data-telefone="<?php echo htmlspecialchars($usuario['nr_fone']); ?>"
             data-senha="<?php echo htmlspecialchars($usuario['nr_senha']); ?>"
          >
            Editar <i class="fa-solid fa-pen"></i>
          </a>
          <a href="#" class="btn btn-danger">Excluir <i class="fa-solid fa-trash"></i></a>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
$(document).ready(function() {
  $('.btn-editar').click(function() {
    const id = $(this).data('id');
    const nome = $(this).data('nome');
    const sobrenome = $(this).data('sobrenome');
    const email = $(this).data('email');
    const login = $(this).data('login');
    const telefone = $(this).data('telefone');
    const senha = $(this).data('senha');

    $('#idUsuario').val(id);
    $('#nomeEditar').val(nome);
    $('#sobrenomeEditar').val(sobrenome);
    $('#emailEditar').val(email);
    $('#loginEditar').val(login);
    $('#telefoneEditar').val(telefone);
    $('#senhaEditar').val(senha);
    $('#senhaConfirmaEditar').val(senha);  
  });
});
</script>

<script src="script.js"></script>
</body>
</html>
