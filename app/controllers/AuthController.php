<?php
require_once __DIR__ . '/Controller.php';

class AuthController extends Controller
{
    public function loginCliente()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (isset($_SESSION['cliente_id'])) {
            $this->redirect(BASE_URL . '/clientes/index');
        }

        $erro = $_SESSION['login_erro'] ?? '';
        unset($_SESSION['login_erro']);

        $this->view('clientes/login', ['erro' => $erro], false); // sem layout admin
    }

    public function authenticateCliente()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $clienteModel = $this->model('Cliente');
        $cliente = $clienteModel->findByEmail($email);

        if ($cliente && password_verify($senha, $cliente['senha'])) {
            $_SESSION['cliente_id'] = $cliente['id'];
            $this->redirect(BASE_URL . '/clientes/index');
        } else {
            $_SESSION['login_erro'] = 'E-mail ou senha incorretos';
            $this->redirect(BASE_URL . '/clientes/login');
        }
    }

    public function logoutCliente()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        session_destroy();
        $this->redirect(BASE_URL . '/clientes/login');
    }

    public function loginAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (isset($_SESSION['usuario_id'])) {
            $this->redirect(BASE_URL . '/usuarios/index');
        }

        $erro = $_SESSION['login_erro'] ?? '';
        unset($_SESSION['login_erro']);

        $this->view('usuarios/login', ['erro' => $erro], false); // sem layout cliente
    }

    public function authenticateAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuarioModel = $this->model('Usuario');
        $usuario = $usuarioModel->findByEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $this->redirect(BASE_URL . '/usuarios/index');
        } else {
            $_SESSION['login_erro'] = 'E-mail ou senha incorretos';
            $this->redirect(BASE_URL . '/usuarios/login');
        }
    }

    public function logoutAdmin()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        session_destroy();
        $this->redirect(BASE_URL . '/usuarios/login');
    }
}
