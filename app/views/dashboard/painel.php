<!-- app/views/dashboard/painel.php -->

<div class="container">
    <!-- Cabeçalho do Dashboard -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Dashboard Administrativo</h3>
            <p class=" mb-0">Bem-vindo, <?= $_SESSION['usuario_nome'] ?? 'Administrador' ?>! 
                <span class="badge bg-primary"><?= date('d/m/Y') ?></span>
            </p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary" id="refreshDashboard">
                <i class="bi bi-arrow-clockwise"></i> Atualizar
            </button>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-calendar"></i> Hoje
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Hoje</a></li>
                    <li><a class="dropdown-item" href="#">Ontem</a></li>
                    <li><a class="dropdown-item" href="#">Esta Semana</a></li>
                    <li><a class="dropdown-item" href="#">Este Mês</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Personalizado</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Cards de Métricas -->
    <div class="row g-3 mb-4">
        <!-- Total de Clientes -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Total de Clientes</h6>
                            <h3 class="mb-0"><?= $totalClientes ?? 0 ?></h3>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> 12% este mês
                            </small>
                        </div>
                        <div class="icon-card bg-primary bg-opacity-10">
                            <i class="bi bi-people-fill text-primary fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agendamentos Hoje -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Agendamentos Hoje</h6>
                            <h3 class="mb-0"><?= $agendamentosHoje ?? 0 ?></h3>
                            <small class="text-warning">
                                <?= $agendamentosPendentes ?? 0 ?> pendentes
                            </small>
                        </div>
                        <div class="icon-card bg-success bg-opacity-10">
                            <i class="bi bi-calendar-event-fill text-success fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Serviços Ativos -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Serviços Ativos</h6>
                            <h3 class="mb-0"><?= $servicosAtivos ?? 0 ?></h3>
                            <small class="text-info">+3 novos este mês</small>
                        </div>
                        <div class="icon-card bg-warning bg-opacity-10">
                            <i class="bi bi-scissors text-warning fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Receita Hoje -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Receita Hoje</h6>
                            <h3 class="mb-0">R$ <?= number_format($receitaHoje ?? 0, 2, ',', '.') ?></h3>
                            <small class="text-danger">
                                <i class="bi bi-arrow-down"></i> 5% vs ontem
                            </small>
                        </div>
                        <div class="icon-card bg-info bg-opacity-10">
                            <i class="bi bi-cash-stack text-info fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Segunda Linha de Métricas -->
    <div class="row g-3 mb-4">
        <!-- Barbeiros Ativos -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Barbeiros Ativos</h6>
                            <h3 class="mb-0"><?= $barbeirosAtivos ?? 5 ?></h3>
                            <small class="text-success">Todos disponíveis</small>
                        </div>
                        <div class="icon-card bg-danger bg-opacity-10">
                            <i class="bi bi-person-badge text-danger fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Taxa de Ocupação -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-purple">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Taxa de Ocupação</h6>
                            <h3 class="mb-0"><?= $taxaOcupacao ?? 85 ?>%</h3>
                            <div class="progress mt-2" style="height: 5px;">
                                <div class="progress-bar bg-purple" style="width: <?= $taxaOcupacao ?? 85 ?>%"></div>
                            </div>
                        </div>
                        <div class="icon-card bg-purple bg-opacity-10">
                            <i class="bi bi-graph-up text-purple fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Médio -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-teal">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Ticket Médio</h6>
                            <h3 class="mb-0">R$ <?= number_format($ticketMedio ?? 65.50, 2, ',', '.') ?></h3>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> 8% este mês
                            </small>
                        </div>
                        <div class="icon-card bg-teal bg-opacity-10">
                            <i class="bi bi-cart-check text-teal fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Satisfação -->
        <div class="col-xl-3 col-md-6">
            <div class="card-admin card-hover border-start border-4 border-orange">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Satisfação</h6>
                            <h3 class="mb-0"><?= $satisfacao ?? 4.8 ?>/5</h3>
                            <div class="text-warning">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <i class="bi bi-star<?= $i <= floor($satisfacao ?? 4.8) ? '-fill' : ($i <= ($satisfacao ?? 4.8) ? '-half' : '') ?>"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="icon-card bg-orange bg-opacity-10">
                            <i class="bi bi-star-fill text-orange fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <div class="row g-4">
        <!-- Coluna da Esquerda - Tabela de Agendamentos -->
        <div class="col-lg-8">
            <div class="card-admin">
                <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-calendar-week me-2"></i>Próximos Agendamentos
                    </h5>
                    <a href="/admin/agendamentos" class="btn btn-sm btn-outline-light">
                        Ver Todos <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Data/Hora</th>
                                    <th>Cliente</th>
                                    <th>Serviço</th>
                                    <th>Barbeiro</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($agendamentos)): ?>
                                    <?php foreach ($agendamentos as $agendamento): ?>
                                        <tr class="<?= $agendamento['status'] == 'Confirmado' ? 'table-success' : ($agendamento['status'] == 'Cancelado' ? 'table-danger' : '') ?>">
                                            <td>
                                                <div class="fw-semibold"><?= $agendamento['data'] ?></div>
                                                <small class=""><?= $agendamento['hora'] ?></small>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-semibold"><?= $agendamento['cliente_nome'] ?></div>
                                                        <small class="">#<?= $agendamento['cliente_id'] ?? '001' ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge bg-secondary bg-opacity-25 text-secondary">
                                                    <?= $agendamento['servico_nome'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <i class="bi bi-person-badge"></i>
                                                    </div>
                                                    <span><?= $agendamento['barbeiro_nome'] ?></span>
                                                </div>
                                            </td>
                                            <td class="fw-semibold">
                                                R$ <?= number_format($agendamento['valor'] ?? 0, 2, ',', '.') ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $statusConfig = [
                                                        'Confirmado' => ['class' => 'bg-success', 'icon' => 'bi-check-circle'],
                                                        'Pendente' => ['class' => 'bg-warning', 'icon' => 'bi-clock'],
                                                        'Cancelado' => ['class' => 'bg-danger', 'icon' => 'bi-x-circle'],
                                                        'Realizado' => ['class' => 'bg-info', 'icon' => 'bi-check2-all'],
                                                        'Agendado' => ['class' => 'bg-secondary', 'icon' => 'bi-calendar-check']
                                                    ];
                                                    $statusInfo = $statusConfig[$agendamento['status']] ?? $statusConfig['Agendado'];
                                                ?>
                                                <span class="badge <?= $statusInfo['class'] ?>">
                                                    <i class="bi <?= $statusInfo['icon'] ?> me-1"></i><?= $agendamento['status'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="/admin/agendamentos/detalhes/<?= $agendamento['id'] ?>" 
                                                       class="btn btn-outline-primary" 
                                                       title="Detalhes">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="/admin/agendamentos/editar/<?= $agendamento['id'] ?>" 
                                                       class="btn btn-outline-warning" 
                                                       title="Editar">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="/admin/agendamentos/excluir/<?= $agendamento['id'] ?>" 
                                                       class="btn btn-outline-danger" 
                                                       title="Cancelar"
                                                       onclick="return confirm('Tem certeza que deseja cancelar este agendamento?')">
                                                        <i class="bi bi-x-circle"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="bi bi-calendar-x display-6  mb-3"></i>
                                            <p class=" mb-0">Nenhum agendamento para hoje</p>
                                            <a href="/admin/agendamentos/novo" class="btn btn-sm btn-primary mt-2">
                                                <i class="bi bi-plus-circle me-1"></i> Criar Agendamento
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-dark">
                    <div class="row">
                        <div class="col-md-4">
                            <small class="">
                                <i class="bi bi-circle-fill text-success me-1"></i> Confirmados: 
                                <span class="fw-semibold"><?= $confirmados ?? 3 ?></span>
                            </small>
                        </div>
                        <div class="col-md-4">
                            <small class="">
                                <i class="bi bi-circle-fill text-warning me-1"></i> Pendentes: 
                                <span class="fw-semibold"><?= $pendentes ?? 2 ?></span>
                            </small>
                        </div>
                        <div class="col-md-4">
                            <small class="">
                                <i class="bi bi-circle-fill text-danger me-1"></i> Cancelados: 
                                <span class="fw-semibold"><?= $cancelados ?? 0 ?></span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna da Direita - Atividades e Estatísticas -->
        <div class="col-lg-4">
            <!-- Atividades Recentes -->
            <div class="card-admin mb-4">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-activity me-2"></i>Atividades Recentes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">Novo cliente cadastrado</h6>
                                    <small class="">10:30</small>
                                </div>
                                <p class=" small mb-0">Carlos Silva foi cadastrado no sistema</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">Agendamento confirmado</h6>
                                    <small class="">09:45</small>
                                </div>
                                <p class=" small mb-0">Marcos Oliveira - Corte Social</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">Pagamento recebido</h6>
                                    <small class="">09:15</small>
                                </div>
                                <p class=" small mb-0">R$ 85,00 via Cartão de Crédito</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">Avaliação recebida</h6>
                                    <small class="">Ontem, 18:30</small>
                                </div>
                                <p class=" small mb-0">5 estrelas para João Mendes</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-danger"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">Agendamento cancelado</h6>
                                    <small class="">Ontem, 17:20</small>
                                </div>
                                <p class=" small mb-0">Roberto Alves - Corte + Barba</p>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/atividades" class="btn btn-outline-light w-100 mt-3">
                        <i class="bi bi-clock-history me-1"></i> Ver Todas as Atividades
                    </a>
                </div>
            </div>

            <!-- Métricas Rápidas -->
            <div class="card-admin">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-speedometer2 me-2"></i>Métricas Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="metric-card bg-dark p-3 rounded text-center">
                                <h3 class="text-primary mb-1"><?= $clientesNovosMes ?? 24 ?></h3>
                                <small class="">Clientes este mês</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-card bg-dark p-3 rounded text-center">
                                <h3 class="text-success mb-1"><?= $faturamentoMes ?? '5.240,80' ?></h3>
                                <small class="">Faturamento mensal</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-card bg-dark p-3 rounded text-center">
                                <h3 class="text-warning mb-1"><?= $servicosMes ?? 187 ?></h3>
                                <small class="">Serviços realizados</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-card bg-dark p-3 rounded text-center">
                                <h3 class="text-info mb-1"><?= $agendamentosMes ?? 210 ?></h3>
                                <small class="">Agendamentos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Estilos para o Dashboard */
:root {
    --bs-dark: #1a1d20;
    --bs-darker: #121416;
    --bs-purple: #6f42c1;
    --bs-teal: #20c997;
    --bs-orange: #fd7e14;
}

.card-admin {
    background-color: var(--bs-dark);
    border: 1px solid #2d3034;
    border-radius: 10px;
    transition: all 0.3s ease;
    color: #e9ecef;
}

.card-admin:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.card-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
}

.icon-card {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
}

/* Cores personalizadas */
.bg-purple {
    background-color: var(--bs-purple) !important;
}

.text-purple {
    color: var(--bs-purple) !important;
}

.bg-teal {
    background-color: var(--bs-teal) !important;
}

.text-teal {
    color: var(--bs-teal) !important;
}

.bg-orange {
    background-color: var(--bs-orange) !important;
}

.text-orange {
    color: var(--bs-orange) !important;
}

/* Timeline */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background-color: #2d3034;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -30px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.timeline-content {
    background: #1a1d20;
    padding: 12px;
    border-radius: 8px;
    border-left: 3px solid;
}

