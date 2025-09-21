<?php
// Configurações globais do sistema

define('BASE_URL', '/barbearia/public');
define('APP_NAME', 'Barbearia Sistema');
define('APP_ENV', 'development');
date_default_timezone_set('America/Sao_Paulo');

return [
    'app_name'               => APP_NAME,
    'app_url'                => 'http://localhost/barbearia',
    'timezone'               => 'America/Sao_Paulo',
    'default_layout_admin'   => 'admin',
    'default_layout_cliente' => 'cliente',
    'items_per_page'         => 10,
];