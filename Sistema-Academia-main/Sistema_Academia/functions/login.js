document.getElementById('login-form').addEventListener('submit', function (event) {
    event.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Verifique se o email e a senha estão corretos
    if (email === 'c@gmail.com' && password === '123') {
        // Se estiverem corretos, redirecione para a página "index.html"
        window.location.href = 'index.html';
    } else {
        // Se estiverem incorretos, mostre uma mensagem de erro
        const erroLogin = document.getElementById('erro-login');
        erroLogin.style.display = 'block';
        erroLogin.innerText = 'Email ou Senha incorreto!';
        erroLogin.style.color = 'red';
    }
});

function logOut() {
    // Substitua a URL atual pela página de login
    window.location.href = 'login.html';

    // Adicione uma entrada ao histórico de sessão
    history.pushState(null, null, 'login.html');

    // Quando o usuário tenta voltar, atualize a página
    window.onpopstate = function (event) {
        history.go(1);
    };
}

window.history.forward();
function noBack() {
    window.history.forward();
}