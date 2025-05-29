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
    } else if (valorSenhaConfirmacao === "") {
        console.warn("Confirmação de senha é obrigatória.");
        return false;
    } else if (valorSenhaConfirmacao !== valorSenha) {
        console.warn("As senhas não conferem. Tente novamente.");
        return false;
    } else if (!/\d/.test(valorSenha)) {
        console.warn("A senha precisa conter pelo menos 1 número.");
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
