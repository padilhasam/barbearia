<?php
// Inicia sessão caso não esteja ativa
if (session_status() === PHP_SESSION_NONE) session_start();

// ================= PÁGINA INICIAL =================
$router->add('GET', '/', function() {
    if (isset($_SESSION['usuario'])) {
        // Admin logado
        header('Location: ' . BASE_URL . '/admin/painel');
    } elseif (isset($_SESSION['cliente_id'])) {
        // Cliente logado
        header('Location: ' . BASE_URL . '/clientes/index');
    } else {
        // Visitante
        header('Location: ' . BASE_URL . '/clientes/login');
    }
    exit;
});

// ================= CLIENTES =================
$router->add('GET', '/clientes/login', 'ClienteController@login');
$router->add('POST', '/clientes/login', 'ClienteController@authenticate');
$router->add('GET', '/clientes/register', 'ClienteController@register');
$router->add('POST', '/clientes/register', 'ClienteController@store');
$router->add('GET', '/clientes/logout', 'ClienteController@logout');
$router->add('GET', '/clientes/index', 'ClienteController@index'); // Dashboard cliente
$router->add('GET', '/clientes/agendamentos', 'ClienteController@agendamentos');
$router->add('GET', '/clientes/perfil', 'ClienteController@perfil');

// ================= PAINEL ADMIN =================
$router->add('GET', '/admin', 'DashboardController@login');            // Tela login admin
$router->add('POST', '/admin/login', 'DashboardController@autenticar'); // Autenticação admin
$router->add('GET', '/admin/painel', 'DashboardController@painel');    // Dashboard/admin.php
$router->add('GET', '/admin/logout', 'DashboardController@logout');     // Logout

// ================= USUÁRIOS ADMIN =================
$router->add('GET', '/admin/usuarios', 'UsuarioController@index');            // Listar usuários
$router->add('GET', '/admin/usuarios/register', 'UsuarioController@register'); // Formulário cadastro
$router->add('POST', '/admin/usuarios/store', 'UsuarioController@store');       // Salvar usuário
$router->add('GET', '/admin/usuarios/editar/{id}', 'UsuarioController@edit');   // Editar usuário
$router->add('POST', '/admin/usuarios/atualizar/{id}', 'UsuarioController@update'); // Atualizar usuário
$router->add('GET', '/admin/usuarios/excluir/{id}', 'UsuarioController@delete');    // Excluir usuário

// ================= AGENDAMENTOS ADMIN =================
$router->add('GET', '/admin/agendamentos', 'AgendamentoController@index');
$router->add('GET', '/admin/agendamentos/adicionar', 'AgendamentoController@adicionar');
$router->add('POST', '/admin/agendamentos/salvar', 'AgendamentoController@salvar');
$router->add('GET', '/admin/agendamentos/editar/{id}', 'AgendamentoController@editar');
$router->add('POST', '/admin/agendamentos/atualizar/{id}', 'AgendamentoController@atualizar');
$router->add('GET', '/admin/agendamentos/excluir/{id}', 'AgendamentoController@excluir');

// ================= CAIXA / PAGAMENTOS ADMIN =================
$router->add('GET', '/admin/caixa', 'CaixaController@index');
$router->add('GET', '/admin/caixa/adicionar', 'CaixaController@adicionar');
$router->add('POST', '/admin/caixa/salvar', 'CaixaController@salvar');
$router->add('GET', '/admin/caixa/movimentacoes/{id}', 'CaixaController@movimentacoes');
$router->add('POST', '/admin/caixa/adicionar-movimentacao/{id}', 'CaixaController@adicionarMovimentacao');

// ================= SERVIÇOS ADMIN =================
$router->add('GET', '/admin/servicos', 'ServicoController@index');
$router->add('GET', '/admin/servicos/adicionar', 'ServicoController@adicionar');
$router->add('POST', '/admin/servicos/salvar', 'ServicoController@salvar');
$router->add('GET', '/admin/servicos/editar/{id}', 'ServicoController@editar');
$router->add('POST', '/admin/servicos/atualizar/{id}', 'ServicoController@atualizar');
$router->add('GET', '/admin/servicos/excluir/{id}', 'ServicoController@excluir');

?>