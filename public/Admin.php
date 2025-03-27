<?php
$basePath = dirname(__DIR__); // Caminho base para buscar os arquivos

require_once "$basePath/app/controllers/UsuarioController.php";
require_once "$basePath/app/controllers/LivroController.php";

$usuarioController = new UsuarioController();
$livroController = new LivroController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
        echo $usuarioController->cadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
    }
    if (isset($_POST['titulo'], $_POST['autor'], $_POST['data_publicacao'], $_POST['data_aquisicao'], $_POST['genero'], $_POST['sinopse'])) {
        echo $livroController->cadastrarLivro($_POST['titulo'], $_POST['autor'], $_POST['data_publicacao'], $_POST['data_aquisicao'], $_POST['genero'], $_POST['sinopse']);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Painel Administrativo</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Cadastrar Usuário</h2>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>

        <h2>Cadastrar Livro</h2>
        <form method="POST">
            <input type="text" name="titulo" placeholder="Título" required>
            <input type="text" name="autor" placeholder="Autor" required>
            <input type="date" name="data_publicacao" required>
            <input type="date" name="data_aquisicao" required>
            <input type="text" name="genero" placeholder="Gênero" required>
            <textarea name="sinopse" placeholder="Sinopse" required></textarea>
            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>
