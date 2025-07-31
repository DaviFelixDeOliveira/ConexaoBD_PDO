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
   $(".teste").html(response);
         },
        error: function (response) {
          alert("Erro ao cadastrar usuário. Tente novamente.");
        },
      });
    }
  });

  quandoInputModificado();

 
});
