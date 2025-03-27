<?php
class Usuario {
    public $id;
    public $nome;
    public $email;
    public $senha;

    // Método para configurar os dados do usuário
    public function __construct($id, $nome, $email, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }
}
?>
