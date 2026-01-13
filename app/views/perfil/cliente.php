<div class="container my-4">
    <div class="row">
        <!-- Coluna esquerda - Informações do Cliente -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block mb-3">
                        <img src="<?= BASE_URL ?>/img/cliente-avatar.png" alt="Foto do Cliente" 
                             class="rounded-circle border border-4 border-primary" width="150" height="150">
                        <button class="btn btn-sm btn-outline-primary position-absolute bottom-0 end-0 rounded-circle">
                            <i class="bi bi-camera"></i>
                        </button>
                    </div>
                    <h4 class="card-title mb-1">Carlos Silva</h4>
                    <p class="text-muted mb-3">
                        <i class="bi bi-star-fill text-warning me-1"></i>Cliente VIP
                    </p>
                    
                    <!-- Estatísticas do Cliente -->
                    <div class="row text-center mb-3">
                        <div class="col-4">
                            <div class="border rounded p-2">
                                <h5 class="mb-0 text-primary">12</h5>
                                <small class="text-muted">Visitas</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded p-2">
                                <h5 class="mb-0 text-success">R$ 850</h5>
                                <small class="text-muted">Gasto Total</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border rounded p-2">
                                <h5 class="mb-0 text-info">4</h5>
                                <small class="text-muted">Meses</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary">
                            <i class="bi bi-calendar-plus me-1"></i> Agendar Serviço
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-ticket-perforated me-1"></i> Meus Cupons
                        </button>
                    </div>
                </div>
            </div>

            <!-- Preferências do Cliente -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h6 class="mb-0">
                        <i class="bi bi-heart me-2"></i>Minhas Preferências
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label small text-muted mb-1">Barbeiro Preferido</label>
                        <div class="d-flex align-items-center">
                            <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" alt="Barbeiro" 
                                 class="rounded-circle me-2" width="40" height="40">
                            <div>
                                <h6 class="mb-0">João Mendes</h6>
                                <small class="text-muted">4.8 <i class="bi bi-star-fill text-warning"></i></small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small text-muted mb-1">Serviço Favorito</label>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-scissors text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Corte Social</h6>
                                <small class="text-muted">Realizado 8 vezes</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label small text-muted mb-1">Horário Preferido</label>
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                <i class="bi bi-clock text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Manhã (09:00 - 12:00)</h6>
                                <small class="text-muted">70% dos agendamentos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna direita - Formulário e Histórico -->
        <div class="col-md-8">
            <ul class="nav nav-tabs mb-4" id="perfilTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dados-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab">
                        <i class="bi bi-person me-1"></i> Meus Dados
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="agendamentos-tab" data-bs-toggle="tab" data-bs-target="#agendamentos" type="button" role="tab">
                        <i class="bi bi-calendar me-1"></i> Agendamentos
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="historico-tab" data-bs-toggle="tab" data-bs-target="#historico" type="button" role="tab">
                        <i class="bi bi-clock-history me-1"></i> Histórico
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="perfilTabContent">
                <!-- Tab Dados Pessoais -->
                <div class="tab-pane fade show active" id="dados" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">
                                <i class="bi bi-person-vcard me-2"></i>Dados Pessoais
                            </h5>
                        </div>
                        <div class="card-body">
                            <form id="formPerfilCliente">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="clienteNome" class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="clienteNome" value="Carlos Silva" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="clienteEmail" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="clienteEmail" value="carlos@email.com" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="clienteTelefone" class="form-label">Telefone</label>
                                        <input type="tel" class="form-control" id="clienteTelefone" value="(11) 98888-7777" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="clienteNascimento" class="form-label">Data de Nascimento</label>
                                        <input type="date" class="form-control" id="clienteNascimento" value="1990-05-15">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="clienteEndereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="clienteEndereco" 
                                           value="Rua das Flores, 123 - São Paulo/SP">
                                </div>

                                <div class="mb-3">
                                    <label for="clienteObservacoes" class="form-label">Observações/Preferências</label>
                                    <textarea class="form-control" id="clienteObservacoes" rows="3" 
                                              placeholder="Alguma observação importante?">Prefiro corte tradicional, sem muita máquina. Gosto de conversar durante o serviço.</textarea>
                                </div>

                                <hr class="my-4">

                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-secondary me-2">
                                        <i class="bi bi-arrow-counterclockwise me-1"></i> Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> Salvar Alterações
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tab Agendamentos -->
                <div class="tab-pane fade" id="agendamentos" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="bi bi-calendar-check me-2"></i>Meus Agendamentos
                            </h5>
                            <a href="/agendamentos/novo" class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-circle me-1"></i> Novo Agendamento
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Data/Hora</th>
                                            <th>Serviço</th>
                                            <th>Barbeiro</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">18/03/2024</div>
                                                <small class="text-muted">10:30</small>
                                            </td>
                                            <td>Corte + Barba</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" alt="Barbeiro" 
                                                         class="rounded-circle me-2" width="30" height="30">
                                                    <span>João Mendes</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Confirmado</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">25/03/2024</div>
                                                <small class="text-muted">14:00</small>
                                            </td>
                                            <td>Corte Social</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= BASE_URL ?>/img/barbeiro2.jpg" alt="Barbeiro" 
                                                         class="rounded-circle me-2" width="30" height="30">
                                                    <span>Pedro Santos</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning">Pendente</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="fw-semibold">01/04/2024</div>
                                                <small class="text-muted">11:00</small>
                                            </td>
                                            <td>Barba Completa</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= BASE_URL ?>/img/barbeiro1.jpg" alt="Barbeiro" 
                                                         class="rounded-circle me-2" width="30" height="30">
                                                    <span>João Mendes</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">Agendado</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Histórico -->
                <div class="tab-pane fade" id="historico" role="tabpanel">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">
                                <i class="bi bi-clock-history me-2"></i>Histórico de Serviços
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-primary"></div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Corte Social</h6>
                                            <small class="text-muted">10/03/2024</small>
                                        </div>
                                        <p class="mb-1">Barbeiro: João Mendes</p>
                                        <p class="text-muted small mb-0">Valor: R$ 50,00</p>
                                        <span class="badge bg-success mt-1">Realizado</span>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-success"></div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Barba Completa</h6>
                                            <small class="text-muted">03/03/2024</small>
                                        </div>
                                        <p class="mb-1">Barbeiro: Pedro Santos</p>
                                        <p class="text-muted small mb-0">Valor: R$ 40,00</p>
                                        <span class="badge bg-success mt-1">Realizado</span>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-warning"></div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1">Corte + Hidratação</h6>
                                            <small class="text-muted">24/02/2024</small>
                                        </div>
                                        <p class="mb-1">Barbeiro: João Mendes</p>
                                        <p class="text-muted small mb-0">Valor: R$ 75,00</p>
                                        <span class="badge bg-success mt-1">Realizado</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Estatísticas de Serviços -->
                            <div class="mt-4">
                                <h6>Resumo de Gastos</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="progress flex-grow-1 me-3" style="height: 20px;">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"></div>
                                            </div>
                                            <span class="fw-semibold">R$ 850</span>
                                        </div>
                                        <small class="text-muted">Total gasto em 2024</small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="progress flex-grow-1 me-3" style="height: 20px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%"></div>
                                            </div>
                                            <span class="fw-semibold">12</span>
                                        </div>
                                        <small class="text-muted">Total de serviços realizados</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Estilos para timeline no histórico */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 0;
    bottom: 0;
    width: 2px;
    background-color: #dee2e6;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -30px;
    top: 5px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
}

.timeline-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid var(--bs-primary);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Formulário do cliente
    const formPerfilCliente = document.getElementById('formPerfilCliente');
    formPerfilCliente.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Perfil do cliente atualizado com sucesso!');
    });

    // Inicialização das tabs
    const triggerTabList = document.querySelectorAll('#perfilTab button');
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl);
        triggerEl.addEventListener('click', event => {
            event.preventDefault();
            tabTrigger.show();
        });
    });
});
</script>