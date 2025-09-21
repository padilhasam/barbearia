<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 450px;">
        <h3 class="card-title text-center mb-4">📝 Cadastro de Usuário</h3>

        <!-- Mensagem de erro -->
        <?php if (!empty($erro)) : ?>
            <div class="alert alert-danger"><?= $erro; ?></div>
        <?php endif; ?>

        <?php if (!empty($sucesso)) : ?>
            <div class="alert alert-success"><?= $sucesso; ?></div>
        <?php endif; ?>

        <form action="/usuarios/salvar" method="POST">

            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="(00) 00000-0000" required>
            </div>

            <!-- Senha -->
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
            </div>

            <!-- Confirmar Senha -->
            <div class="mb-3">
                <label for="confirma_senha" class="form-label">Confirmar Senha</label>
                <input type="password" name="confirma_senha" id="confirma_senha" class="form-control" placeholder="Repita a senha" required>
            </div>

            <!-- Tipo de Usuário -->
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Usuário</label>
                <select name="tipo" id="tipo" class="form-select" required>
                    <option value="">-- Selecione --</option>
                    <option value="cliente">Cliente</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <!-- Botão -->
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary">💾 Cadastrar</button>
            </div>

            <div class="text-center mt-2">
                <a href="/usuarios/login">Já tem uma conta? Faça login</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
