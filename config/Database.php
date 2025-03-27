<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $nome_db = "Biblioteca";
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->usuario, $this->senha, $this->nome_db);
            if ($this->conn->connect_error) {
                throw new Exception("Falha na conexão: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
