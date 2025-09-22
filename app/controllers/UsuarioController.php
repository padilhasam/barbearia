<?php

class UsuarioController extends Controller
{
    // ==================== LOGIN ====================
    public function login()
    {
        $this->view('usuarios/login', [], 'administrador');
    }

    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $usuarioModel = $this->model('Usuario');
        $usuario = $usuarioModel->findByEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['nome'];
            $this->redirect(BASE_URL . '/admin/usuarios');
        } else {
            $erro = "E-mail ou senha inválidos!";
            $this->view('usuarios/login', ['erro' => $erro], 'administrador');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect(BASE_URL . '/admin');
    }

    // ==================== CADASTRO ====================
    public function register()
    {
        $this->view('usuarios/register', [], 'administrador');
    }

    public function store()
    {
        $nome   = trim($_POST['nome']);
        $email  = trim($_POST['email']);
        $senha  = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $perfil = $_POST['perfil'] ?? 'BARBEIRO';
        $status = $_POST['status'] ?? 'ATIVO';

        $usuarioModel = $this->model('Usuario');
        $usuarioModel->create([
            'nome'   => $nome,
            'email'  => $email,
            'senha'  => $senha,
            'perfil' => $perfil,
            'status' => $status
        ]);

        $this->redirect(BASE_URL . '/admin/usuarios');
    }

    // ==================== LISTAGEM ====================
    public function index()
    {
        $usuarioModel = $this->model('Usuario');
        $usuarios = $usuarioModel->all(); // Lista todos os usuários do banco

        $this->view('usuarios/index', ['usuarios' => $usuarios], 'administrador');
    }

    // ==================== EDIÇÃO ====================
    public function edit($id)
    {
        $usuarioModel = $this->model('Usuario');
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            $this->redirect(BASE_URL . '/admin/usuarios');
        }

        $this->view('usuarios/register', ['usuario' => $usuario], 'administrador');
    }

    public function update($id)
    {
        $usuarioModel = $this->model('Usuario');

        $data = [
            'nome'   => trim($_POST['nome']),
            'email'  => trim($_POST['email']),
            'senha'  => password_hash($_POST['senha'], PASSWORD_DEFAULT),
            'perfil' => $_POST['perfil'] ?? 'BARBEIRO',
            'status' => $_POST['status'] ?? 'ATIVO'
        ];

        $usuarioModel->update($id, $data);

        $this->redirect(BASE_URL . '/admin/usuarios');
    }

    // ==================== EXCLUSÃO ====================
    public function delete($id)
    {
        $usuarioModel = $this->model('Usuario');
        $usuarioModel->delete($id);

        $this->redirect(BASE_URL . '/admin/usuarios');
    }
}
