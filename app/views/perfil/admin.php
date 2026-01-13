<!-- app/views/relatorios/painel.php -->

<div class="container">
    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">
                <i class="bi bi-bar-chart me-2"></i>Relatórios Analíticos
            </h3>
            <p class=" mb-0">Análise detalhada do desempenho da barbearia</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary" id="exportRelatorio">
                <i class="bi bi-file-earmark-excel me-1"></i> Exportar
            </button>
            <button class="btn btn-outline-success" id="imprimirRelatorio">
                <i class="bi bi-printer me-1"></i> Imprimir
            </button>
        </div>
    </div>

    <!-- Filtros -->
    <div class="card-admin mb-4">
        <div class="card-header bg-dark">
            <h5 class="mb-0">
                <i class="bi bi-funnel me-2"></i>Filtros do Relatório
            </h5>
        </div>
        <div class="card-body">
            <form id="filtroRelatorio" class="row g-3">
                <div class="col-md-3">
                    <label for="tipoRelatorio" class="form-label">Tipo de Relatório</label>
                    <select class="form-select bg-dark text-light" id="tipoRelatorio">
                        <option value="financeiro">Financeiro</option>
                        <option value="servicos" selected>Serviços</option>
                        <option value="barbeiros">Barbeiros</option>
                        <option value="clientes">Clientes</option>
                        <option value="agendamentos">Agendamentos</option>
                        <option value="produtos">Produtos</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="periodo" class="form-label">Período</label>
                    <select class="form-select bg-dark text-light" id="periodo">
                        <option value="hoje">Hoje</option>
                        <option value="ontem">Ontem</option>
                        <option value="semana" selected>Esta Semana</option>
                        <option value="mes">Este Mês</option>
                        <option value="trimestre">Este Trimestre</option>
                        <option value="semestre">Este Semestre</option>
                        <option value="ano">Este Ano</option>
                        <option value="personalizado">Personalizado</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="dataInicio" class="form-label">Data Início</label>
                    <input type="date" class="form-control bg-dark text-light" id="dataInicio" 
                           value="<?= date('Y-m-01') ?>">
                </div>
                <div class="col-md-2">
                    <label for="dataFim" class="form-label">Data Fim</label>
                    <input type="date" class="form-control bg-dark text-light" id="dataFim" 
                           value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-2">
                    <label for="agrupamento" class="form-label">Agrupar Por</label>
                    <select class="form-select bg-dark text-light" id="agrupamento">
                        <option value="dia">Dia</option>
                        <option value="semana">Semana</option>
                        <option value="mes" selected>Mês</option>
                        <option value="barbeiro">Barbeiro</option>
                        <option value="servico">Serviço</option>
                    </select>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-filter me-1"></i> Aplicar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Cards de Métricas -->
    <div class="row g-3 mb-4">
        <!-- Faturamento Total -->
        <div class="col-xl-3 col-lg-6">
            <div class="card-admin card-hover border-start border-4 border-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Faturamento Total</h6>
                            <h3 class="mb-0">R$ <?= number_format($faturamentoTotal ?? 12450.80, 2, ',', '.') ?></h3>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> 18% vs período anterior
                            </small>
                        </div>
                        <div class="icon-card bg-primary bg-opacity-10">
                            <i class="bi bi-cash-stack text-primary fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Serviços Realizados -->
        <div class="col-xl-3 col-lg-6">
            <div class="card-admin card-hover border-start border-4 border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Serviços Realizados</h6>
                            <h3 class="mb-0"><?= $servicosRealizados ?? 187 ?></h3>
                            <small class="text-warning">
                                <?= $servicosPendentes ?? 12 ?> pendentes
                            </small>
                        </div>
                        <div class="icon-card bg-success bg-opacity-10">
                            <i class="bi bi-scissors text-success fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Médio -->
        <div class="col-xl-3 col-lg-6">
            <div class="card-admin card-hover border-start border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Ticket Médio</h6>
                            <h3 class="mb-0">R$ <?= number_format($ticketMedio ?? 66.58, 2, ',', '.') ?></h3>
                            <small class="text-info">+R$ 5,20 vs período anterior</small>
                        </div>
                        <div class="icon-card bg-warning bg-opacity-10">
                            <i class="bi bi-cart-check text-warning fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clientes Atendidos -->
        <div class="col-xl-3 col-lg-6">
            <div class="card-admin card-hover border-start border-4 border-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Clientes Atendidos</h6>
                            <h3 class="mb-0"><?= $clientesAtendidos ?? 124 ?></h3>
                            <small class="text-danger">
                                <i class="bi bi-arrow-down"></i> 2% vs período anterior
                            </small>
                        </div>
                        <div class="icon-card bg-info bg-opacity-10">
                            <i class="bi bi-people text-info fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <div class="row g-4">
        <!-- Coluna da Esquerda - Tabela de Relatórios -->
        <div class="col-lg-8">
            <div class="card-admin">
                <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-table me-2"></i>Relatório Detalhado
                    </h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-download me-1"></i> Exportar
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-excel me-2"></i> Excel</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-filetype-pdf me-2"></i> PDF</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-filetype-csv me-2"></i> CSV</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Serviço</th>
                                    <th>Barbeiro</th>
                                    <th>Valor</th>
                                    <th>Pagamento</th>
                                    <th>Status</th>
                                    <th>Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($relatorioDetalhado)): ?>
                                    <?php foreach ($relatorioDetalhado as $item): ?>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold"><?= $item['data'] ?></div>
                                                <small class=""><?= $item['hora'] ?></small>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <i class="bi bi-person-circle"></i>
                                                    </div>
                                                    <span><?= $item['cliente'] ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary bg-opacity-25 text-secondary">
                                                    <?= $item['servico'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <i class="bi bi-person-badge"></i>
                                                    </div>
                                                    <span><?= $item['barbeiro'] ?></span>
                                                </div>
                                            </td>
                                            <td class="fw-semibold text-success">
                                                R$ <?= number_format($item['valor'], 2, ',', '.') ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $pagamentoIcon = [
                                                        'Cartão' => 'bi-credit-card',
                                                        'PIX' => 'bi-qr-code',
                                                        'Dinheiro' => 'bi-cash',
                                                        'Transferência' => 'bi-bank'
                                                    ][$item['pagamento']] ?? 'bi-cash';
                                                ?>
                                                <span class="badge bg-dark border border-secondary">
                                                    <i class="bi <?= $pagamentoIcon ?> me-1"></i><?= $item['pagamento'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php 
                                                    $statusConfig = [
                                                        'Pago' => ['class' => 'bg-success', 'icon' => 'bi-check-circle'],
                                                        'Pendente' => ['class' => 'bg-warning', 'icon' => 'bi-clock'],
                                                        'Cancelado' => ['class' => 'bg-danger', 'icon' => 'bi-x-circle'],
                                                        'Estornado' => ['class' => 'bg-secondary', 'icon' => 'bi-arrow-counterclockwise']
                                                    ];
                                                    $statusInfo = $statusConfig[$item['status']] ?? $statusConfig['Pago'];
                                                ?>
                                                <span class="badge <?= $statusInfo['class'] ?>">
                                                    <i class="bi <?= $statusInfo['icon'] ?> me-1"></i><?= $item['status'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-info" 
                                                        onclick="verDetalhes(<?= $item['id'] ?>)">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <i class="bi bi-bar-chart display-6  mb-3"></i>
                                            <p class=" mb-0">Nenhum dado encontrado para os filtros selecionados</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot class="table-dark">
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">Total do Período:</td>
                                    <td class="fw-bold text-primary">R$ <?= number_format($totalPeriodo ?? 2450.80, 2, ',', '.') ?></td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-dark">
                    <div class="row">
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-primary me-1"></i> Total de Registros: 
                                <span class="fw-semibold"><?= count($relatorioDetalhado ?? []) ?></span>
                            </small>
                        </div>
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-success me-1"></i> Serviços Realizados: 
                                <span class="fw-semibold"><?= $servicosConcluidos ?? 24 ?></span>
                            </small>
                        </div>
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-warning me-1"></i> Média por Dia: 
                                <span class="fw-semibold">R$ <?= number_format($mediaDiaria ?? 350.11, 2, ',', '.') ?></span>
                            </small>
                        </div>
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-info me-1"></i> Período: 
                                <span class="fw-semibold"><?= date('d/m/Y') ?></span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna da Direita - Gráficos e Resumos -->
        <div class="col-lg-4">
            <!-- Gráfico de Serviços -->
            <div class="card-admin mb-4">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-pie-chart me-2"></i>Serviços Mais Realizados
                    </h5>
                </div>
                <div class="card-body">
                    <?php 
                    $servicos = [
                        ['nome' => 'Corte Social', 'porcentagem' => 45, 'quantidade' => 84, 'cor' => 'primary'],
                        ['nome' => 'Corte + Barba', 'porcentagem' => 25, 'quantidade' => 47, 'cor' => 'success'],
                        ['nome' => 'Apenas Barba', 'porcentagem' => 15, 'quantidade' => 28, 'cor' => 'warning'],
                        ['nome' => 'Hidratação', 'porcentagem' => 10, 'quantidade' => 19, 'cor' => 'info'],
                        ['nome' => 'Outros', 'porcentagem' => 5, 'quantidade' => 9, 'cor' => 'secondary']
                    ];
                    ?>
                    
                    <?php foreach ($servicos as $servico): ?>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-semibold"><?= $servico['nome'] ?></span>
                            <span class="text-<?= $servico['cor'] ?>"><?= $servico['porcentagem'] ?>% (<?= $servico['quantidade'] ?>)</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-<?= $servico['cor'] ?>" 
                                 role="progressbar" 
                                 style="width: <?= $servico['porcentagem'] ?>%"
                                 title="<?= $servico['nome'] ?> - <?= $servico['porcentagem'] ?>%">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <hr class="my-4">
                    
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="metric-card bg-dark p-3 rounded">
                                <h4 class="text-primary mb-1"><?= array_sum(array_column($servicos, 'quantidade')) ?></h4>
                                <small class="">Total Serviços</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-card bg-dark p-3 rounded">
                                <h4 class="text-success mb-1"><?= $servicos[0]['nome'] ?></h4>
                                <small class="">Serviço Top</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formas de Pagamento -->
            <div class="card-admin">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-credit-card me-2"></i>Formas de Pagamento
                    </h5>
                </div>
                <div class="card-body">
                    <?php 
                    $formasPagamento = [
                        ['nome' => 'Cartão', 'porcentagem' => 50, 'cor' => 'primary', 'icon' => 'bi-credit-card'],
                        ['nome' => 'PIX', 'porcentagem' => 30, 'cor' => 'success', 'icon' => 'bi-qr-code'],
                        ['nome' => 'Dinheiro', 'porcentagem' => 15, 'cor' => 'warning', 'icon' => 'bi-cash'],
                        ['nome' => 'Outros', 'porcentagem' => 5, 'cor' => 'secondary', 'icon' => 'bi-bank']
                    ];
                    ?>
                    
                    <?php foreach ($formasPagamento as $forma): ?>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="bi <?= $forma['icon'] ?> text-<?= $forma['cor'] ?> fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-semibold"><?= $forma['nome'] ?></span>
                                <span class="text-<?= $forma['cor'] ?>"><?= $forma['porcentagem'] ?>%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-<?= $forma['cor'] ?>" 
                                     style="width: <?= $forma['porcentagem'] ?>%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <hr class="my-4">
                    
                    <!-- Métricas Rápidas -->
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="metric-card bg-dark p-2 rounded text-center">
                                <h5 class="text-primary mb-1">R$ 1.225</h5>
                                <small class="">Cartão</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-card bg-dark p-2 rounded text-center">
                                <h5 class="text-success mb-1">R$ 735</h5>
                                <small class="">PIX</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-card bg-dark p-2 rounded text-center">
                                <h5 class="text-warning mb-1">R$ 368</h5>
                                <small class="">Dinheiro</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="metric-card bg-dark p-2 rounded text-center">
                                <h5 class="text-info mb-1">R$ 122</h5>
                                <small class="">Outros</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Análises Adicionais -->
    <div class="row g-4 mt-2">
        <!-- Análise de Barbeiros -->
        <div class="col-lg-6">
            <div class="card-admin">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-person-badge me-2"></i>Desempenho dos Barbeiros
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-sm">
                            <thead>
                                <tr>
                                    <th>Barbeiro</th>
                                    <th>Serviços</th>
                                    <th>Faturamento</th>
                                    <th>Avaliação</th>
                                    <th>Eficiência</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>João Mendes</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">48</td>
                                    <td class="text-success">R$ 2.400</td>
                                    <td>
                                        <span class="text-warning">
                                            <i class="bi bi-star-fill"></i> 4.8
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 85%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro2.jpg" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>Pedro Santos</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">42</td>
                                    <td class="text-success">R$ 2.100</td>
                                    <td>
                                        <span class="text-warning">
                                            <i class="bi bi-star-fill"></i> 4.6
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 75%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro3.jpg" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>Rafael Lima</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">38</td>
                                    <td class="text-success">R$ 1.900</td>
                                    <td>
                                        <span class="text-warning">
                                            <i class="bi bi-star-fill"></i> 4.7
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-warning" style="width: 65%"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Análise de Horários -->
        <div class="col-lg-6">
            <div class="card-admin">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-clock me-2"></i>Horários Mais Populares
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php 
                        $horarios = [
                            ['horario' => '09:00 - 10:00', 'ocupacao' => 85, 'cor' => 'success'],
                            ['horario' => '10:00 - 11:00', 'ocupacao' => 90, 'cor' => 'success'],
                            ['horario' => '11:00 - 12:00', 'ocupacao' => 80, 'cor' => 'success'],
                            ['horario' => '12:00 - 13:00', 'ocupacao' => 40, 'cor' => 'warning'],
                            ['horario' => '13:00 - 14:00', 'ocupacao' => 60, 'cor' => 'warning'],
                            ['horario' => '14:00 - 15:00', 'ocupacao' => 75, 'cor' => 'success'],
                            ['horario' => '15:00 - 16:00', 'ocupacao' => 70, 'cor' => 'success'],
                            ['horario' => '16:00 - 17:00', 'ocupacao' => 65, 'cor' => 'warning'],
                            ['horario' => '17:00 - 18:00', 'ocupacao' => 55, 'cor' => 'warning'],
                        ];
                        ?>
                        
                        <?php foreach ($horarios as $horario): ?>
                        <div class="col-4 mb-3">
                            <div class="time-slot text-center p-2 rounded">
                                <div class="fw-semibold mb-1"><?= $horario['horario'] ?></div>
                                <div class="text-<?= $horario['cor'] ?>">
                                    <?= $horario['ocupacao'] ?>%
                                </div>
                                <div class="progress mt-1" style="height: 4px;">
                                    <div class="progress-bar bg-<?= $horario['cor'] ?>" 
                                         style="width: <?= $horario['ocupacao'] ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Estilos para Relatórios */
.time-slot {
    background-color: rgba(255, 255, 255, 0.05);
    border: 1px solid #2d3034;
    transition: all 0.3s ease;
}

.time-slot:hover {
    background-color: rgba(255, 255, 255, 0.08);
    transform: translateY(-2px);
}

.metric-card {
    border: 1px solid #2d3034;
    transition: all 0.3s ease;
}

.metric-card:hover {
    border-color: #495057;
    background-color: rgba(255, 255, 255, 0.02);
}

.progress {
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

.progress-bar {
    border-radius: 10px;
}

/* Tabelas escuras */
.table-dark {
    --bs-table-bg: transparent;
    --bs-table-striped-bg: rgba(255, 255, 255, 0.05);
    --bs-table-hover-bg: rgba(255, 255, 255, 0.075);
}

/* Formulários no modo escuro */
.form-control.bg-dark,
.form-select.bg-dark {
    background-color: #1a1d20 !important;
    border-color: #2d3034;
    color: #e9ecef;
}

.form-control.bg-dark:focus,
.form-select.bg-dark:focus {
    background-color: #1a1d20;
    border-color: #0d6efd;
    color: #e9ecef;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

/* Cards com hover */
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Formulário de filtros
    document.getElementById('filtroRelatorio').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const tipo = document.getElementById('tipoRelatorio').value;
        const periodo = document.getElementById('periodo').value;
        const inicio = document.getElementById('dataInicio').value;
        const fim = document.getElementById('dataFim').value;
        const agrupamento = document.getElementById('agrupamento').value;
        
        // Simular carregamento
        const btn = this.querySelector('button[type="submit"]');
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Processando...';
        btn.disabled = true;
        
        // Simulação de processamento
        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.disabled = false;
            
            // Mostrar notificação
            showNotification('Relatório gerado com sucesso!', 'success');
            
            // Aqui você faria uma requisição AJAX para atualizar os dados
            console.log('Filtrando:', { tipo, periodo, inicio, fim, agrupamento });
        }, 1500);
    });
    
    // Botão de exportar
    document.getElementById('exportRelatorio').addEventListener('click', function() {
        showNotification('Exportando relatório em Excel...', 'info');
        // Simular download
        setTimeout(() => {
            showNotification('Relatório exportado com sucesso!', 'success');
        }, 1000);
    });
    
    // Botão de imprimir
    document.getElementById('imprimirRelatorio').addEventListener('click', function() {
        window.print();
    });
    
    // Alternar visibilidade dos campos de data quando selecionar "Personalizado"
    document.getElementById('periodo').addEventListener('change', function() {
        const dataInicio = document.getElementById('dataInicio');
        const dataFim = document.getElementById('dataFim');
        
        if (this.value === 'personalizado') {
            dataInicio.disabled = false;
            dataFim.disabled = false;
        } else {
            dataInicio.disabled = true;
            dataFim.disabled = true;
            
            // Definir datas automáticas baseadas no período
            const hoje = new Date();
            let dataInicioValue = new Date();
            
            switch(this.value) {
                case 'hoje':
                    dataInicioValue = hoje;
                    break;
                case 'ontem':
                    dataInicioValue.setDate(hoje.getDate() - 1);
                    break;
                case 'semana':
                    dataInicioValue.setDate(hoje.getDate() - 7);
                    break;
                case 'mes':
                    dataInicioValue.setMonth(hoje.getMonth() - 1);
                    break;
                case 'trimestre':
                    dataInicioValue.setMonth(hoje.getMonth() - 3);
                    break;
                case 'semestre':
                    dataInicioValue.setMonth(hoje.getMonth() - 6);
                    break;
                case 'ano':
                    dataInicioValue.setFullYear(hoje.getFullYear() - 1);
                    break;
            }
            
            dataInicio.value = dataInicioValue.toISOString().split('T')[0];
            dataFim.value = hoje.toISOString().split('T')[0];
        }
    });
    
    // Função para ver detalhes (simulada)
    window.verDetalhes = function(id) {
        alert(`Detalhes do registro ${id}\n\nEsta funcionalidade será implementada na versão completa.`);
    };
    
    // Função para mostrar notificação
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
        notification.style.zIndex = '1050';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 3000);
    }
});
</script>