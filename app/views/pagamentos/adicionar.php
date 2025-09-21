<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-4">
    <h2 class="mb-4">➕ Novo Pagamento</h2>

    <?php if (!empty($erro)) : ?>
        <div class="alert alert-danger"><?= $erro; ?></div>
    <?php endif; ?>

    <?php if (!empty($sucesso)) : ?>
        <div class="alert alert-success"><?= $sucesso; ?></div>
    <?php endif; ?>

    <form action="/pagamentos/salvar" method="POST" class="card shadow-sm p-4">
        
        <!-- Cliente -->
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" name="cliente" id="cliente" class="form-control" placeholder="Nome do cliente" required>
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Ex: Corte de cabelo, Produtos" required>
        </div>

        <!-- Valor -->
        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$)</label>
            <input type="number" name="valor" id="valor" class="form-control" step="0.01" min="0" placeholder="0,00" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">-- Selecione --</option>
                <option value="pendente">Pendente</option>
                <option value="pago">Pago</option>
            </select>
        </div>

        <!-- Data do Pagamento -->
        <div class="mb-3">
            <label for="data_pagamento" class="form-label">Data</label>
            <input type="datetime-local" name="data_pagamento" id="data_pagamento" class="form-control" value="<?= date('Y-m-d\TH:i'); ?>" required>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-between">
            <a href="/pagamentos" class="btn btn-secondary">⬅ Voltar</a>
            <button type="submit" class="btn btn-primary">💾 Salvar</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>