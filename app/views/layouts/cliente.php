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
    <title>Dashboard Cliente - Tonkelski Barber Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/barbearia/public/css/style.css">
    <link rel="stylesheet" href="/barbearia/public/css/card.css">
    <link rel="stylesheet" href="/barbearia/public/css/sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar Admin -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
    <div class="container-fluid">
        <!-- Botão único toggle da sidebar -->
        <button id="sidebarCollapseBtn" class="btn d-flex align-items-center me-3">
            <i class="bi bi-list"></i>
        </button>
        <!-- Navbar links (opcional dropdown do Admin) -->
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> <?= htmlspecialchars($cliente['nome']) ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-light text-dark">
                        <li><a class="dropdown-item text-dark" href="<?= BASE_URL ?>/clientes/perfil">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>/clientes/logout">Sair</a></li>
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
            <img src="/barbearia/public/img/logo.png" alt="Logo Tonkelski" width="60" height="60" class="mb-2">
            <h6 class="text-white mb-0">Tonkelski Barber Shop</h6>
        </div>
        <ul class="nav flex-column pt-3">
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/clientes/index" class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/clientes/agendamentos" class="nav-link"><i class="bi bi-calendar-event me-2"></i> Meus Agendamentos</a>
            </li>
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/clientes/perfil" class="nav-link"><i class="bi bi-person me-2"></i> Meu Perfil</a>
            </li>
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/clientes/logout" class="nav-link text-danger"><i class="bi bi-box-arrow-right me-2"></i> Sair</a>
            </li>
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

        <!-- Boas-vindas -->
        <div class="card card-welcome text-center mb-4 bg-light text-dark shadow-lg">
            <div class="mb-3 d-flex justify-content-center">
                <div class="rounded-circle d-inline-flex align-items-center justify-content-center" 
                    style="width:70px; height:70px; background-color:#f8f9fa;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#212529" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </div>
            </div>
            <h5 class="fw-bold mb-1">Olá, <?= htmlspecialchars($cliente['nome']) ?> 👋</h5>
            <p class="mb-0 small text-dark-50">
                Você tem <strong><?= count($agendamentos) ?> agendamentos</strong> e <strong>50 pontos</strong>.
            </p>
        </div>

        <!-- Próximo agendamento -->
        <div class="card card-proximo mb-4 text-center bg-dark text-light shadow-sm">
            <h6 class="fw-bold mb-2 text-danger">Próximo Agendamento</h6>
            <?php if($proximoAgendamento): ?>
                <p class="mb-1"><strong><?= $proximoAgendamento->data ?> às <?= $proximoAgendamento->hora ?></strong></p>
                <p class="mb-1"><i class="bi bi-scissors me-1"></i> <?= $proximoAgendamento->barbeiro_nome ?> | <?= $proximoAgendamento->servico_nome ?></p>
                <p class="mb-2"><i class="bi bi-geo-alt me-1"></i> <?= $proximoAgendamento->local ?? 'Unidade principal' ?></p>
                <a href="<?= BASE_URL ?>/clientes/agendamento" class="btn btn-outline-light btn-sm">Alterar / Cancelar</a>
            <?php else: ?>
                <p class="fst-italic mb-0">Nenhum agendamento próximo.</p>
            <?php endif; ?>
        </div>

        <!-- Meus agendamentos -->
        <div class="mb-4">
            <h6 class="fw-semibold mb-3"><i class="bi bi-calendar-event me-1"></i> Meus Agendamentos</h6>
            <?php if(!empty($agendamentos)): ?>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach($agendamentos as $a): ?>
                        <div class="col">
                            <div class="card card-agendamento h-100 shadow-sm bg-dark text-light">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="fw-bold"><?= $a->data ?> às <?= $a->hora ?></h6>
                                    <p class="mb-1"><i class="bi bi-scissors me-1"></i> <?= $a->barbeiro_nome ?> | <?= $a->servico_nome ?></p>
                                    <span class="badge <?= $a->status === 'Confirmado' ? 'badge-success' : 'badge-secondary' ?> mb-2"><?= $a->status ?></span>
                                    <div class="mt-auto d-flex justify-content-between">
                                        <?php if($a->status === 'Confirmado'): ?>
                                            <a href="#" class="btn btn-sm btn-outline-light">Remarcar</a>
                                            <a href="#" class="btn btn-sm btn-outline-danger">Cancelar</a>
                                        <?php endif; ?>
                                        <a href="#" class="btn btn-sm btn-outline-light">Detalhes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-white fst-italic">Você ainda não tem agendamentos.</p>
            <?php endif; ?>
        </div>

        <!-- Ações rápidas -->
        <div class="mb-4">
            <h6 class="fw-semibold mb-3"><i class="bi bi-lightning-fill me-1"></i> Ações rápidas</h6>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card card-primary h-100 text-center bg-dark text-light">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="fs-2 mb-2"><i class="bi bi-plus-circle"></i></div>
                            <h6 class="fw-bold mb-3">Novo Agendamento</h6>
                            <a href="<?= BASE_URL ?>/clientes/agendamento" class="btn btn-light btn-sm mt-auto">Agendar</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-success h-100 text-center bg-dark text-light">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="fs-2 mb-2"><i class="bi bi-credit-card-2-front"></i></div>
                            <h6 class="fw-bold mb-3">Meus Pagamentos</h6>
                            <a href="<?= BASE_URL ?>/clientes/pagamentos" class="btn btn-light btn-sm mt-auto">Ver histórico</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-dark h-100 text-center bg-dark text-light">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="fs-2 mb-2"><i class="bi bi-person"></i></div>
                            <h6 class="fw-bold mb-3">Meu Perfil</h6>
                            <a href="<?= BASE_URL ?>/clientes/perfil" class="btn btn-light btn-sm mt-auto">Acessar perfil</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-whatsapp h-100 text-center bg-dark text-light">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="fs-2 mb-2"><i class="bi bi-whatsapp"></i></div>
                            <h6 class="fw-bold mb-3">Agendar via WhatsApp</h6>
                            <a href="https://wa.me/5511999999999?text=Quero%20agendar%20um%20hor%C3%A1rio" target="_blank" class="btn btn-light btn-sm mt-auto">Agendar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>

<!-- Rodapé -->
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
<script src="/barbearia/public/js/sidebar.js"></script>
</body>
</html>
