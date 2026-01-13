<div class="container my-4">
    <h2 class="mb-4">💳 Clientes</h2>

    <!-- Botão Novo Cleinte -->
    <div class="mb-3">
        <a href="/clientes/adicionar" class="btn btn-success">
            ➕ Novo Cleinte
        </a>
    </div>

    <!-- Tabela de Clientes -->
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
                <?php if (!empty($clientes)) : ?>
                    <?php foreach ($clientes as $p) : ?>
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
                                <a href="/clientes/detalhes/<?= $p['id'] ?>" class="btn btn-sm btn-primary">
                                    🔍 Detalhes
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Nenhum cliente registrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>