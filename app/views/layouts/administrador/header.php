<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Tonkelski Barber Shop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/card.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/admin.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/admin-tables.css">

    <!-- Favicon (opcional) -->
    <link rel="icon" href="<?= BASE_URL ?>/img/logo.png" type="image/png">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar Admin -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
    <div class="container-fluid">
        <button id="sidebarCollapseBtn" class="btn d-flex align-items-center me-3">
            <i class="bi bi-list fs-4"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-light text-dark">
                        <li><a class="dropdown-item text-dark" href="<?= BASE_URL ?>/admin/perfil">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>/admin/logout">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Container principal: sidebar + conteúdo -->
<div class="d-flex flex-grow-1">
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar bg-dark">
        <div class="text-center py-3 border-bottom mb-3">
            <img src="<?= BASE_URL ?>/img/logo.png" alt="Logo Tonkelski" width="60" height="60" class="mb-2">
            <h6 class="text-white mb-0">Tonkelski Barber Shop</h6>
        </div>
        <ul class="nav flex-column pt-3">
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/admin/painel" class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/admin/painel') ? 'active' : '' ?>">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/admin/agendamentos" class="nav-link"><i class="bi bi-calendar-event me-2"></i> Agendamentos</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/admin/clientes" class="nav-link"><i class="bi bi-people me-2"></i> Clientes</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/admin/servicos" class="nav-link"><i class="bi bi-scissors me-2"></i> Serviços</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/admin/barbeiros" class="nav-link"><i class="bi bi-person-badge me-2"></i> Barbeiros</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/admin/usuarios" class="nav-link"><i class="bi bi-person-fill-lock me-2"></i> Usuários</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/admin/pagamentos" class="nav-link"><i class="bi bi-cash-stack me-2"></i> Pagamentos</a></li>
            <li class="nav-item"><a href="<?= BASE_URL ?>/admin/relatorios" class="nav-link"><i class="bi bi-bar-chart me-2"></i> Relatórios</a></li>
        </ul>
    </nav>
