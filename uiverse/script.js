const form = document.querySelector(".form");
const submit = document.getElementById("btnSubmit");
const senha = document.getElementById("senha");
const senhaConfirmacao = document.getElementById("senhaConfirma");

function checkSenha() {
    /**@type {string} */
    const valorSenha = senha.value;
    const valorSenhaConfirmacao = senhaConfirmacao.value;

    var icon = /([!@#$%&*_])/;
    var number = /([0-9])/;
    var word = /([a-z].*[A-Z])|([A-Z].*[a-z])/;
    if (valorSenha === "") {
        console.warn("Preenchimento de senha é obrigatório.");
        return false;
        submit.disabled = true;
    } else if (valorSenha.length < 8) {
        console.warn("A Senha precisa de no mínimo 8 caracteres.");
        return false;
    } else if (!valorSenha.match(word)) {
        console.warn("A senha precisa de pelo menos uma letra minúscula e maiúscula");
        return false;
        
    } else if (!valorSenha.match(number)) {
        console.warn("A senha precisa conter pelo menos 1 número.");
        return false;
    } else if (!valorSenha.match(icon)) {
        console.warn("A senha precisa conter pelo menos 1 caracter especial (!@#$_%&*).");
        return false;
    } else if (valorSenhaConfirmacao === "") {
        console.warn("Confirmação de senha é obrigatória.");
        return false;
    } else if (valorSenhaConfirmacao !== valorSenha) {
        console.warn("As senhas não conferem. Tente novamente.");
        return false;
    } else {
        return true;
    }
}



function quandoInputModificado() {
    const senhaValida = checkSenha();
    console.log(senhaValida);

    if (senhaValida) {
        submit.disabled = true;  // Botão DESABILITADO para envio (senha inválida)
    } else {
        submit.disabled = false;  // Botão HABILITADO para envio (senha válida)
    }
    
}

for (const input of form.querySelectorAll("input")) {
    input.addEventListener("keyup", () => quandoInputModificado());
}

quandoInputModificado();
