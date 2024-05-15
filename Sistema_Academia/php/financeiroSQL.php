<?php
require_once 'connectionSQL.php';

$conn = (new connectionDB())->conectaDB();

// Consulta SQL para obter os alunos
$sql = "SELECT tb_financeiro.*
        FROM tb_financeiro";


$data_atual = (new DateTime())->format('d/m/Y');


// Verifica se a query esta certa e possui resultados
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Exibe os dados dos alunos
    while($row = $result->fetch_assoc()) {
        echo '
        <section class="summary">
            <h2>Resumo Financeiro</h2>
            <div class="summary-item">
                <h3>Total do Mês</h3>
                <span class="amountMes">R$ '. number_format($row["Total_Mes"], 2, ',', '.') .'</span>
            </div>
            <div class="summary-item">
                <h3>Total do Ano</h3>
                <span class="amountAno">R$ '. number_format($row["Total_Mes"], 2, ',', '.') .'</span>
            </div>
        </sect>
        <section class="details">
            <h2>Detalhes Financeiros</h2>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>'. $data_atual .'</td>
                        <td>Receita mensal</td>
                        <td class="positive">R$ '. number_format($row["Subtotal_Planos"], 2, ',', '.') .'</td>
                    </tr>
                    <tr>
                        <td>'. $data_atual .'</td>
                        <td>Despesa com funcionários</td>
                        <td class="negative">R$ -'. number_format($row["Subtotal_Salarios"], 2, ',', '.') .'</td>
                    </tr>
                    <!-- Mais linhas conforme necessário -->
                </tbody>
            </table>
        </section>
        ';
        echo '
        </div>';
    }
} else {
    echo "Nenhum aluno encontrado.";
}

// Fecha a conexão
$conn->close();