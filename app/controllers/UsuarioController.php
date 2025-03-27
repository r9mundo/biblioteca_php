<?php
require_once "app/models/Usuario.php";
require_once "config/database.php";

class UsuarioController {
    private $usuario;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->usuario = new Usuario($db);
    }

    public function cadastrarUsuario($nome, $email, $senha) {
        if ($this->usuario->criarUsuario($nome, $email, $senha)) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }

    public function buscarUsuarios($criterio) {
        return $this->usuario->buscarUsuarios($criterio);
    }
}
