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

  <!-- Modal de Cadastro -->
  <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="needs-validation" id="form" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title">Formulário de Cadastro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="foto" class="form-label">Foto (Opcional)</label>
              <input type="file" class="form-control" name="img_foto" id="foto">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nm_usuario" id="nome" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" name="nm_sobrenome" id="sobrenome" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="nm_email" id="email" required>
                <small id="errorEmail" class="text-danger"></small>
              </div>
              <div class="col-md-6 mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" name="nm_login" id="login" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="numero" class="form-label">Telefone</label>
                <input type="tel" class="form-control" name="nr_fone" id="numero" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" name="nm_senha" id="senha" required>
                <small id="error" class="text-danger"></small>
              </div>
            </div>
            <div class="mb-3">
              <label for="senhaConfirma" class="form-label">Confirme a Senha</label>
              <input type="password" class="form-control" id="senhaConfirma" required>
              <small id="errorConfirm" class="text-danger"></small> 
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="btnSubmit" type="submit" disabled>Cadastrar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal de Edição -->
  <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form class="needs-validation" id="form" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title">Editar Cadastro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="idUsuario" name="cd_usuario">
            <div class="mb-3">
              <label for="fotoEditar" class="form-label">Foto (Opcional)</label>
              <input type="file" class="form-control" name="img_foto" id="fotoEditar">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nomeEditar" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nm_usuario" id="nomeEditar" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="sobrenomeEditar" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" name="nm_sobrenome" id="sobrenomeEditar" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="emailEditar" class="form-label">Email</label>
                <input type="email" class="form-control" name="nm_email" id="emailEditar" required>
                <small id="errorEmailEditar" class="text-danger"></small>
              </div>
              <div class="col-md-6 mb-3">
                <label for="loginEditar" class="form-label">Login</label>
                <input type="text" class="form-control" name="nm_login" id="loginEditar" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="telefoneEditar" class="form-label">Telefone</label>
                <input type="tel" class="form-control" name="nr_fone" id="telefoneEditar" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="senhaEditar" class="form-label">Senha</label>
                <input type="password" class="form-control" name="nr_senha" id="senhaEditar" required>
                <small id="errorSenhaEditar" class="text-danger"></small>
              </div>
            </div>
            <div class="mb-3">
              <label for="senhaConfirmaEditar" class="form-label">Confirme a Senha</label>
              <input type="password" class="form-control" id="senhaConfirmaEditar" required>
              <small id="errorConfirmEditar" class="text-danger"></small>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="btnSubmitEditar" disabled type="submit">Editar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Lista de usuários -->
  <div class="row mt-4">
    <?php foreach ($usuarios as $usuario): ?>
      <div class="col-sm-3 mb-3">
        <div class="card text-center">
          <div class="card-header text-danger">
            #<?php echo $usuario['cd_usuario']; ?>
          </div>
          <div class="card-body">
            <h5 class="card-title">
              <?php echo htmlspecialchars($usuario['nm_usuario'] . ' ' . $usuario['nm_sobrenome']); ?></h5>
            <p class="card-text"><b>Email:</b> <?php echo htmlspecialchars($usuario['nm_email']); ?></p>
            <p class="card-text"><b>Login:</b> <?php echo htmlspecialchars($usuario['nm_login']); ?></p>
            <p class="card-text"><b>Telefone:</b> <?php echo htmlspecialchars($usuario['nr_fone']); ?></p>
            <a href="#" class="btn btn-warning btn-editar mb-6 " data-bs-toggle="modal" data-bs-target="#editarModal" 
              data-id="<?php echo $usuario['cd_usuario']; ?>"
              data-nome="<?php echo htmlspecialchars($usuario['nm_usuario']); ?>"
              data-sobrenome="<?php echo htmlspecialchars($usuario['nm_sobrenome']); ?>"
              data-email="<?php echo htmlspecialchars($usuario['nm_email']); ?>"
              data-login="<?php echo htmlspecialchars($usuario['nm_login']); ?>"
              data-telefone="<?php echo htmlspecialchars($usuario['nr_fone']); ?>"
              data-senha="<?php echo htmlspecialchars($usuario['nm_senha']); ?>">
              <i class="fa-solid fa-pen me-1"></i> Editar
            </a>

<button class="btn btn-danger btn-excluir" 
        data-id="<?php echo $usuario['cd_usuario']; ?>"
        data-nome="<?php echo htmlspecialchars($usuario['nm_usuario']); ?>"
        data-senha="<?php echo htmlspecialchars($usuario['nm_senha']); ?>">
    <i class="fa-solid fa-trash"></i> Excluir
</button>

</div>



<!-- Modal de exclusão -->
<div class="modal fade" id="confirmarExcluirModal" tabindex="-1" aria-labelledby="confirmarExcluirModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formExcluir" method="POST" action="excluirCadastro.php">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Exclusão</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja excluir este usuário?</p>
          <input type="hidden" name="nm_usuario" id="excluirNome">
          <input type="hidden" name="nm_senha" id="excluirSenha">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Excluir</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

          <div class="card-footer text-muted">2 days ago</div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  
  <script>
    $(document).ready(function () {
      $('.btn-editar').click(function () {
        $('#idUsuario').val($(this).data('id'));
        $('#nomeEditar').val($(this).data('nome'));
        $('#sobrenomeEditar').val($(this).data('sobrenome'));
        $('#emailEditar').val($(this).data('email'));
        $('#loginEditar').val($(this).data('login'));
        $('#telefoneEditar').val($(this).data('telefone'));
        $('#senhaEditar').val($(this).data('senha'));
        $('#senhaConfirmaEditar').val($(this).data('senha'));
      });

      $('.btn-excluir').click(function() {
    const nome = $(this).data('nome');
    const senha = $(this).data('senha');

    $('#excluirNome').val(nome);
    $('#excluirSenha').val(senha);

    $('#confirmarExcluirModal').modal('show');
});

    });
  </script>

  <script src="script.js"></script>
</body>

</html>