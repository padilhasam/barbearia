<?php
require_once __DIR__ . '/../layouts/administrador/header.php';
?>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Agendamentos</h3>
        <a href="<?= BASE_URL ?>/admin/agendamentos/create" class="btn btn-success">
            <i class="bi bi-plus-lg me-2"></i>Novo Agendamento
        </a>
    </div>

    <div class="card bg-dark text-light shadow-sm">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-dark table-striped align-middle mb-0">
                    <thead class="table-secondary text-dark">
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Barbeiro</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($agendamentos)): ?>
                            <?php foreach ($agendamentos as $agendamento): ?>
                                <tr>
                                    <td><?= htmlspecialchars($agendamento['id']) ?></td>
                                    <td><?= htmlspecialchars($agendamento['cliente_nome']) ?></td>
                                    <td><?= htmlspecialchars($agendamento['servico_nome']) ?></td>
                                    <td><?= htmlspecialchars($agendamento['barbeiro_nome']) ?></td>
                                    <td><?= htmlspecialchars($agendamento['data']) ?></td>
                                    <td><?= htmlspecialchars($agendamento['hora']) ?></td>
                                    <td>
                                        <?php
                                            $statusClass = [
                                                'CONFIRMADO' => 'bg-success',
                                                'PENDENTE'   => 'bg-warning',
                                                'CANCELADO'  => 'bg-danger'
                                            ][$agendamento['status']] ?? 'bg-secondary';
                                        ?>
                                        <span class="badge <?= $statusClass ?>"><?= $agendamento['status'] ?></span>
                                    </td>
                                    <td>
                                        <a href="<?= BASE_URL ?>/admin/agendamentos/edit/<?= $agendamento['id'] ?>" class="btn btn-sm btn-primary me-1">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="<?= BASE_URL ?>/admin/agendamentos/delete/<?= $agendamento['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este agendamento?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-3">Nenhum agendamento encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php
require_once __DIR__ . '/../layouts/administrador/footer.php';
?>
