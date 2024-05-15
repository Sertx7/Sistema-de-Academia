<?php
require 'connectionSQL.php';

// Consulta SQL para obter os alunos
$sql = "SELECT * FROM tb_alunos ORDER BY 'Nome' ASC";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Exibe os dados dos alunos
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Nome"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Senha"] . "</td>";
        echo "<td>" . $row["Data_nascimento"] . "</td>";
        echo "<td>" . $row["Idade"] . "</td>";
        echo "<td>" . $row["Telefone"] . "</td>";
        echo "<td>" . $row["Endereco"] . "</td>";
        echo "<td>" . $row["Plano_Adesao"] . "</td>";
        echo "<td><button>Mudar senha</button></td>";
        echo "<td><button>Alterar plano</button></td>";
        echo "</tr>";
    }
} else {
    echo "Nenhum aluno encontrado.";
}

// Fecha a conexão
$conn->close();
