function changeIframeSrc(src) {
    var iframe = document.getElementById('IframeListaUsuarios');
    iframe.classList.remove('show');
    setTimeout(function() {
        iframe.src = src;
        iframe.onload = function() {
            iframe.classList.add('show');
        };
    }, 500);
}

document.getElementById('AbrirCadastro').addEventListener('click', function() {
    changeIframeSrc('../iframes/cadastro.php');
    this.style.display = 'none';
    document.getElementById('FecharCadastro').style.display = 'block';
    document.getElementById('AbrirFuncionarios').style.display = 'none';
    document.getElementById('AbrirAlunos').style.display = 'none';
});

document.getElementById('FecharCadastro').addEventListener('click', function() {
    changeIframeSrc('../iframes/listaAlunos.php');
    this.style.display = 'none';
    document.getElementById('AbrirCadastro').style.display = 'block';
    document.getElementById('AbrirFuncionarios').style.display = 'block';
});

document.getElementById('AbrirFuncionarios').addEventListener('click', function() {
    changeIframeSrc('../iframes/listaFuncionarios.php');
    this.style.display = 'none';
    document.getElementById('AbrirAlunos').style.display = 'block';
});

document.getElementById('AbrirAlunos').addEventListener('click', function() {
    changeIframeSrc('../iframes/listaAlunos.php');
    this.style.display = 'none';
    document.getElementById('AbrirFuncionarios').style.display = 'block';
});