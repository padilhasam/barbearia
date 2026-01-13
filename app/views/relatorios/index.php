<div class="container-fluid py-4">
    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">
                <i class="bi bi-bar-chart-fill me-2 text-primary"></i>Relatórios Analíticos
            </h2>
            <p class=" mb-0">Análise detalhada do desempenho da barbearia</p>
        </div>
        <div class="d-flex gap-2">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-calendar-range me-1"></i> Este Mês
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Hoje</a></li>
                    <li><a class="dropdown-item" href="#">Ontem</a></li>
                    <li><a class="dropdown-item active" href="#">Este Mês</a></li>
                    <li><a class="dropdown-item" href="#">Mês Anterior</a></li>
                    <li><a class="dropdown-item" href="#">Este Trimestre</a></li>
                    <li><a class="dropdown-item" href="#">Este Ano</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Personalizado</a></li>
                </ul>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exportModal">
                <i class="bi bi-download me-1"></i> Exportar
            </button>
        </div>
    </div>

    <!-- Filtros Avançados -->
    <div class="card-admin mb-4">
        <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-funnel me-2"></i>Filtros do Relatório
            </h5>
            <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#filtrosAvancados">
                <i class="bi bi-chevron-down"></i>
            </button>
        </div>
        <div class="card-body collapse show" id="filtrosAvancados">
            <form id="formFiltrosRelatorio" class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label for="tipoRelatorio" class="form-label">Tipo de Relatório</label>
                    <select class="form-select bg-dark text-light border-secondary" id="tipoRelatorio">
                        <option value="financeiro" selected>Financeiro</option>
                        <option value="servicos">Serviços Mais Realizados</option>
                        <option value="barbeiros">Desempenho dos Barbeiros</option>
                        <option value="clientes">Clientes Frequentes</option>
                        <option value="agendamentos">Agendamentos por Período</option>
                        <option value="pagamentos">Formas de Pagamento</option>
                        <option value="produtos">Produtos Mais Vendidos</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label for="dataInicio" class="form-label">Data Início</label>
                    <input type="date" class="form-control bg-dark text-light border-secondary" id="dataInicio" value="<?= date('Y-m-01') ?>">
                </div>
                <div class="col-lg-2 col-md-6">
                    <label for="dataFim" class="form-label">Data Fim</label>
                    <input type="date" class="form-control bg-dark text-light border-secondary" id="dataFim" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label for="filtroBarbeiro" class="form-label">Barbeiro</label>
                    <select class="form-select bg-dark text-light border-secondary" id="filtroBarbeiro">
                        <option value="todos" selected>Todos os Barbeiros</option>
                        <option value="1">João Mendes</option>
                        <option value="2">Pedro Santos</option>
                        <option value="3">Rafael Lima</option>
                        <option value="4">Carlos Oliveira</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-12 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel me-1"></i> Filtrar
                    </button>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="agruparPorDia" checked>
                        <label class="form-check-label" for="agruparPorDia">Agrupar por Dia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="mostrarComparativo" checked>
                        <label class="form-check-label" for="mostrarComparativo">Mostrar Comparativo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="incluirCancelados">
                        <label class="form-check-label" for="incluirCancelados">Incluir Cancelados</label>
                    </div>
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
                            <h3 class="mb-0">R$ 12.450,80</h3>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> 15% vs mês anterior
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
                            <h3 class="mb-0">187</h3>
                            <small class="text-warning">
                                <i class="bi bi-arrow-right"></i> 12 em andamento
                            </small>
                        </div>
                        <div class="icon-card bg-success bg-opacity-10">
                            <i class="bi bi-scissors text-success fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clientes Atendidos -->
        <div class="col-xl-3 col-lg-6">
            <div class="card-admin card-hover border-start border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Clientes Atendidos</h6>
                            <h3 class="mb-0">124</h3>
                            <small class="text-info">
                                <i class="bi bi-person-plus"></i> 24 novos clientes
                            </small>
                        </div>
                        <div class="icon-card bg-warning bg-opacity-10">
                            <i class="bi bi-people text-warning fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Médio -->
        <div class="col-xl-3 col-lg-6">
            <div class="card-admin card-hover border-start border-4 border-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class=" mb-1">Ticket Médio</h6>
                            <h3 class="mb-0">R$ 66,58</h3>
                            <small class="text-danger">
                                <i class="bi bi-arrow-down"></i> 3% vs mês anterior
                            </small>
                        </div>
                        <div class="icon-card bg-info bg-opacity-10">
                            <i class="bi bi-graph-up text-info fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <div class="row g-4">
        <!-- Coluna da Esquerda - Tabela Detalhada -->
        <div class="col-lg-8">
            <div class="card-admin">
                <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-receipt me-2"></i>Relatório Financeiro Detalhado
                    </h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-light">
                            <i class="bi bi-printer me-1"></i> Imprimir
                        </button>
                        <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#exportModal">
                            <i class="bi bi-download me-1"></i> Exportar
                        </button>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="fw-semibold">15/03/2024</div>
                                        <small class="">10:30</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                            <span>Carlos Silva</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary">
                                            Corte + Barba
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>João Mendes</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-success">R$ 85,00</td>
                                    <td>
                                        <span class="badge bg-dark border border-primary text-primary">
                                            <i class="bi bi-credit-card me-1"></i> Cartão
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i> Pago
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-semibold">14/03/2024</div>
                                        <small class="">14:00</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                            <span>Marcos Oliveira</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success">
                                            Corte Social
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro2.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>Pedro Santos</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-success">R$ 50,00</td>
                                    <td>
                                        <span class="badge bg-dark border border-warning text-warning">
                                            <i class="bi bi-cash me-1"></i> Dinheiro
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i> Pago
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-semibold">14/03/2024</div>
                                        <small class="">11:45</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                            <span>Roberto Alves</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning">
                                            Barba Completa
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>João Mendes</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-success">R$ 40,00</td>
                                    <td>
                                        <span class="badge bg-dark border border-success text-success">
                                            <i class="bi bi-phone me-1"></i> PIX
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i> Pago
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-semibold">13/03/2024</div>
                                        <small class="">09:30</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                            <span>André Costa</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info bg-opacity-10 text-info border border-info">
                                            Corte Degradê
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro3.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>Rafael Lima</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-success">R$ 60,00</td>
                                    <td>
                                        <span class="badge bg-dark border border-primary text-primary">
                                            <i class="bi bi-credit-card me-1"></i> Cartão
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i> Pago
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="fw-semibold">13/03/2024</div>
                                        <small class="">16:15</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                            <span>Felipe Nunes</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-purple bg-opacity-10 text-purple border border-purple">
                                            Corte + Hidratação
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro2.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="30" height="30">
                                            <span>Pedro Santos</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-success">R$ 75,00</td>
                                    <td>
                                        <span class="badge bg-dark border border-success text-success">
                                            <i class="bi bi-phone me-1"></i> PIX
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i> Pago
                                        </span>
                                    </td>
                                </tr>
                                <!-- Linha de Total -->
                                <tr class="bg-darker">
                                    <td colspan="4" class="text-end fw-bold">Total do Período:</td>
                                    <td class="fw-bold text-primary">R$ 2.450,80</td>
                                    <td colspan="2" class=" small">Últimos 7 dias</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-dark">
                    <div class="row">
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-success me-1"></i> Pagos: 
                                <span class="fw-semibold">R$ 12.450,80</span>
                            </small>
                        </div>
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-warning me-1"></i> Pendentes: 
                                <span class="fw-semibold">R$ 850,00</span>
                            </small>
                        </div>
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-danger me-1"></i> Cancelados: 
                                <span class="fw-semibold">R$ 320,00</span>
                            </small>
                        </div>
                        <div class="col-md-3">
                            <small class="">
                                <i class="bi bi-circle-fill text-info me-1"></i> Devoluções: 
                                <span class="fw-semibold">R$ 0,00</span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna da Direita - Gráficos e Estatísticas -->
        <div class="col-lg-4">
            <!-- Gráfico de Serviços -->
            <div class="card-admin mb-4">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-pie-chart me-2"></i>Serviços Mais Realizados
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Corte Social</span>
                            <span class="text-primary">45% (84)</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 45%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Corte + Barba</span>
                            <span class="text-success">25% (47)</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Apenas Barba</span>
                            <span class="text-warning">15% (28)</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Hidratação</span>
                            <span class="text-info">10% (19)</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 10%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Outros</span>
                            <span class="text-secondary">5% (9)</span>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 5%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico de Pagamentos -->
            <div class="card-admin">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-credit-card me-2"></i>Formas de Pagamento
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <div class="icon-card bg-primary bg-opacity-10">
                                <i class="bi bi-credit-card text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-semibold">Cartão de Crédito/Débito</span>
                                <span class="text-primary">50%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <div class="icon-card bg-success bg-opacity-10">
                                <i class="bi bi-phone text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-semibold">PIX</span>
                                <span class="text-success">30%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <div class="icon-card bg-warning bg-opacity-10">
                                <i class="bi bi-cash text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-semibold">Dinheiro</span>
                                <span class="text-warning">15%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 15%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="icon-card bg-info bg-opacity-10">
                                <i class="bi bi-bank text-info fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-semibold">Outros</span>
                                <span class="text-info">5%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 5%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos Secundários -->
    <div class="row g-4 mt-4">
        <!-- Desempenho dos Barbeiros -->
        <div class="col-lg-6">
            <div class="card-admin">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-trophy me-2"></i>Ranking de Barbeiros
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Posição</th>
                                    <th>Barbeiro</th>
                                    <th>Serviços</th>
                                    <th>Faturamento</th>
                                    <th>Avaliação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="badge bg-warning">1º</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="32" height="32">
                                            <span>João Mendes</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">68</td>
                                    <td class="text-success">R$ 4.850,00</td>
                                    <td>
                                        <span class="text-warning">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <span class="ms-1">4.8</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary">2º</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro2.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="32" height="32">
                                            <span>Pedro Santos</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">55</td>
                                    <td class="text-success">R$ 3.920,00</td>
                                    <td>
                                        <span class="text-warning">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <span class="ms-1">4.2</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="badge bg-danger">3º</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= BASE_URL ?>/img/barbeiro3.jpg" alt="Barbeiro" 
                                                 class="rounded-circle me-2" width="32" height="32">
                                            <span>Rafael Lima</span>
                                        </div>
                                    </td>
                                    <td class="fw-semibold">42</td>
                                    <td class="text-success">R$ 3.150,00</td>
                                    <td>
                                        <span class="text-warning">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <span class="ms-1">5.0</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tendência de Crescimento -->
        <div class="col-lg-6">
            <div class="card-admin">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-graph-up-arrow me-2"></i>Tendência de Crescimento
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4 mb-3">
                            <div class="metric-card bg-darker p-3 rounded">
                                <h4 class="text-success mb-1">+15%</h4>
                                <small class="">Faturamento</small>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="metric-card bg-darker p-3 rounded">
                                <h4 class="text-primary mb-1">+12%</h4>
                                <small class="">Clientes</small>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="metric-card bg-darker p-3 rounded">
                                <h4 class="text-warning mb-1">+8%</h4>
                                <small class="">Serviços</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="metric-card bg-darker p-3 rounded">
                                <h4 class="text-info mb-1">4.8</h4>
                                <small class="">Satisfação</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="metric-card bg-darker p-3 rounded">
                                <h4 class="text-purple mb-1">-5%</h4>
                                <small class="">Cancelamentos</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="metric-card bg-darker p-3 rounded">
                                <h4 class="text-teal mb-1">92%</h4>
                                <small class="">Ocupação</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Exportação -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="exportModalLabel">
                    <i class="bi bi-download me-2"></i>Exportar Relatório
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formExportar">
                    <div class="mb-3">
                        <label class="form-label">Formato do Arquivo</label>
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="formato" id="formatoPDF" value="pdf" checked>
                                    <label class="form-check-label" for="formatoPDF">
                                        <i class="bi bi-file-pdf text-danger me-1"></i> PDF
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="formato" id="formatoExcel" value="excel">
                                    <label class="form-check-label" for="formatoExcel">
                                        <i class="bi bi-file-excel text-success me-1"></i> Excel
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="formato" id="formatoCSV" value="csv">
                                    <label class="form-check-label" for="formatoCSV">
                                        <i class="bi bi-file-text text-info me-1"></i> CSV
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Período</label>
                        <select class="form-select bg-dark text-light border-secondary">
                            <option selected>Período atual dos filtros</option>
                            <option>Últimos 7 dias</option>
                            <option>Este mês</option>
                            <option>Mês anterior</option>
                            <option>Este trimestre</option>
                            <option>Este ano</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Incluir Gráficos</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="incluirGraficos" checked>
                            <label class="form-check-label" for="incluirGraficos">Gerar gráficos no relatório</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnExportar">
                    <i class="bi bi-download me-1"></i> Exportar
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Estilos para Relatórios */
:root {
    --bs-darker: #121416;
    --bs-purple: #6f42c1;
    --bs-teal: #20c997;
}

.card-admin {
    background-color: var(--bs-dark);
    border: 1px solid #2d3034;
    border-radius: 10px;
    transition: all 0.3s ease;
    color: #e9ecef;
}

.card-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.card-hover:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
}

.icon-card {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
}

.bg-darker {
    background-color: var(--bs-darker) !important;
}

.bg-purple {
    background-color: var(--bs-purple) !important;
}

.text-purple {
    color: var(--bs-purple) !important;
}