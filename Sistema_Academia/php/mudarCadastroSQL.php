<?php
require_once 'connectionSQL.php';
require_once 'classQuerySQL.php';

session_start();

$conn = (new connectionDB())->conectaDB();

// Verifica se o formulário foi enviado
if(!empty($_POST)){
    $id = $_POST['ID'];
    if ($_POST['form-type'] === 'aluno') {
        sleep(2);
        atualizarCadastroAluno($conn, $id);
    } elseif ($_POST['form-type'] === 'funcionario') {
        sleep(2);
        atualizarCadastroFuncionario($conn, $id);
    }
}

function atualizarCadastroAluno($conn, $id){
    $camposAtualizar = array();
    // Itera sobre os dados do formulário
    foreach($_POST as $campo => $valor){
        // Verifica se o valor não está vazio e se o campo não é 'form-type'
        if (!empty($valor) && $campo !== 'form-type' && $campo !== 'ID'){
            // Adiciona o campo e o valor ao array de campos a serem atualizados
            $camposAtualizar[$campo] = $valor;
        }
    }

    // Verifica se há campos a serem atualizados
    if (!empty($camposAtualizar)) {
        // Constrói a string da query SQL para atualizar os campos
        $sql = "UPDATE tb_alunos SET ";
        $updates = array();
        foreach ($camposAtualizar as $campo => $valor) {
            $updates[] = "$campo = '$valor'";
        }
        $sql .= implode(", ", $updates);

        // Adiciona a cláusula WHERE para filtrar pelo ID
        $sql .= " WHERE ID_usuarios_pk = $id";

        // Execute a query SQL
        if ($conn->query($sql)) {
            $_SESSION['error'] = 'false';
            echo "aaaaaaaaa";
        } else {
            $_SESSION['error'] = 'true';
            echo "bbbbbb";
            echo $sql;
        }
    } else {
        $_SESSION['error'] = 'null';
        echo "ccccccc";
    }
    $_SESSION['id'] = $id;
    echo $id;

    // Redireciona de volta para a página
    header('Location: ../pages/mudarCadastroAluno.php' . '?error=' . $_SESSION['error'] . '&id=' . $_SESSION['id']);
    exit();
}

function atualizarCadastroFuncionario($conn, $id){
    $camposAtualizar = array();
    // Itera sobre os dados do formulário
    foreach($_POST as $campo => $valor){
        // Verifica se o valor não está vazio e se o campo não é 'form-type'
        if (!empty($valor) && $campo !== 'form-type' && $campo !== 'ID'){
            // Adiciona o campo e o valor ao array de campos a serem atualizados
            $camposAtualizar[$campo] = $valor;
        }
    }

    // Verifica se há campos a serem atualizados
    if (!empty($camposAtualizar)) {
        // Constrói a string da query SQL para atualizar os campos
        $sql = "UPDATE tb_funcionarios SET ";
        $updates = array();
        foreach ($camposAtualizar as $campo => $valor) {
            $updates[] = "$campo = '$valor'";
        }
        $sql .= implode(", ", $updates);

        // Adiciona a cláusula WHERE para filtrar pelo ID
        $sql .= " WHERE ID_funcionarios_pk = $id";

        // Execute a query SQL
        if ($conn->query($sql)) {
            $_SESSION['error'] = 'false';
            echo "aaaaaaaaa";
        } else {
            $_SESSION['error'] = 'true';
            echo "bbbbbb";
            echo $sql;
        }
    } else {
        $_SESSION['error'] = 'nothing';
        echo "ccccccc";
    }
    $_SESSION['id'] = $id;
    echo $id;

    // Redireciona de volta para a página
    header('Location: ../pages/mudarCadastroFuncionario.php' . '?error=' . $_SESSION['error'] . '&id=' . $_SESSION['id']);
    exit();
}

$conn->close();