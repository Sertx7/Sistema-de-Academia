<?php

class connectionDB {
    // nome do server
    private $servername = "localhost";
    // nome do usuário
    private $username = "root";
    // senha do server
    private $password = "";
    // nome do banco de dados
    private $database = "banco_teste";
    private $conn;

    public function __construct(){
        // Faz a conexão com o MySQL
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Verifica se a conexão foi feita
        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $this->conn->connect_error);
        }
    }

    public function conectaDB(){
        return $this->conn;
    }
}