.timeline-item:nth-child(1) .timeline-content {
    border-left-color: #20c997;
}

.timeline-item:nth-child(2) .timeline-content {
    border-left-color: #0d6efd;
}

.timeline-item:nth-child(3) .timeline-content {
    border-left-color: #ffc107;
}

.timeline-item:nth-child(4) .timeline-content {
    border-left-color: #0dcaf0;
}

.timeline-item:nth-child(5) .timeline-content {
    border-left-color: #dc3545;
}

/* Tabelas */
.table-dark {
    --bs-table-bg: transparent;
    --bs-table-striped-bg: rgba(255, 255, 255, 0.05);
    --bs-table-hover-bg: rgba(255, 255, 255, 0.075);
}

.table.table-dark thead th {
    border-bottom: 2px solid #2d3034;
    background-color: rgba(0, 0, 0, 0.2);
}

/* Badges */
.badge {
    padding: 0.4em 0.8em;
    font-weight: 500;
}

/* Métricas Cards */
.metric-card {
    border: 1px solid #2d3034;
    transition: all 0.3s ease;
}

.metric-card:hover {
    border-color: #495057;
    background-color: rgba(255, 255, 255, 0.02) !important;
}

/* Botões */
.btn-outline-light {
    border-color: #495057;
    color: #adb5bd;
}

