<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Mensagem de erro
$erro = $_SESSION['register_erro'] ?? '';
unset($_SESSION['register_erro']);

$success = $_SESSION['register_success'] ?? '';
unset($_SESSION['register_success']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💈 Cadastro do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/barbearia/public/css/style.css">
    <link rel="stylesheet" href="/barbearia/public/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<main>
    <div class="login-container">

        <!-- Logo -->
        <div class="login-logo">
            <img src="/barbearia/public/img/logo.png" alt="Logo Tonkelski Barber Shop">
        </div>

        <!-- Card de cadastro -->
        <div class="card card-login">
            <h3 class="text-center mb-4">💈 Cadastro do Cliente</h3>

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

            <form method="POST" action="<?= BASE_URL ?>/clientes/register">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome" required>
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite seu telefone" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="btn btn-dark w-100">Cadastrar</button>
            </form>

            <p class="text-center mt-3">
                Já tem conta? <a href="<?= BASE_URL ?>/clientes/login">Faça login</a>
            </p>
        </div>
    </div>
</main>

<footer class="bg-dark text-light text-center py-3 mt-auto small">
    <div class="mb-2">&copy; <?= date('Y'); ?> Tonkelski Barber Shop - Todos os direitos reservados</div>
    <div class="d-flex justify-content-center gap-3">
        <a href="https://www.instagram.com/sua_barbearia" target="_blank" class="text-light fs-5"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/sua_barbearia" target="_blank" class="text-light fs-5"><i class="bi bi-facebook"></i></a>
        <a href="https://wa.me/5511999999999" target="_blank" class="text-light fs-5"><i class="bi bi-whatsapp"></i></a>
        <a href="https://www.tiktok.com/@sua_barbearia" target="_blank" class="text-light fs-5"><i class="bi bi-tiktok"></i></a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
