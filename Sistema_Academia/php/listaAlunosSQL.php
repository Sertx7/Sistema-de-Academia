<?php
require_once 'connectionSQL.php';

$conn = (new connectionDB())->conectaDB();

// Consulta SQL para obter os alunos
$sql = "SELECT tb_alunos.*, tb_assinatura.Plano
        FROM tb_alunos
        JOIN tb_assinatura ON tb_alunos.Plano_Adesao = tb_assinatura.ID_ASSINATURA_PK
        ORDER BY tb_alunos.Nome ASC";


// Verifica se a query esta certa e possui resultados
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '
        <div class="geral">

        <div class="superiorGeral">
            <h1 class="titulo">Alunos</h1>

            <div class="group">
                <input required="" type="text" class="input">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="pesquisar">Pesquisar</label>
            </div>
        </div>

        <div class="list">
    ';
    // Exibe os dados dos alunos
    while($row = $result->fetch_assoc()) {
        echo '
                <div class="usuario">

                    <div class="parteSuperior">
                    <h3 class="nome">'. $row["Nome"] .'</h3>
                    <i class="assinatura">'. $row["Plano"] .'</i>
                    </div>


                    <div class="parteInferior">
                    <div class="email">'. $row["Email"] .'</div>
                    <div class="idade">'. $row["Idade"] .' anos</div>
                    <div class="telefone">'. $row["Telefone"] .'</div>
                    <div class="endereco">'. $row["Endereco"] .'</div>
                    <div class="editar">
                        <svg style="cursor: pointer;" class="mudarAluno" data-id="'. $row["ID_usuarios_pk"] .'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg></td>
                    </div>
                    <div class="deletar">
                        <svg style="cursor: pointer;" class="excluirAluno" data-id="'. $row["ID_usuarios_pk"] .' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash-fill"
                        viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                        </svg>
                    </div>
                </div>
        ';
        echo '
        </div>';
    }
} else {
    echo "Nenhum aluno encontrado.";
}

// Fecha a conexão
$conn->close();
