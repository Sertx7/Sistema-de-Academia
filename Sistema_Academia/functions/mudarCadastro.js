// Verifica o status do cadastro assim que a página é carregada
// Função para obter parâmetros da URL
function obterParametroURL(nomeParametro) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.has(nomeParametro) ? urlParams.get(nomeParametro) : null;
}

document.addEventListener('DOMContentLoaded', function() {
    // Obter parâmetro 'status' da URL
    var atualizarCadastro = obterParametroURL('error');
    var id = obterParametroURL('id');

    // Exibir mensagem com base no status do cadastro
    if (atualizarCadastro === 'false') {
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "Cadastro Atualizado!";
            info.style.color = "green";
        });
    
    // CPF cadastrado
    } else if (atualizarCadastro === 'true'){
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "Cadastro não atualizado!";
            info.style.color = "red";
        });

    } else if (atualizarCadastro === 'nothing'){
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "Nada para atualizar!";
            info.style.color = "#F6BE00";
        });

    } else {
        document.querySelectorAll(".info-cadastro").forEach(info => {
            info.innerText = "";
        });
    }
});

// CPF/TELEFONE MASK
$(document).ready(function(){
	$('.mask-cpf').inputmask('999.999.999-99', { "placeholder": "___.___.___-__" });
});

$(document).ready(function(){
	$('.mask-fone').inputmask('(99) 99999-9999', { "placeholder": "(__) _____-____" });
});

$(document).ready(function(){
	$('.salario').inputmask('R$ 9.999,99', { "placeholder": "R$ _.___,__" });
});