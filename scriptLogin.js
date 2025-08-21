$("#form").on("submit", function(event) {
  event.preventDefault();
  let user = $("#nome").val();
  let sobrenome = $("#sobrenome").val();
  let senha = $("#senha").val();

  $.ajax({
    type: "POST",
    url: "login.php",
    data: {
      nm_usuario: user,
      nm_sobrenome: sobrenome,
      nm_senha: senha
    },
    success: function(response) {
      if (response.trim() === "success") {
        window.location.href = "home.php";
      } else {
        alert("Dados inseridos estão incorretos.");
      }
    },
    error: function() {
      alert("Erro. Tente novamente.");
    }
  });
});
