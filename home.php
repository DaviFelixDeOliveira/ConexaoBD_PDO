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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body class="p-4">

<h1>Bem-vindo!</h1>

<!-- Botão abrir modal -->
<button type="button" class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#cadastrarModal">
  Cadastrar Usuário
</button>

<!-- MODAL -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarModalLabel">Formulário de Cadastro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">

        <!-- FORM PADRONIZADO -->
        <form class="needs-validation" id="form" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="foto" class="form-label">Foto (Opcional)</label>
            <input type="file" class="form-control" name="img_foto" id="foto">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nm_usuario" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="sobrenome" name="nm_sobrenome" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="nm_email" required>
              <small id="errorEmail" class="text-danger"></small>
            </div>
            <div class="col-md-6 mb-3">
              <label for="login" class="form-label">Login</label>
              <input type="text" class="form-control" id="login" name="nm_login" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="numero" class="form-label">Número de telefone</label>
              <input type="tel" class="form-control" id="numero" name="nr_fone" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha" name="nm_senha" required>
              <small id="error" class="text-danger"></small>
            </div>
          </div>

          <div class="mb-3">
            <label for="senhaConfirma" class="form-label">Confirme a Senha</label>
            <input type="password" class="form-control" id="senhaConfirma" required>
            <small id="errorConfirm" class="text-danger"></small>
          </div>

          <button class="btn btn-primary" id="btnSubmit" value="Entrar" disabled type="submit">Cadastrar</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- LISTAGEM DE USUÁRIOS -->
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

<!-- SCRIPT JS UNIFICADO -->
<script src="script.js"></script>

</body>
</html>
