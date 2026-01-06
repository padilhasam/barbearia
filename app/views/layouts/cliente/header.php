<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Mensagens de erro ou sucesso
$erro = $_SESSION['login_erro'] ?? '';
unset($_SESSION['login_erro']);

$success = $_SESSION['register_success'] ?? '';
unset($_SESSION['register_success']);

// Verifica se a variável $cliente existe
$clienteNome = isset($cliente['nome']) ? htmlspecialchars($cliente['nome']) : 'Cliente';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cliente - Tonkelski Barber Shop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/card.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/sidebar.css">

    <!-- Favicon (opcional) -->
    <link rel="icon" href="<?= BASE_URL ?>/img/logo.png" type="image/png">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar Cliente -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
    <div class="container-fluid">
        <button id="sidebarCollapseBtn" class="btn d-flex align-items-center me-3">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCliente">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> <?= $clienteNome ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-light text-dark">
                        <li><a class="dropdown-item bg-light text-dark" href="<?= BASE_URL ?>/clientes/perfil">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item bg-light text-danger" href="<?= BASE_URL ?>/clientes/logout">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-flex flex-grow-1">
    <!-- Sidebar Cliente -->
    <nav id="sidebar" class="sidebar bg-dark">
        <div class="text-center py-3 border-bottom mb-3">
            <img src="<?= BASE_URL ?>/img/logo.png" alt="Logo Tonkelski" width="60" height="60" class="mb-2">
            <h6 class="text-white mb-0">Tonkelski Barber Shop</h6>
        </div>
        <ul class="nav flex-column pt-3">
            <li class="nav-item"><a href="<?= BASE_URL ?>/clientes/index" class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/clientes/agendamentos" class="nav-link"><i class="bi bi-calendar-event me-2"></i> Meus Agendamentos</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/clientes/perfil" class="nav-link"><i class="bi bi-person me-2"></i> Meu Perfil</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/clientes/logout" class="nav-link text-danger"><i class="bi bi-box-arrow-right me-2"></i> Sair</a></li>
        </ul>
    </nav>

    <!-- Conteúdo principal -->
    <main class="content flex-grow-1 p-4">

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
