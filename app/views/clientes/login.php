<?php
    if (session_status() === PHP_SESSION_NONE) session_start();

    // Mensagem de erro
    $erro = $_SESSION['login_erro'] ?? '';
    unset($_SESSION['login_erro']);

    $success = $_SESSION['register_success'] ?? '';
    unset($_SESSION['register_success']);
    ?>

    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>💈 Login do Cliente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="bg-light d-flex flex-column min-vh-100">

    <main class="container d-flex justify-content-center align-items-center flex-grow-1" style="min-height: 80vh;">
        <div class="w-100" style="max-width: 400px;">
            <?php if($success): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $success ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            <?php endif; ?>

            <?php if($erro): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $erro ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            <?php endif; ?>

            <div class="card p-4 shadow-sm">
                <h3 class="text-center mb-3">💈 Login do Cliente</h3>
                <form method="POST" action="<?= BASE_URL ?>/clientes/login">
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
                    Não tem conta? <a href="<?= BASE_URL ?>/clientes/register">Cadastre-se</a>
                </p>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <small>&copy; <?= date('Y'); ?> Minha Barbearia - Todos os direitos reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
