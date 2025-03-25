<?php
require_once "app/models/Livro.php";
require_once "config/database.php";

class LivroController {
    private $livro;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->livro = new Livro($db);
    }

    public function cadastrarLivro($titulo, $autor, $data_publicacao, $data_aquisicao, $genero, $sinopse) {
        if ($this->livro->cadastrarLivro($titulo, $autor, $data_publicacao, $data_aquisicao, $genero, $sinopse)) {
            echo "Livro cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar livro.";
        }
    }

    public function listarLivros($genero = "", $data = "") {
        return $this->livro->listarLivros($genero, $data);
    }
}
