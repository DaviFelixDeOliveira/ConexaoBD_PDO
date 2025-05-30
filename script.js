const form = document.getElementById("form");
const submit = document.getElementById("btnSubmit");
const senha = document.getElementById("senha");
const senhaConfirmacao = document.getElementById("confirmaSenha");

function checkSenha() {
    /**@type {string} */
    const valorSenha = senha.value;
    const valorSenhaConfirmacao = senhaConfirmacao.value;

    if (valorSenha === "") {
        console.warn("Preenchimento de senha é obrigatório.");
        return false;
    } else if (valorSenha.length < 8) {
        console.warn("A Senha precisa de no mínimo 8 caracteres.");
        return false;
    }else if (!valorSenha.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){
        console.warn("A senha precisa de pelo menos uma letra minúscula e maiúscula");

    } else if (valorSenhaConfirmacao === "") {
        console.warn("Confirmação de senha é obrigatória.");
        return false;
    } else if (valorSenhaConfirmacao !== valorSenha) {
        console.warn("As senhas não conferem. Tente novamente.");
        return false;
    } else if (!valorSenha.match(/([0-9])/)) {
        console.warn("A senha precisa conter pelo menos 1 número.");
        return false;
    } else if (!valorSenha.match(/([!@#$%&*_])/)) {
        console.warn("A senha precisa conter pelo menos 1 caracter especial (!@#$_%&*).");
        return false;
    } else {
        return true;
    }
}

function quandoInputModificado() {
    const senhaValida = checkSenha();
    console.log(senhaValida);

    const valido = senhaValida;
    if (valido) {
        submit.disabled = false;
    } else {
        submit.disabled = true;
    }
}

for (const input of form.querySelectorAll("input")) {
    input.addEventListener("keyup", () => quandoInputModificado());
}

quandoInputModificado();
