<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/barbearia/public/css/style.css">
    <link rel="stylesheet" href="/barbearia/public/css/register-user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark text-light d-flex flex-column min-vh-100">

    <main class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg p-4 rounded" style="max-width: 420px; width: 100%; background-color: #1e1e1e; color: #f5f5dc;">
            <h2 class="text-center mb-4">Cadastrar Usuário</h2>

            <form method="POST" action="/usuarios/store">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control bg-dark text-light border-secondary" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control bg-dark text-light border-secondary" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control bg-dark text-light border-secondary" required>
                </div>

                <div class="mb-3">
                    <label for="perfil" class="form-label">Perfil</label>
                    <select name="perfil" id="perfil" class="form-select bg-dark text-light border-secondary">
                        <option value="ADMIN">Admin</option>
                        <option value="BARBEIRO" selected>Barbeiro</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select bg-dark text-light border-secondary">
                        <option value="ATIVO" selected>Ativo</option>
                        <option value="INATIVO">Inativo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-light w-100 mb-2">Cadastrar</button>
                <a href="/usuarios/login" class="btn btn-outline-light w-100">Voltar para Login</a>
            </form>
        </div>
    </main>

    <footer class="bg-black text-light text-center py-3 mt-auto small">
        <div class="mb-2">&copy; <?= date('Y'); ?> Tonkelski Barber Shop - Todos os direitos reservados</div>
        <div class="d-flex justify-content-center gap-3">
            <a href="https://www.instagram.com/sua_barbearia" target="_blank" class="text-light fs-5"><i class="bi bi-instagram"></i></a>
            <a href="https://www.facebook.com/sua_barbearia" target="_blank" class="text-light fs-5"><i class="bi bi-facebook"></i></a>
            <a href="https://wa.me/5511999999999" target="_blank" class="text-light fs-5"><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.tiktok.com/@sua_barbearia" target="_blank" class="text-light fs-5"><i class="bi bi-tiktok"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
