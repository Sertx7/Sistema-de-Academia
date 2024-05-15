// Adiciona um evento de clique para mudar o aluno
document.querySelectorAll('.mudarFuncionario').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        // Obtém o ID do aluno associado a este botão
        var idAluno = event.target.getAttribute("data-id");
        // Exibe um prompt de confirmação para o usuário de mudar o aluno
        if (confirm("Tem certeza que deseja modificar esse funcionario?")) {
            window.location.href = "../pages/mudarCadastroFuncionario.php?id=" + idAluno;
        }
    });
});

// Adiciona um evento de clique de excluir aluno
document.querySelectorAll('.excluirFuncionario').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        // Obtém o ID do aluno associado a este botão
        var idAluno = event.target.getAttribute("data-id");
        // Exibe um prompt de confirmação para o usuário antes de excluir o aluno
        if (confirm("Tem certeza que deseja excluir esse funcionario?")) {
            if (confirm("TEM CERTEZA MESMO?")){
                window.location.href = "../php/excluirFuncionario.php?id=" + idAluno;
            }
        }
    });
});