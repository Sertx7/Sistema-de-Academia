<?php
require 'connectionSQL.php';

$conn = (new connectionDB())->conectaDB();

// Obtém a URL atual
$url = $_SERVER['REQUEST_URI'];

// Analisa a URL para obter os componentes
$parts = parse_url($url);

// Obtém os parâmetros da query string, se houver
$queryParams = [];
if (isset($parts['query'])) {
    parse_str($parts['query'], $queryParams);
}

// Verifica se existe um parâmetro 'id' na query string
if (isset($queryParams['id'])) {
    $id = $queryParams['id'];

    // Escapa o ID para evitar injeção de SQL
    $escaped_id = $conn->real_escape_string($id);

    // Query SQL para excluir o aluno
    $result = $conn->query("DELETE FROM tb_alunos WHERE ID_usuarios_pk = '$escaped_id'");

    // Verifica se a consulta foi bem-sucedida
    if ($result) {
        echo "Aluno excluído com sucesso.";
    } else {
        echo "Ocorreu um erro ao excluir o aluno.";
    }
} else {
    echo "A URL não contém um parâmetro 'id'.";
}

// Fecha conexão
$conn->close();
// Volta para a página
header('Location: ../pages/listaUsuarios.php');