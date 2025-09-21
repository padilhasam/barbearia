<?php

class AuthController extends Controller {

    public function __construct() {
        // Inicia sessão se ainda não foi iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Verifica se o usuário está logado.
     * Redireciona para a tela de login caso não esteja.
     * Use apenas nos métodos que precisam de autenticação.
     */
    protected function checkLogin() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    }

    // =================== MÉTODOS PÚBLICOS ===================

    // Exemplo de página de login (não exige sessão)
    public function login() {
        $erro = $_SESSION['login_erro'] ?? '';
        unset($_SESSION['login_erro']);

        $this->view('auth/login', ['erro' => $erro], null); // layout null
    }

    // Exemplo de logout (precisa de sessão)
    public function logout() {
        $this->checkLogin();

        // Limpa sessão
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header("Location: " . BASE_URL . "/login");
        exit;
    }

    // Exemplo de página protegida (dashboard)
    public function painel() {
        $this->checkLogin();

        $usuarioNome = $_SESSION['usuario_nome'] ?? 'Usuário';
        $this->view('auth/painel', ['usuario' => $usuarioNome], 'admin');
    }
}
