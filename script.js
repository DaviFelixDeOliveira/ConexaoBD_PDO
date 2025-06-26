const form = document.querySelector(".form");
const submit = document.getElementById("btnSubmit");
const senha = document.getElementById("senha");
const senhaConfirmacao = document.getElementById("senhaConfirma");
// mensagem de erro senha, confirmação de senha e email, respecivamente
const errorMessage = document.querySelector(".input-control #error");
const errorMessageConfirm = document.querySelector(".input-control #errorConfirm");
const errorMessageEmail = document.querySelector(".input-control #errorEmail");

const frases = [
  "Preenchimento de senha é obrigatório.",
  "A Senha precisa de no mínimo 8 caracteres.",
  "A senha precisa de pelo menos uma letra minúscula e maiúscula.",
  "A senha precisa conter pelo menos 1 número.",
  "A senha precisa conter pelo menos 1 caracter especial (!@#$_%&*).",
  "Confirmação de senha é obrigatória.",
  "As senhas não conferem. Tente novamente.",
  "O Email não pode estar vazio.",
  "Insira um Email válido.",
  "Campo nome vazio.",
  "Campo Sobrenome vazio.",
  "Campo login vazio.",
  "Campo numero vazio.",
  "Inválido. Insira um número",
];

function checkSenha() {
  const valorSenha = senha.value;
  const valorSenhaConfirmacao = senhaConfirmacao.value;
  const email = document.querySelector("#email");
  const emailValue = email.value;

  const icon = /([!@#$%&*_])/;
  const number = /([0-9])/;
  const word = /([a-z].*[A-Z])|([A-Z].*[a-z])/;

  let mensagemErro = "";
  let mensagemErroEmail = "";
  let mensagemErroConfirm = "";

  // confirmações de senha

  if (valorSenha === "") {
    mensagemErro = frases[0];
  } else if (valorSenha.length < 8) {
    mensagemErro = frases[1];
  } else if (!valorSenha.match(word)) {
    mensagemErro = frases[2];
  } else if (!valorSenha.match(number)) {
    mensagemErro = frases[3];
  } else if (!valorSenha.match(icon)) {
    mensagemErro = frases[4];
  }
  if (valorSenhaConfirmacao === "") {
    mensagemErroConfirm = frases[5];
  } else if (valorSenhaConfirmacao !== valorSenha) {
    mensagemErroConfirm = frases[6];
  } else {
  }

  if (emailValue === "") {
    mensagemErroEmail = frases[7];
  } else if (!checkEmail(emailValue)) {
    mensagemErroEmail = frases[8];
  }

  errorMessage.innerHTML = mensagemErro;
  errorMessageConfirm.innerHTML = mensagemErroConfirm;
  errorMessageEmail.innerHTML = mensagemErroEmail;
  return mensagemErro === "";
}

function quandoInputModificado() {
  const senhaValida = checkSenha();
  submit.disabled = !senhaValida;
}

for (const input of form.querySelectorAll("input")) {
  input.addEventListener("keyup", quandoInputModificado);
}

quandoInputModificado();

function checkEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}
