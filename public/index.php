<?php
    // Inicia sessão se ainda não estiver iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // ================== CONFIGURAÇÕES ==================
    require_once __DIR__ . '/../config/config.php';
    require_once __DIR__ . '/../config/database.php';

    // ================== CORE ==================
    require_once __DIR__ . '/../core/Router.php';
    require_once __DIR__ . '/../core/Controller.php';

    // ================== INICIALIZA ROUTER ==================
    $router = new Router();

    // ================== CARREGA ROTAS ==================
    require_once __DIR__ . '/../router/web.php';

    // ================== PEGA URL E MÉTODO ==================
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];

    // ================== AJUSTE PARA SUBPASTA ==================
    // Defina o caminho base do projeto (substitua se necessário)
    $basePath = '/barbearia/public';
    if (strpos($uri, $basePath) === 0) {
        $uri = substr($uri, strlen($basePath));
    }

    // Garante que a URI sempre comece com /
    $uri = '/' . ltrim($uri, '/');

    // ================== DISPATCH ==================
    $router->dispatch($method, $uri);