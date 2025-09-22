<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Agendamento.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Servico.php';
require_once __DIR__ . '/../models/Pagamento.php';

class DashboardController extends Controller
{
    // ==================== SESSÃO ====================
    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // ==================== LOGIN ====================
    public function login()
    {
        $this->startSession();

        $erro = $_SESSION['login_erro'] ?? '';
        unset($_SESSION['login_erro']);

        // Renderiza view de login sem layout
        $this->view('dashboard/login', ['erro' => $erro], null);
    }

    // ==================== AUTENTICAÇÃO ====================
    public function autenticar()
    {
        $this->startSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '/admin');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        $usuarioModel = new Usuario(); 
        $usuario = $usuarioModel->findByEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            if ($usuario['perfil'] === 'ADMIN' && $usuario['status'] === 'ATIVO') {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_usuario'] = $usuario['nome'];
                $this->redirect(BASE_URL . '/admin/painel');
                exit;
            } else {
                $_SESSION['login_erro'] = "Acesso negado: usuário não é admin ou está inativo.";
            }
        } else {
            $_SESSION['login_erro'] = "Email ou senha incorretos.";
        }

        $this->redirect(BASE_URL . '/admin');
        exit;
    }

    // ==================== PAINEL ====================
    public function painel()
    {
        $this->startSession();

        if (!isset($_SESSION['admin_logged_in'])) {
            $this->redirect(BASE_URL . '/admin');
            exit;
        }

        $usuario = $_SESSION['admin_usuario'] ?? 'Admin';

        // Instancia a model de agendamentos
        $agendamentoModel = $this->model('Agendamento');
        $agendamentos = $agendamentoModel->getAll(); // método correto

        // Totalizadores
        $totalClientes = count($this->model('Cliente')->getAll());
        $agendamentosHoje = count(array_filter($agendamentos, function($a) {
            return $a['data'] === date('Y-m-d');
        }));
        $servicosAtivos = count($this->model('Servico')->getAll());
        $receitaHoje = $this->model('Pagamento')->getReceitaHoje();

        // Renderiza a view do painel dentro do layout administrador
        $this->view('dashboard/painel', [
            'usuario' => $usuario,
            'agendamentos' => $agendamentos,
            'totalClientes' => $totalClientes,
            'agendamentosHoje' => $agendamentosHoje,
            'servicosAtivos' => $servicosAtivos,
            'receitaHoje' => $receitaHoje
        ], 'administrador');
    }

    // ==================== LOGOUT ====================
    public function logout()
    {
        $this->startSession();

        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        $this->redirect(BASE_URL . '/admin');
        exit;
    }
}
