<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Contato</h1>
        <nav>
            <ul>
                <li><a href="Index.php">Home</a></li>
                <li><a href="Sobre.php">Sobre</a></li>
                <li><a href="Catalogo.php">Catálogo</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p>Entre em contato conosco preenchendo o formulário abaixo:</p>
        <form method="POST">
            <input type="text" name="nome" placeholder="Seu Nome" required>
            <input type="email" name="email" placeholder="Seu Email" required>
            <textarea name="mensagem" placeholder="Sua Mensagem" required></textarea>
            <button type="submit">Enviar</button>
        </form>
        <p>Nos siga nas redes sociais:</p>
        <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Twitter</a></li>
        </ul>
    </main>
</body>
</html>
