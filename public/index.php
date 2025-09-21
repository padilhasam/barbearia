<?php
// ================== SESSÃO ==================
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ================== CONFIGURAÇÕES ==================
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

// ================== AUTOLOAD ==================
spl_autoload_register(function($class) {
    $paths = [
        __DIR__ . '/../core/',
        __DIR__ . '/../app/controllers/',
        __DIR__ . '/../app/models/',
        __DIR__ . '/../app/helpers/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// ================== INICIALIZA ROUTER ==================
$router = new Router();

// ================== CARREGA ROTAS ==================
require_once __DIR__ . '/../router/web.php';

// ================== PEGA URL E MÉTODO ==================
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// ================== AJUSTE PARA SUBPASTA ==================
$basePath = '/barbearia/public';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Garante que a URI sempre comece com /
$uri = '/' . ltrim($uri, '/');

// ================== DISPATCH ==================
$router->dispatch($method, $uri);
