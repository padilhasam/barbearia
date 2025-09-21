<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-4">
    <h2 class="mb-4">🔍 Detalhes do Pagamento</h2>

    <?php if (!empty($pagamento)) : ?>
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">
                    Cliente: <?= htmlspecialchars($pagamento['cliente']); ?>
                </h5>

                <p class="card-text"><strong>ID:</strong> <?= $pagamento['id']; ?></p>
                <p class="card-text"><strong>Descrição:</strong> <?= htmlspecialchars($pagamento['descricao']); ?></p>
                <p class="card-text"><strong>Valor:</strong> R$ <?= number_format($pagamento['valor'], 2, ',', '.'); ?></p>
                <p class="card-text"><strong>Status:</strong> 
                    <span class="badge <?= $pagamento['status'] === 'pago' ? 'bg-success' : 'bg-warning'; ?>">
                        <?= ucfirst($pagamento['status']); ?>
                    </span>
                </p>
                <p class="card-text"><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($pagamento['data_pagamento'])); ?></p>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-warning">Pagamento não encontrado.</div>
    <?php endif; ?>

    <a href="/pagamentos" class="btn btn-secondary mt-3">⬅ Voltar</a>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
