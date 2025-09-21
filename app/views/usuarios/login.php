<?php
// Se tiver sessão, podemos validar cliente logado aqui
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Exibir mensagem de erro, se houver
$erro = $_SESSION['login_erro'] ?? '';
unset($_SESSION['login_erro']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Minha Barbearia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<main class="container d-flex justify-content-center align-items-center flex-grow-1" style="min-height: 80vh;">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-3">Login Cliente</h3>

        <?php if ($erro): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
        <?php endif; ?>

        <form method="POST" action="/usuarios/login">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>

        <p class="text-center mt-3">
            Não tem conta? <a href="/usuarios/register">Cadastre-se</a>
        </p>
    </div>
</main>

<footer class="bg-dark text-white text-center py-3 mt-auto">
    <small>&copy; <?= date('Y'); ?> Minha Barbearia - Todos os direitos reservados</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>