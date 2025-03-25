<?php
require_once "config/database.php";

class Livro {
    private $conn;
    private $table_name = "livros";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrarLivro($titulo, $autor, $data_publicacao, $data_aquisicao, $genero, $sinopse) {
        $sql = "INSERT INTO " . $this->table_name . " (titulo, autor, data_publicacao, data_aquisicao, genero, sinopse) 
                VALUES (:titulo, :autor, :data_publicacao, :data_aquisicao, :genero, :sinopse)";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":autor", $autor);
        $stmt->bindParam(":data_publicacao", $data_publicacao);
        $stmt->bindParam(":data_aquisicao", $data_aquisicao);
        $stmt->bindParam(":genero", $genero);
        $stmt->bindParam(":sinopse", $sinopse);
        
        return $stmt->execute();
    }

    public function listarLivros($filtro_genero = "", $filtro_data = "") {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE 1=1";
        if (!empty($filtro_genero)) {
            $sql .= " AND genero = :genero";
        }
        if (!empty($filtro_data)) {
            $sql .= " AND data_publicacao = :data";
        }
        
        $stmt = $this->conn->prepare($sql);
        if (!empty($filtro_genero)) {
            $stmt->bindParam(":genero", $filtro_genero);
        }
        if (!empty($filtro_data)) {
            $stmt->bindParam(":data", $filtro_data);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
