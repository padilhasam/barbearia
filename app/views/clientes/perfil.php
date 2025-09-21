<h1 class="mb-4">Meu Perfil</h1>

<form action="/usuarios/atualizar-perfil" method="POST">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" value="<?= $cliente['nome'] ?? ''; ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= $cliente['email'] ?? ''; ?>" required>
    </div>

    <div class="mb-3">
        <label for="senha" class="form-label">Nova Senha (opcional)</label>
        <input type="password" name="senha" id="senha" class="form-control" placeholder="Deixe em branco para não alterar">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
</form>