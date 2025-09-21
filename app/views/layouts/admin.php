<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Tonkelski Barber Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/barbearia/public/css/style.css">
    <link rel="stylesheet" href="/barbearia/public/css/card.css">
    <link rel="stylesheet" href="/barbearia/public/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <img src="/barbearia/public/img/logo.png" alt="Logo Tonkelski" width="60" height="60" class="me-2">
                Tonkelski Barber Shop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-light text-dark">
                            <li><a class="dropdown-item text-dark" href="#">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
        <a href="#"><i class="bi bi-people me-2"></i> Clientes</a>
        <a href="#"><i class="bi bi-calendar-event me-2"></i> Agendamentos</a>
        <a href="#"><i class="bi bi-scissors me-2"></i> Serviços</a>
        <a href="#"><i class="bi bi-person-badge me-2"></i> Funcionários</a>
        <a href="#"><i class="bi bi-bar-chart me-2"></i> Relatórios</a>
    </div>

    <!-- Conteúdo principal -->
    <div class="content">
        <h3 class="mb-4">Dashboard</h3>

        <!-- Cards resumo -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card-admin">
                    <div class="fs-2 mb-2"><i class="bi bi-people-fill"></i></div>
                    <h6>Total de Clientes</h6>
                    <p class="mb-0">120</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-admin">
                    <div class="fs-2 mb-2"><i class="bi bi-calendar-event-fill"></i></div>
                    <h6>Agendamentos Hoje</h6>
                    <p class="mb-0">15</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-admin">
                    <div class="fs-2 mb-2"><i class="bi bi-scissors"></i></div>
                    <h6>Serviços Ativos</h6>
                    <p class="mb-0">8</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-admin">
                    <div class="fs-2 mb-2"><i class="bi bi-cash-stack"></i></div>
                    <h6>Receita Hoje</h6>
                    <p class="mb-0">R$ 1.250,00</p>
                </div>
            </div>
        </div>

        <!-- Tabela de Agendamentos -->
        <div class="card card-agendamento mb-4 bg-dark text-light">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Próximos Agendamentos</h6>
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Cliente</th>
                                <th>Serviço</th>
                                <th>Barbeiro</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>21/09/2025</td>
                                <td>14:00</td>
                                <td>Jeferson</td>
                                <td>Corte Masculino</td>
                                <td>Paulo</td>
                                <td><span class="badge bg-danger">Confirmado</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-light">Editar</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">Cancelar</a>
                                </td>
                            </tr>
                            <!-- Mais linhas dinamicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
</body>
</html>
