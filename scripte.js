const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const endereco = document.getElementById('endereco');
const cidade = document.getElementById('cidade');
const sobrenome = document.getElementById('sobrenome');
const senha = document.getElementById('senha');
const senhaconfirmada = document.getElementById('senhaconfirmada');

form.addEventListener("submit",(Event) =>{
   Event.preventDefault();
   checkInputs();
})



function checkInputs() {
    const usernameValue = username.value; //
    const emailValue = email.value;//
    const enderecoValue = endereco.value; //
    const cidadeValue = cidade.value; //
    const sobrenomeValue = sobrenome.value;
    const senhaValue = senha.value;//
    const senhaconfirmadaValue = senhaconfirmada.value;

    if(usernameValue === ''){
    setErrorFor(username, 'o nome de usuário é obrigatório!');
    }
    else{
    setSucessFor(username);
    }
    if(enderecoValue === ''){
        setErrorFor(endereco, 'o endereço é obrigatório!');
    }
    else{
    setSucessFor(endereco);
            
    }
    if(cidadeValue === ''){
        setErrorFor(cidade, 'o nome da cidade é obrigatório!');
    }
    else{
    setSucessFor(cidade);
            
    }
    if(sobrenomeValue === ''){
        setErrorFor(sobrenome, 'o seu sobrenome é obrigatório!');
    }
    else{
    setSucessFor(sobrenome);
            
    }




if(emailValue === '') {
    setErrorFor(email, 'o email é obrigatório!')
}
 else if (!checkEmail(emailValue)) {

    setErrorFor(email, "insira um email válido.");
}
 else{

    setSucessFor(email)
}

if(senhaValue === ''){
    setErrorFor(senha, "a senha é obrigatória");

}
else if (senhaValue.length < 7) {

    setErrorFor(senha, "a senha precisa de no mínimo 7 caracteres!");
}
else {
    setSucessFor(senha);
}
if (senhaconfirmadaValue ===''){
    setErrorFor(senhaconfirmada, " a confirmação de senha é obrigatória!");

}
else if (senhaconfirmadaValue != senhaValue) {

    setErrorFor(senhaconfirmada, " as senhas não conferem. Tente novamente!");
    setErrorFor(senha, " as senhas não conferem. Tente novamente");
}
else{
    setSucessFor(senhaconfirmada);
}

if (formIsValid) {
    console.log("O formulário está 100% válido!");
  }

} 



function setErrorFor(input, message) {
    const formControl =  input.parentElement;
    const small = formControl.querySelector('small');

    //adicionar  a mensagem de erro 

    // adicionar a classe de erro
    small.innerText = message;
    formControl.className = "form-control error";





}




function  setSucessFor (input) {
    const formControl = input.parentElement;
    //adicionar a classe de sucesso
    formControl.className = "form-control sucess";
}

function checkEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
      email
    );
  }







  //////////

  let campoSenha = document.querySelector('.password'); // Seleciona o campo de senha
  let barraProgresso = document.querySelector('.progress .bar'); // Seleciona a barra de progresso
   
  // Adiciona o evento de tecla solta para atualizar a força da senha
  campoSenha.addEventListener('keyup', () => {
      let forca = 0; // Inicializa a força da senha
   
      // Verifica se tem pelo menos uma letra maiúscula e uma minúscula
      forca += verificarRegra(
          '.low-upper-case',
          campoSenha.value.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)
      );
   
      // Verifica se tem pelo menos um número
      forca += verificarRegra(
          '.one-number',
          campoSenha.value.match(/([0-9])/)
      );
   
      // Verifica se tem pelo menos um caractere especial (!@#$%&*_)
      forca += verificarRegra(
          '.one-special-char',
          campoSenha.value.match(/([!@#$%&*_])/)
      );
   
      // Verifica se a senha tem pelo menos 6 caracteres
      forca += verificarRegra(
          '.min-char',
          campoSenha.value.length >= 6
      );
   
      // Calcula a porcentagem de força (0 a 100%)
      let porcentagem = Math.floor((forca / 4) * 100);
  barraProgresso.style.width = `${porcentagem}%`; // Atualiza a largura da barra
   
      
      if (porcentagem === 100) {
    //   in progress    
      }
  });
   
  // Função para atualizar o status visual de cada regra
  function verificarRegra(classeRegra, valido) {
      let areaRegra = document.querySelector(classeRegra);
      areaRegra.querySelector('.valid-point')
          .style.backgroundColor = valido ? 'green' : 'red';
      return valido ? 1 : 0;
  }