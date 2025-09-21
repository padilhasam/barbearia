<?php require_once '../views/layouts/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Barbeiros</h2>
        <a href="create.php" class="btn btn-primary">+ Novo Barbeiro</a>
    </div>

    <?php if (!empty($barbeiros)): ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>Telefone</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barbeiros as $barbeiro): ?>
                    <tr>
                        <td><?= $barbeiro['id'] ?></td>
                        <td><?= htmlspecialchars($barbeiro['nome']) ?></td>
                        <td><?= htmlspecialchars($barbeiro['especialidade']) ?></td>
                        <td><?= htmlspecialchars($barbeiro['telefone']) ?></td>
                        <td>
                            <?php if ($barbeiro['status'] === 'ATIVO'): ?>
                                <span class="badge bg-success">Ativo</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Inativo</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $barbeiro['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="delete.php?id=<?= $barbeiro['id'] ?>" class="btn btn-sm btn-danger" 
                               onclick="return confirm('Tem certeza que deseja excluir este barbeiro?');">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Nenhum barbeiro cadastrado.</div>
    <?php endif; ?>
</div>

<?php require_once '../views/layouts/footer.php'; ?>
