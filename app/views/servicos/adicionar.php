<?php require_once '../app/views/layouts/header.php'; ?>
<?php require_once '../app/views/layouts/cliente.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Lista de Serviços</h2>
        <a href="create.php" class="btn btn-primary">+ Novo Serviço</a>
    </div>

    <?php if (!empty($servicos)): ?>
        <table class="table table-striped table-hover">
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
                <?php foreach ($servicos as $servico): ?>
                    <tr>
                        <td><?= htmlspecialchars($servico['idServicos']) ?></td>
                        <td><?= htmlspecialchars($servico['nome']) ?></td>
                        <td><?= htmlspecialchars($servico['descricao']) ?></td>
                        <td>R$ <?= number_format($servico['preco'], 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($servico['duracao']) ?> min</td>
                        <td>
                            <a href="edit.php?id=<?= $servico['idServicos'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="show.php?id=<?= $servico['idServicos'] ?>" class="btn btn-info btn-sm">Detalhes</a>
                            <a href="delete.php?id=<?= $servico['idServicos'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este serviço?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Nenhum serviço cadastrado até o momento.</div>
    <?php endif; ?>
</div>

<?php require_once '../app/views/layouts/footer.php'; ?>