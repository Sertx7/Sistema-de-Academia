<?php
require_once 'connectionSQL.php';

// Conexão com banco de dados
$conn = (new connectionDB())->conectaDB();

// Início sessão
session_start();

// Verifica se existe um REQUEST
if(!empty($_POST)){
    if ($_POST['form-type'] === 'aluno') {
        cadastrarAluno($conn);
    } elseif ($_POST['form-type'] === 'funcionario') {
        cadastrarFuncionario($conn);
    }
}

// Cadastro Aluno
function cadastrarAluno($conn){

    // ATRIBUTOS
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data-nascimento'];
    $data_nascimento_obj = new DateTime($data_nascimento);
    $dataAtual = new DateTime();
    $idade = $data_nascimento_obj->diff($dataAtual)->y;
    // Gera senha com base na data de nascimento
    $senha_inicial = date('dmY', strtotime($data_nascimento));
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Query CPF
    $selectCPF = $conn->query("SELECT * FROM tb_alunos WHERE CPF = '$cpf'");

    // Verificia se o CPF já existe
    if ($selectCPF->num_rows > 0) {
        $_SESSION['cpf_cadastrado'] = 'true';

    } else {
        // Query Cadastro Aluno
        $sql = $conn->query(
            "INSERT INTO tb_alunos(Nome, Email, Senha, CPF, Data_Nascimento, Idade, Telefone, Endereco, Plano_Adesao)
             VALUES ('$nome', '$email', '$senha_inicial', '$cpf', '$data_nascimento', $idade, '$telefone', '$endereco', '4')");
        
        // Verificia se cadastrou
        if ($sql){
            $_SESSION['cadastro_status'] = 'sucess';
        } else {
            $_SESSION['cadastro_status'] = 'error';
        }
        $_SESSION['cpf_cadastrado'] = 'false';
    }
}

// Cadastro Funcionário
function cadastrarFuncionario($conn){
    // ATRIBUTOS
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    // RGM de 8 digitos aleatório
    $rgm = rand(10000000, 99999999);
    // Data de nascimento e idade
    $data_nascimento = $_POST['data-nascimento'];
    $data_nascimento_obj = new DateTime($data_nascimento);
    $dataAtual = new DateTime();
    $idade = $data_nascimento_obj->diff($dataAtual)->y;
    // Gera senha com base na data de nascimento
    $senha_inicial = date('dmY', strtotime($data_nascimento));
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $salario = $_POST['salario'];
    $cargo = $_POST['cargo'];

    // Query CPF
    $selectCPF = $conn->query("SELECT * FROM tb_funcionarios WHERE CPF = '$cpf'");

    // Verificia se o CPF já existe
    if ($selectCPF->num_rows > 0) {
        $_SESSION['cpf_cadastrado'] = 'true';

    } else {
        // Query Cadastro Funionário
        $sql = $conn->query(
            "INSERT INTO `tb_funcionarios` (`Nome`, `Email`, `Senha`, `CPF`, `RGM`, `Data_Nascimento`, `Idade`, `Telefone`, `Endereco`, `Salario`, `Cargo`)
            VALUES ('$nome', '$email', '$senha_inicial', '$cpf', '$rgm', '$data_nascimento', $idade, '$telefone', '$endereco', $salario, '$cargo')");
        
        // Verificia se cadastrou
        var_dump($sql);
        if ($sql){
            $_SESSION['cadastro_status'] = 'sucess';
        } else {
            $_SESSION['cadastro_status'] = 'error';
        }
        $_SESSION['cpf_cadastrado'] = 'false';
    }
}

// Fecha conexão
$conn->close();
// Volta pra página
header('Location: ../iframes/cadastro.php?status=' . $_SESSION['cadastro_status'] . '&cpf_cadastrado=' . $_SESSION['cpf_cadastrado']);
exit;