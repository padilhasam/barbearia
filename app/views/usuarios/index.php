<?php
require_once __DIR__ . '/../layouts/administrador/header.php'; 
?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Usuários Cadastrados</h3>
        <a href="/admin/usuarios/register" class="btn btn-success">
            <i class="bi bi-person-plus-fill me-2"></i>Adicionar Usuário
        </a>
    </div>

    <div class="card bg-dark text-light shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover align-middle">
                    <thead class="table-secondary text-dark">
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
                                <tr>
                                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                                    <td><?= htmlspecialchars($usuario['perfil']) ?></td>
                                    <td>
                                        <?php if($usuario['status'] === 'ATIVO'): ?>
                                            <span class="badge bg-success"><?= $usuario['status'] ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-danger"><?= $usuario['status'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($usuario['created_at']) ?></td>
                                    <td>
                                        <a href="/admin/usuarios/editar/<?= $usuario['id'] ?>" class="btn btn-sm btn-primary me-1">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="/admin/usuarios/excluir/<?= $usuario['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este usuário?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Nenhum usuário cadastrado.</td>
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