<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-4">
    <h2 class="mb-4">💈 Serviços</h2>

    <!-- Botão Novo Serviço -->
    <div class="mb-3">
        <a href="/servicos/adicionar" class="btn btn-success">
            ➕ Novo Serviço
        </a>
    </div>

    <!-- Tabela de Serviços -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Duração</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($servicos)) : ?>
                    <?php foreach ($servicos as $s) : ?>
                        <tr>
                            <td><?= $s['id'] ?></td>
                            <td><?= htmlspecialchars($s['nome']); ?></td>
                            <td><?= htmlspecialchars($s['descricao']); ?></td>
                            <td>R$ <?= number_format($s['preco'], 2, ',', '.'); ?></td>
                            <td><?= $s['duracao']; ?> min</td>
                            <td>
                                <a href="/servicos/editar/<?= $s['id'] ?>" class="btn btn-sm btn-warning">
                                    ✏ Editar
                                </a>
                                <a href="/servicos/excluir/<?= $s['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este serviço?')">
                                    🗑 Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhum serviço cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
