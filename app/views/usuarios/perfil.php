<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-4">
    <h2 class="mb-4">👤 Meu Perfil</h2>

    <?php if (!empty($erro)) : ?>
        <div class="alert alert-danger"><?= $erro; ?></div>
    <?php endif; ?>

    <?php if (!empty($sucesso)) : ?>
        <div class="alert alert-success"><?= $sucesso; ?></div>
    <?php endif; ?>

    <form action="/usuarios/atualizar-perfil" method="POST" class="card shadow-sm p-4">

        <!-- Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($usuario['nome']); ?>" required>
        </div>

        <!-- Email (não editável) -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" class="form-control" value="<?= htmlspecialchars($usuario['email']); ?>" readonly>
        </div>

        <!-- Telefone -->
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="<?= htmlspecialchars($usuario['telefone']); ?>">
        </div>

        <!-- Nova Senha -->
        <div class="mb-3">
            <label for="senha" class="form-label">Nova Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Deixe em branco para não alterar">
        </div>

        <!-- Confirmar Senha -->
        <div class="mb-3">
            <label for="confirma_senha" class="form-label">Confirmar Nova Senha</label>
            <input type="password" name="confirma_senha" id="confirma_senha" class="form-control" placeholder="Repita a senha">
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-between">
            <a href="/dashboard" class="btn btn-secondary">⬅ Voltar</a>
            <button type="submit" class="btn btn-primary">💾 Salvar Alterações</button>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
