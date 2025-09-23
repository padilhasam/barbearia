<?php
require_once __DIR__ . '/../layouts/administrador/header.php'; 
?>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Usuários Cadastrados</h3>
        <a href="<?= BASE_URL ?>/admin/usuarios/register" class="btn btn-success">
            <i class="bi bi-person-plus-fill me-2"></i>Adicionar Usuário
        </a>
    </div>

    <div class="card bg-dark text-light shadow-sm">
        <div class="card-body p-3">

            <div class="table-responsive">
                <table class="table table-dark table-striped align-middle mb-0">
                    <thead class="table-secondary text-dark d-none d-md-table-header-group">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr class="d-block d-md-table-row mb-3 mb-md-0 p-2 p-md-0 border rounded border-secondary">
                                    <td data-label="ID"><?= htmlspecialchars($usuario['id']) ?></td>
                                    <td data-label="Nome"><?= htmlspecialchars($usuario['nome']) ?></td>
                                    <td data-label="Email"><?= htmlspecialchars($usuario['email']) ?></td>
                                    <td data-label="Perfil"><?= htmlspecialchars($usuario['perfil']) ?></td>
                                    <td data-label="Status">
                                        <?php if($usuario['status'] === 'ATIVO'): ?>
                                            <span class="badge bg-success"><?= $usuario['status'] ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-danger"><?= $usuario['status'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="Criado em"><?= htmlspecialchars($usuario['created_at']) ?></td>
                                    <td data-label="Ações">
                                        <a href="<?= BASE_URL ?>/admin/usuarios/editar/<?= $usuario['id'] ?>" class="btn btn-sm btn-primary me-1 mb-1 mb-md-0">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="<?= BASE_URL ?>/admin/usuarios/excluir/<?= $usuario['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este usuário?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-3">Nenhum usuário cadastrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<?php
require_once __DIR__ . '/../layouts/administrador/footer.php'; 
?>
