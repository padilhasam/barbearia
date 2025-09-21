<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-4">
    <h2 class="mb-4">✏ Editar Serviço</h2>

    <?php if (!empty($erro)) : ?>
        <div class="alert alert-danger"><?= $erro; ?></div>
    <?php endif; ?>

    <form action="/servicos/atualizar/<?= $servico['idServicos']; ?>" method="POST" class="card shadow-sm p-4">

        <!-- Nome do Serviço -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Serviço</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($servico['nome']); ?>" required>
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required><?= htmlspecialchars($servico['descricao']); ?></textarea>
        </div>

        <!-- Preço -->
        <div class="mb-3">
            <label for="preco" class="form-label">Preço (R$)</label>
            <input type="number" name="preco" id="preco" class="form-control" step="0.01" value="<?= number_format($servico['preco'], 2, '.', ''); ?>" required>
        </div>

        <!-- Duração -->
        <div class="mb-3">
            <label for="duracao" class="form-label">Duração (minutos)</label>
            <input type="number" name="duracao" id="duracao" class="form-control" value="<?= htmlspecialchars($servico['duracao']); ?>" required>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-between">
            <a href="/servicos" class="btn btn-secondary">⬅ Voltar</a>
            <button type="submit" class="btn btn-primary">💾 Salvar Alterações</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
