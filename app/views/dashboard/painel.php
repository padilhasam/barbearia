<!-- app/views/dashboard/painel.php -->

<div class="container-fluid">
    <h3 class="mb-4">Dashboard</h3>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card-admin">
                <div class="fs-2 mb-2"><i class="bi bi-people-fill"></i></div>
                <h6>Total de Clientes</h6>
                <p class="mb-0"><?= $totalClientes ?? 0 ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-admin">
                <div class="fs-2 mb-2"><i class="bi bi-calendar-event-fill"></i></div>
                <h6>Agendamentos Hoje</h6>
                <p class="mb-0"><?= $agendamentosHoje ?? 0 ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-admin">
                <div class="fs-2 mb-2"><i class="bi bi-scissors"></i></div>
                <h6>Serviços Ativos</h6>
                <p class="mb-0"><?= $servicosAtivos ?? 0 ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-admin">
                <div class="fs-2 mb-2"><i class="bi bi-cash-stack"></i></div>
                <h6>Receita Hoje</h6>
                <p class="mb-0">R$ <?= number_format($receitaHoje ?? 0, 2, ',', '.') ?></p>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Painel Admin</h4>
    <p>Bem-vindo ao painel administrativo!</p>

    <div class="card card-agendamento mb-4 bg-dark text-light">
        <div class="card-body">
            <h6 class="fw-bold mb-3">Próximos Agendamentos</h6>
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
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
                        <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?= $agendamento['data'] ?></td>
                            <td><?= $agendamento['hora'] ?></td>
                            <td><?= $agendamento['cliente_nome'] ?></td>
                            <td><?= $agendamento['servico_nome'] ?></td>
                            <td><?= $agendamento['barbeiro_nome'] ?></td>
                            <td>
                                <?php 
                                    $statusClass = [
                                        'Confirmado' => 'bg-success',
                                        'Pendente' => 'bg-warning',
                                        'Cancelado' => 'bg-danger'
                                    ][$agendamento['status']] ?? 'bg-secondary';
                                ?>
                                <span class="badge <?= $statusClass ?>"><?= $agendamento['status'] ?></span>
                            </td>
                            <td>
                                <a href="/admin/agendamentos/editar/<?= $agendamento['id'] ?>" class="btn btn-sm btn-outline-light">Editar</a>
                                <a href="/admin/agendamentos/excluir/<?= $agendamento['id'] ?>" class="btn btn-sm btn-outline-danger">Cancelar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
