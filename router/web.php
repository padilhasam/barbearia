<?php

// ================= PÁGINA INICIAL =================
$router->add('GET', '/', function() {
    session_start();

    if (isset($_SESSION['cliente_id'])) {
        header('Location:' . BASE_URL . '/clientes/index');
    } else {
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
$router->add('GET', '/clientes/index', 'ClienteController@index');
$router->add('GET', '/clientes/agendamentos', 'ClienteController@agendamentos');
$router->add('GET', '/clientes/perfil', 'ClienteController@perfil');

// ================= USUÁRIOS ADMIN =================
$router->add('GET', '/usuarios/login', 'UsuarioController@login');
$router->add('POST', '/usuarios/login', 'UsuarioController@authenticate');
$router->add('GET', '/usuarios/logout', 'UsuarioController@logout');
$router->add('GET', '/usuarios/register', 'UsuarioController@register');
$router->add('POST', '/usuarios/store', 'UsuarioController@store');
$router->add('GET', '/usuarios/perfil', 'UsuarioController@perfil');
$router->add('POST', '/usuarios/atualizar-perfil', 'UsuarioController@atualizarPerfil');

// ================= AGENDAMENTOS ADMIN =================
$router->add('GET', '/admin/agendamentos', 'AgendamentoController@index');
$router->add('GET', '/admin/agendamentos/adicionar', 'AgendamentoController@adicionar');
$router->add('POST', '/admin/agendamentos/salvar', 'AgendamentoController@salvar');
$router->add('GET', '/admin/agendamentos/editar/{id}', 'AgendamentoController@editar');
$router->add('POST', '/admin/agendamentos/atualizar/{id}', 'AgendamentoController@atualizar');
$router->add('GET', '/admin/agendamentos/excluir/{id}', 'AgendamentoController@excluir');

// ================= CAIXA / PAGAMENTOS =================
$router->add('GET', '/caixa', 'CaixaController@index');
$router->add('GET', '/caixa/adicionar', 'CaixaController@adicionar');
$router->add('POST', '/caixa/salvar', 'CaixaController@salvar');
$router->add('GET', '/caixa/movimentacoes/{id}', 'CaixaController@movimentacoes');
$router->add('POST', '/caixa/adicionar-movimentacao/{id}', 'CaixaController@adicionarMovimentacao');

// ================= SERVIÇOS =================
$router->add('GET', '/servicos', 'ServicoController@index');
$router->add('GET', '/servicos/adicionar', 'ServicoController@adicionar');
$router->add('POST', '/servicos/salvar', 'ServicoController@salvar');
$router->add('GET', '/servicos/editar/{id}', 'ServicoController@editar');
$router->add('POST', '/servicos/atualizar/{id}', 'ServicoController@atualizar');
$router->add('GET', '/servicos/excluir/{id}', 'ServicoController@excluir');

?>
