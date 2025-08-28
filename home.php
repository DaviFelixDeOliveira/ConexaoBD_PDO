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
</head>
<body class="p-4">

<h1>Bem-vindo!</h1>

<button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#usuariosModal">
  Mostrar Usuários
</button>

<div class="modal fade" id="usuariosModal" tabindex="-1" aria-labelledby="usuariosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="usuariosModalLabel">Usuários Cadastrados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          <?php foreach ($usuarios as $usuario): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <strong><?php echo ($usuario['nm_usuario'] . ' ' . $usuario['nm_sobrenome']); ?></strong><br>
                Email: <?php echo ($usuario['nm_email']); ?> | 
                Login: <?php echo ($usuario['nm_login']); ?> | 
                Telefone: <?php echo ($usuario['nr_fone']); ?>
              </div>
              <div>
                <button class="btn btn-sm btn-light me-1">Editar  <i class="fa-solid fa-pen"></i></button>
                <button class="btn btn-sm btn-danger">Excluir  <i class="fa-solid fa-trash"></i></button>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="modal-footer">
        <a href="cadastro.html" class="btn btn-success">Adicionar Usuário</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Card -->
<?php foreach ($usuarios as $usuario): ?>
<div class="card text-center col-sm-3">
  <div class="card-header"> 
    #1
  </div>
  <div class="card-body">
   

    <h5 class="card-title"><?php echo ($usuario['nm_usuario'] . ' ' . $usuario['nm_sobrenome']); ?></h5>
    <p class="card-text">

    </p>
    <p class="card-text"><b>Email:</b> <?php echo ($usuario['nm_email']); ?></p>
    <p class="card-text"> <b>Login: </b> <?php echo ($usuario['nm_login']); ?></p>
    <p class="card-text"> <b>Telefone: </b> <?php echo ($usuario['nr_fone']); ?></p>
    <p class="card-text"></p>
    <a href="#" class="btn btn-warning">Editar  <i class="fa-solid fa-pen"></i></button> </a>
    <a href="#" class="btn btn-danger">Excluir  <i class="fa-solid fa-trash   "></i></button>  </a>
  </div>
  <div class="card-footer text-body-secondary">
    2 days ago
  </div>
  <?php endforeach; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