.btn-outline-light:hover {
    background-color: #495057;
    border-color: #6c757d;
    color: #fff;
}

/* Status na tabela */
.table-success {
    --bs-table-bg: rgba(25, 135, 84, 0.1);
    --bs-table-border-color: rgba(25, 135, 84, 0.2);
}

.table-danger {
    --bs-table-bg: rgba(220, 53, 69, 0.1);
    --bs-table-border-color: rgba(220, 53, 69, 0.2);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Botão de atualizar dashboard
    document.getElementById('refreshDashboard').addEventListener('click', function() {
        const btn = this;
        const icon = btn.querySelector('i');
        const originalHTML = btn.innerHTML;
        
        // Animação de carregamento
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Atualizando...';
        
        // Simular atualização
        setTimeout(() => {
            btn.disabled = false;
            btn.innerHTML = originalHTML;
            
            // Mostrar notificação
            showNotification('Dashboard atualizado com sucesso!', 'success');
        }, 1500);
    });
    
    // Função para mostrar notificação
    function showNotification(message, type) {
        // Criar elemento de notificação
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
        notification.style.zIndex = '1050';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Remover após 3 segundos
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 3000);
    }
    
    // Adicionar classe ativa aos cards ao passar mouse
    const cards = document.querySelectorAll('.card-admin');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('active');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('active');
        });
    });
});
</script>