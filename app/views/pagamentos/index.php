<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-4">
    <h2 class="mb-4">💳 Pagamentos</h2>

    <!-- Botão Novo Pagamento -->
    <div class="mb-3">
        <a href="/pagamentos/adicionar" class="btn btn-success">
            ➕ Novo Pagamento
        </a>
    </div>

    <!-- Tabela de Pagamentos -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pagamentos)) : ?>
                    <?php foreach ($pagamentos as $p) : ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td><?= htmlspecialchars($p['cliente']); ?></td>
                            <td><?= htmlspecialchars($p['descricao']); ?></td>
                            <td>R$ <?= number_format($p['valor'], 2, ',', '.'); ?></td>
                            <td>
                                <span class="badge <?= $p['status'] === 'pago' ? 'bg-success' : 'bg-warning'; ?>">
                                    <?= ucfirst($p['status']); ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($p['data_pagamento'])); ?></td>
                            <td>
                                <a href="/pagamentos/detalhes/<?= $p['id'] ?>" class="btn btn-sm btn-primary">
                                    🔍 Detalhes
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Nenhum pagamento registrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>