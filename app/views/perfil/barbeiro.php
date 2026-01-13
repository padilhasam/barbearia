<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">
                <i class="bi bi-person-badge me-2"></i>Perfil do Barbeiro
            </h2>
            <p class="text-muted mb-0">Gerencie seu perfil, agenda e serviços</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary">
                <i class="bi bi-calendar-week me-1"></i> Minha Agenda
            </button>
            <button class="btn btn-outline-success">
                <i class="bi bi-cash-coin me-1"></i> Comissões
            </button>
        </div>
    </div>

    <div class="row">
        <!-- Coluna Esquerda -->
        <div class="col-lg-4">
            <!-- Card do Perfil -->
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center p-4">
                    <div class="position-relative d-inline-block mb-3">
                        <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" alt="Barbeiro" 
                             class="rounded-circle border border-4 border-warning" width="140" height="140">
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-success rounded-pill">
                            Online
                        </span>
                    </div>
                    <h4 class="card-title mb-1">João Mendes</h4>
                    <div class="mb-3">
                        <span class="badge bg-warning bg-opacity-10 text-warning border border-warning">
                            <i class="bi bi-star-fill me-1"></i>4.8
                        </span>
                        <span class="badge bg-info bg-opacity-10 text-info border border-info ms-2">
                            <i class="bi bi-award me-1"></i>Especialista
                        </span>
                    </div>
                    
                    <!-- Informações Profissionais -->
                    <div class="d-grid gap-2 mb-4">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">ID Barbeiro:</span>
                            <span class="fw-semibold">BARB-003</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Experiência:</span>
                            <span class="fw-semibold">8 anos</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Comissão:</span>
                            <span class="fw-semibold text-success">40%</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Status:</span>
                            <span class="fw-semibold text-success">Ativo</span>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-warning">
                            <i class="bi bi-clock-history me-1"></i> Ver Agendamentos
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-chat-dots me-1"></i> Mensagens
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card de Estatísticas -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0">
                        <i class="bi bi-bar-chart me-2"></i>Minhas Estatísticas
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label small text-muted mb-1">Serviços Hoje</label>
                        <div class="d-flex align-items-center">
                            <div class="progress flex-grow-1 me-3" style="height: 15px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                            </div>
                            <span class="fw-semibold">6/8</span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small text-muted mb-1">Satisfação do Cliente</label>
                        <div class="d-flex align-items-center">
                            <div class="progress flex-grow-1 me-3" style="height: 15px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"></div>
                            </div>
                            <span class="fw-semibold">4.8/5</span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small text-muted mb-1">Comissão Mensal</label>
                        <div class="d-flex align-items-center">
                            <div class="progress flex-grow-1 me-3" style="height: 15px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"></div>
                            </div>
                            <span class="fw-semibold">R$ 2.800</span>
                        </div>
                    </div>
                    
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <div class="border rounded p-2">
                                <h5 class="mb-0 text-success">24</h5>
                                <small class="text-muted">Agendamentos</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-2">
                                <h5 class="mb-0 text-primary">18</h5>
                                <small class="text-muted">Clientes Únicos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna Direita -->
        <div class="col-lg-8">
            <!-- Abas -->
            <ul class="nav nav-tabs mb-4" id="barberTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile">
                        <i class="bi bi-person me-1"></i> Perfil
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services">
                        <i class="bi bi-scissors me-1"></i> Serviços
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="schedule-tab" data-bs-toggle="tab" data-bs-target="#schedule">
                        <i class="bi bi-calendar me-1"></i> Horários
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews">
                        <i class="bi bi-star me-1"></i> Avaliações
                    </button>
                </li>
            </ul>

            <!-- Conteúdo das Abas -->
            <div class="tab-content" id="barberTabContent">
                <!-- Tab Perfil -->
                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Informações Profissionais</h5>
                        </div>
                        <div class="card-body">
                            <form id="formBarberInfo">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" value="João Mendes" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Apelido Profissional</label>
                                        <input type="text" class="form-control" value="João Barber">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Telefone</label>
                                        <input type="tel" class="form-control" value="(11) 97777-8888" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control" value="joao@tonkelski.com">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Biografia</label>
                                        <textarea class="form-control" rows="3">Especialista em cortes clássicos e barba tradicional. 8 anos de experiência na arte da barbearia.</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Anos de Experiência</label>
                                        <input type="number" class="form-control" value="8">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Comissão (%)</label>
                                        <input type="number" class="form-control" value="40" step="5" min="0" max="100">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Salvar Alterações
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tab Serviços -->
                <div class="tab-pane fade" id="services" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Meus Serviços</h5>
                            <button class="btn btn-sm btn-success">
                                <i class="bi bi-plus-circle me-1"></i> Adicionar Serviço
                            </button>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Serviço</th>
                                            <th>Duração</th>
                                            <th>Preço</th>
                                            <th>Popularidade</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                                        <i class="bi bi-scissors text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Corte Social</h6>
                                                        <small class="text-muted">Corte tradicional</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>30 min</td>
                                            <td class="fw-semibold">R$ 50,00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                                        <div class="progress-bar bg-warning" style="width: 85%"></div>
                                                    </div>
                                                    <small>85%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-success">Ativo</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                                        <i class="bi bi-droplet text-success"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Barba Completa</h6>
                                                        <small class="text-muted">Modelagem e cuidados</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>25 min</td>
                                            <td class="fw-semibold">R$ 40,00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                                        <div class="progress-bar bg-success" style="width: 70%"></div>
                                                    </div>
                                                    <small>70%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-success">Ativo</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-warning bg-opacity-10 p-2 rounded me-3">
                                                        <i class="bi bi-star text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Corte + Barba</h6>
                                                        <small class="text-muted">Combo completo</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>50 min</td>
                                            <td class="fw-semibold">R$ 85,00</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                                        <div class="progress-bar bg-primary" style="width: 60%"></div>
                                                    </div>
                                                    <small>60%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-success">Ativo</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Horários -->
                <div class="tab-pane fade" id="schedule" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Horários de Trabalho</h5>
                        </div>
                        <div class="card-body">
                            <form id="formSchedule">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Dia</th>
                                                <th>Status</th>
                                                <th>Início</th>
                                                <th>Fim</th>
                                                <th>Intervalo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-semibold">Segunda-feira</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="09:00">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="18:00">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12:00-13:00">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Terça-feira</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="09:00">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="18:00">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12:00-13:00">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Quarta-feira</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="09:00">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="18:00">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12:00-13:00">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Quinta-feira</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="09:00">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="18:00">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12:00-13:00">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Sexta-feira</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="09:00">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="18:00">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12:00-13:00">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Sábado</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="08:00">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="14:00">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="Sem intervalo">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">Domingo</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="" disabled>
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control" value="" disabled>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="" disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Salvar Horários
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tab Avaliações -->
                <div class="tab-pane fade" id="reviews" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Avaliações dos Clientes</h5>
                                <div class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <span class="ms-2">4.8/5.0</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Últimas Avaliações -->
                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <img src="<?= BASE_URL ?>/img/cliente-avatar.png" alt="Cliente" 
                                         class="rounded-circle me-3" width="50" height="50">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Carlos Silva</h6>
                                            <small class="text-muted">2 dias atrás</small>
                                        </div>
                                        <div class="text-warning mb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <p class="mb-0">Excelente serviço! João é muito atencioso e o corte ficou perfeito. Recomendo!</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-start mb-3">
                                    <img src="<?= BASE_URL ?>/img/cliente2.jpg" alt="Cliente" 
                                         class="rounded-circle me-3" width="50" height="50">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Marcos Oliveira</h6>
                                            <small class="text-muted">1 semana atrás</small>
                                        </div>
                                        <div class="text-warning mb-2">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <p class="mb-0">Bom atendimento, mas a espera foi um pouco longa. Corte muito bom.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Estatísticas de Avaliações -->
                            <h6>Distribuição das Avaliações</h6>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-warning me-2">5 estrelas</span>
                                    <div class="progress flex-grow-1 me-3">
                                        <div class="progress-bar bg-warning" style="width: 70%"></div>
                                    </div>
                                    <span>70%</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-warning me-2">4 estrelas</span>
                                    <div class="progress flex-grow-1 me-3">
                                        <div class="progress-bar bg-warning" style="width: 20%"></div>
                                    </div>
                                    <span>20%</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-warning me-2">3 estrelas</span>
                                    <div class="progress flex-grow-1 me-3">
                                        <div class="progress-bar bg-warning" style="width: 8%"></div>
                                    </div>
                                    <span>8%</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-warning me-2">2 estrelas</span>
                                    <div class="progress flex-grow-1 me-3">
                                        <div class="progress-bar bg-warning" style="width: 2%"></div>
                                    </div>
                                    <span>2%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Formulários do barbeiro
    document.getElementById('formBarberInfo').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Perfil do barbeiro atualizado!');
    });
    
    document.getElementById('formSchedule').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Horários atualizados com sucesso!');
    });
    
    // Alternar status dos dias na tabela de horários
    const switches = document.querySelectorAll('.form-switch input[type="checkbox"]');
    switches.forEach(switchEl => {
        switchEl.addEventListener('change', function() {
            const row = this.closest('tr');
            const inputs = row.querySelectorAll('input[type="time"], input[type="text"]');
            inputs.forEach(input => {
                input.disabled = !this.checked;
                if (!this.checked) input.value = '';
            });
        });
    });
    
    // Inicialização das tabs
    const barberTab = new bootstrap.Tab(document.querySelector('#barberTab .nav-link'));
});
</script>