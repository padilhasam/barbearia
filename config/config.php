<?php
// Configurações globais do sistema

define('BASE_URL', '/barbearia/public');  // URL base do projeto
define('APP_NAME', 'Tonkelski Barber Shop'); // Nome do aplicativo
define('APP_ENV', 'development'); // Ambiente: development | production
date_default_timezone_set('America/Sao_Paulo');

return [
    'app_name'               => APP_NAME,
    'app_url'                => 'http://localhost' . BASE_URL, // usa BASE_URL dinamicamente
    'environment'            => APP_ENV,
    'timezone'               => 'America/Sao_Paulo',
    'default_layout_admin'   => 'admin',
    'default_layout_cliente' => 'cliente',
    'items_per_page'         => 10,
];
