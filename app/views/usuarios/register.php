<?php
require_once __DIR__ . '/../layouts/administrador/header.php'; 

$editar = isset($usuario);
$acao = $editar ? '/admin/usuarios/atualizar/' . $usuario['id'] : '/admin/usuarios/store';
?>

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-light"><?= $editar ? 'Editar Usuário' : 'Cadastrar Usuário' ?></h3>
        <a href="/admin/usuarios" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i>Voltar
        </a>
    </div>

    <div class="card bg-dark text-light border-secondary shadow-sm" style="max-width: 600px; margin: auto;">
        <div class="card-body p-4">
            <form action="<?= $acao ?>" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control bg-dark text-light border-secondary" id="nome" name="nome" 
                           value="<?= $editar ? htmlspecialchars($usuario['nome']) : '' ?>" 
                           placeholder="Digite o nome completo" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control bg-dark text-light border-secondary" id="email" name="email" 
                           value="<?= $editar ? htmlspecialchars($usuario['email']) : '' ?>" 
                           placeholder="exemplo@dominio.com" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha <?= $editar ? '(preencha apenas para alterar)' : '' ?></label>
                    <input type="password" class="form-control bg-dark text-light border-secondary" id="senha" name="senha" 
                           placeholder="<?= $editar ? 'Nova senha' : 'Digite a senha' ?>" <?= $editar ? '' : 'required' ?>>
                </div>

                <div class="mb-3">
                    <label for="perfil" class="form-label">Perfil</label>
                    <select class="form-select bg-dark text-light border-secondary" id="perfil" name="perfil" required>
                        <option value="ADMIN" <?= $editar && $usuario['perfil'] === 'ADMIN' ? 'selected' : '' ?>>Administrador</option>
                        <option value="BARBEIRO" <?= $editar && $usuario['perfil'] === 'BARBEIRO' ? 'selected' : '' ?>>Barbeiro</option>
                        <option value="ATENDENTE" <?= $editar && $usuario['perfil'] === 'ATENDENTE' ? 'selected' : '' ?>>Atendente</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select bg-dark text-light border-secondary" id="status" name="status" required>
                        <option value="ATIVO" <?= $editar && $usuario['status'] === 'ATIVO' ? 'selected' : '' ?>>Ativo</option>
                        <option value="BLOQUEADO" <?= $editar && $usuario['status'] === 'BLOQUEADO' ? 'selected' : '' ?>>Bloqueado</option>
                        <option value="FERIAS" <?= $editar && $usuario['status'] === 'FERIAS' ? 'selected' : '' ?>>Férias</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2">
                        <i class="bi bi-check-lg me-1"></i><?= $editar ? 'Atualizar' : 'Salvar' ?>
                    </button>
                    <a href="/admin/usuarios" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</div>

<?php
require_once __DIR__ . '/../layouts/administrador/footer.php'; 
?>
