<?php

class UsuarioController extends Controller
{
    public function login()
    {
        // Renderiza a view login
        $this->view('usuarios/login');
    }

    public function authenticate()
    {
        // Pega dados do formulário
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Exemplo simples (futuramente conectar no banco e validar)
        if ($email === 'admin@teste.com' && $senha === '123456') {
            $_SESSION['usuario'] = $email;
            header("Location: /agendamentos");
            exit;
        } else {
            $erro = "E-mail ou senha inválidos!";
            $this->view('usuarios/login', ['erro' => $erro]);
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /usuarios/login");
        exit;
    }

    public function register()
    {
        $this->view('usuarios/register');
    }

    public function store()
    {
        // Aqui vai a lógica para cadastrar no banco
        // Depois redireciona
        header("Location: /usuarios/login");
        exit;
    }
}