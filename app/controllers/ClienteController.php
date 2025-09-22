<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../helpers/SessionHelper.php';

class ClienteController extends Controller
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

        if (isset($_SESSION['cliente_id'])) {
            $this->redirect(BASE_URL . '/clientes/index');
            exit;
        }

        $erro = $_SESSION['login_erro'] ?? '';
        unset($_SESSION['login_erro']);

        $this->view('clientes/login', ['erro' => $erro], null); // layout null
    }

    public function authenticate()
    {
        $this->startSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '/clientes/login');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (empty($email) || empty($senha)) {
            $_SESSION['login_erro'] = 'E-mail ou senha incorretos';
            $this->redirect(BASE_URL . '/clientes/login');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['login_erro'] = 'E-mail inválido';
            $this->redirect(BASE_URL . '/clientes/login');
            exit;
        }

        $clienteModel = $this->model('Cliente');
        $cliente = $clienteModel->findByEmail($email);

        if ($cliente && password_verify($senha, $cliente['senha'])) {
            $_SESSION['cliente_id'] = $cliente['id'];
            $_SESSION['cliente_nome'] = $cliente['nome'];
            $this->redirect(BASE_URL . '/clientes/index');
            exit;
        } else {
            $_SESSION['login_erro'] = 'E-mail ou senha incorretos';
            $this->redirect(BASE_URL . '/clientes/login');
            exit;
        }
    }

    public function logout()
    {
        $this->startSession();

        unset($_SESSION['cliente_id'], $_SESSION['cliente_nome']);
        session_destroy();

        $this->redirect(BASE_URL . '/clientes/login');
        exit;
    }

    // ==================== DASHBOARD ====================
    public function index()
    {
        $cliente = $this->getClienteLogado();
        if (!$cliente) {
            $this->redirect(BASE_URL . '/clientes/login');
            exit;
        }

        $agendamentoModel = $this->model('Agendamento');

        $proximoAgendamento = method_exists($agendamentoModel, 'proximoDoCliente')
            ? $agendamentoModel->proximoDoCliente($cliente['id'])
            : null;

        $agendamentos = method_exists($agendamentoModel, 'getByCliente')
            ? $agendamentoModel->getByCliente($cliente['id'])
            : [];

        $this->view('layouts/cliente/cliente', [
            'cliente' => $cliente,
            'proximoAgendamento' => $proximoAgendamento,
            'agendamentos' => $agendamentos
        ], 'cliente'); // layout cliente
    }

    // ==================== REGISTRO ====================
    public function register()
    {
        $this->startSession();

        $erro = $_SESSION['register_erro'] ?? '';
        unset($_SESSION['register_erro']);

        $this->view('clientes/register', ['erro' => $erro], null);
    }

    public function store()
    {
        $this->startSession();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect(BASE_URL . '/clientes/register');
            exit;
        }

        $nome = trim($_POST['nome'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (empty($nome) || empty($telefone) || empty($senha)) {
            $_SESSION['register_erro'] = 'Preencha todos os campos obrigatórios';
            $this->redirect(BASE_URL . '/clientes/register');
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['register_erro'] = 'E-mail inválido';
            $this->redirect(BASE_URL . '/clientes/register');
            exit;
        }

        $clienteModel = $this->model('Cliente');

        if ($clienteModel->findByEmail($email)) {
            $_SESSION['register_erro'] = 'E-mail já cadastrado';
            $this->redirect(BASE_URL . '/clientes/register');
            exit;
        }

        if ($clienteModel->findByTelefone($telefone)) {
            $_SESSION['register_erro'] = 'Telefone já cadastrado';
            $this->redirect(BASE_URL . '/clientes/register');
            exit;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $clienteModel->create([
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email,
            'senha' => $senhaHash
        ]);

        $_SESSION['register_success'] = 'Registro realizado com sucesso! Faça login para acessar sua conta.';
        $this->redirect(BASE_URL . '/clientes/login');
        exit;
    }

    // ==================== AGENDAMENTOS ====================
    public function agendamentos()
    {
        $cliente = $this->getClienteLogado();
        if (!$cliente) {
            $this->redirect(BASE_URL . '/clientes/login');
            exit;
        }

        $agendamentoModel = $this->model('Agendamento');
        $agendamentos = method_exists($agendamentoModel, 'getByCliente')
            ? $agendamentoModel->getByCliente($cliente['id'])
            : [];

        $this->view('clientes/agendamentos', [
            'cliente' => $cliente,
            'agendamentos' => $agendamentos
        ], 'cliente');
    }

    // ==================== PERFIL ====================
    public function perfil()
    {
        $cliente = $this->getClienteLogado();
        if (!$cliente) {
            $this->redirect(BASE_URL . '/clientes/login');
            exit;
        }

        $this->view('clientes/perfil', ['cliente' => $cliente], 'cliente');
    }

    // ==================== AUXILIAR ====================
    private function getClienteLogado()
    {
        $this->startSession();

        if (!isset($_SESSION['cliente_id'])) return null;

        $clienteModel = $this->model('Cliente');
        return $clienteModel->find($_SESSION['cliente_id']);
    }
}