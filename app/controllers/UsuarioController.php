<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "Usuario.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "Database.php";  

class UsuarioController {
    private $db;

    public function __construct() {
        $this->db = new Database();  // Conexão com o banco de dados
    }

    public function cadastrarUsuario($nome, $email, $senha) {
        $conn = $this->db->getConnection(); // Obtém a conexão com o banco
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT); // Cria o hash da senha

        // Prepara a consulta SQL
        $sql = "INSERT INTO Usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senhaHash); // Bind de parâmetros

        // Executa a consulta
        if ($stmt->execute()) {
            return "Usuário cadastrado com sucesso!";
        } else {
            return "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }

    public function listarUsuarios() {
        $conn = $this->db->getConnection();
        $sql = "SELECT id, nome, email FROM Usuarios";
        $result = $conn->query($sql);

        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row; // Armazena os resultados em um array
        }
        return $usuarios;
    }
}
?>
