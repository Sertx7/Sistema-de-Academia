<?php

class ConsultaDB {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getIdByURL(){
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
            $escaped_id = $this->conn->real_escape_string($id);

            return $escaped_id;
        } else {
            echo "A URL não contém um parâmetro 'id'.";
        }
    }

    public function getCondicaoEquipByURL(){
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
        if (isset($queryParams['condicao'])) {
            $condicao = $queryParams['condicao'];

            // Escapa o ID para evitar injeção de SQL
            $escaped_condicao = $this->conn->real_escape_string($condicao);

            return $escaped_condicao;
        } else {
            echo "A URL não contém um parâmetro 'condicao'.";
        }
    }

    function getAssinaturasDB(){
        $result = $this->conn->query("SELECT *
                                FROM tb_assinatura");

        $planos = array();
        if ($result->num_rows > 0){
            // Se houver pelo menos uma linha de resultado
            while($row = $result->fetch_assoc()) {
                $planos[$row['ID_ASSINATURA_PK']] = $row['Plano'];
            }
        } else {
            echo "Planos não encontrados!";
            $planos = null;
        }
        return $planos;
    }
}

class ConsultaAluno {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getDadosAluno($id){
        $result = $this->conn->query("SELECT tb_alunos.*, tb_assinatura.Plano
                                FROM tb_alunos
                                JOIN tb_assinatura
                                ON tb_alunos.Plano_Adesao = tb_assinatura.ID_ASSINATURA_PK
                                WHERE ID_usuarios_pk = '$id'");

        // Array com dados
        $dados = array();
        if ($result->num_rows > 0) {
            // Se houver pelo menos uma linha de resultado
            $row = $result->fetch_assoc();
            // Armazena os dados do aluno na matriz $dados
            $dados['ID'] = $row['ID_usuarios_pk'];
            $dados['Nome'] = $row['Nome'];
            $dados['Email'] = $row['Email'];
            $dados['Senha'] = $row['Senha'];
            $dados['CPF'] = $row['CPF'];
            $dados['Data-Nascimento'] = $row['Data_nascimento'];
            $dados['Idade'] = $row['Idade'];
            $dados['Telefone'] = $row['Telefone'];
            $dados['Endereco'] = $row['Endereco'];
            $dados['Assinatura'] = $row['Plano'];
            // Adicione outros campos conforme necessário
        } else {
            // Se não houver resultados, define $dados como nulo ou retorna uma mensagem de erro
            $dados = null;
            echo "Dados não encontrados!";
        }
        return $dados;
    }

    public function getDadosFuncionario($id){
        $result = $this->conn->query("SELECT tb_funcionarios.*
                                FROM tb_funcionarios
                                WHERE ID_funcionarios_pk = '$id'");

        // Array com dados
        $dados = array();
        if ($result->num_rows > 0) {
            // Se houver pelo menos uma linha de resultado
            $row = $result->fetch_assoc();
            // Armazena os dados do aluno na matriz $dados
            $dados['ID'] = $row['ID_funcionarios_pk'];
            $dados['Nome'] = $row['Nome'];
            $dados['Email'] = $row['Email'];
            $dados['Senha'] = $row['Senha'];
            $dados['CPF'] = $row['CPF'];
            $dados['Data-Nascimento'] = $row['Data_Nascimento'];
            $dados['Idade'] = $row['Idade'];
            $dados['Telefone'] = $row['Telefone'];
            $dados['Endereco'] = $row['Endereco'];
            $dados['Salario'] = $row['Salario'];
            $dados['Cargo'] = $row['Cargo'];
            // Adicione outros campos conforme necessário
        } else {
            // Se não houver resultados, define $dados como nulo ou retorna uma mensagem de erro
            $dados = null;
            echo "Dados não encontrados!";
        }
        return $dados;
    }
}

class ConsultaFuncionario {
    private $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getDadosFuncionario($id){
        $result = $this->conn->query("SELECT *
                                    FROM tb_funcionarios
                                    WHERE ID_funcioanrios_pk = '$id'");

        // Array com dados
        $dados = array();
        if ($result->num_rows > 0) {
            // Se houver pelo menos uma linha de resultado
            $row = $result->fetch_assoc();
            // Armazena os dados do aluno na matriz $dados
            $dados['Nome'] = $row['Nome'];
            $dados['Email'] = $row['Email'];
            $dados['Senha'] = $row['Senha'];
            $dados['CPF'] = $row['CPF'];
            $dados['RGM'] = $row['RGM'];
            $dados['Data-Nascimento'] = $row['Data_nascimento'];
            $dados['Idade'] = $row['Idade'];
            $dados['Telefone'] = $row['Telefone'];
            $dados['Endereco'] = $row['Endereco'];
            $dados['Salario'] = $row['Salario'];
            $dados['Cargo'] = $row['Cargo'];
            // Adicione outros campos conforme necessário
        } else {
            // Se não houver resultados, define $dados como nulo ou retorna uma mensagem de erro
            $dados = null;
            echo "Dados não encontrados!";
        }
        return $dados;
    }
}