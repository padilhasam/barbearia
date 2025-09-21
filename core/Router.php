<?php

class Router
{
    private array $routes = [];

    /**
     * Adiciona uma rota
     */
    public function add(string $method, string $pattern, $callback): void
    {
        $this->routes[] = [
            'method'   => strtoupper($method),
            'pattern'  => $this->convertPattern($pattern),
            'callback' => $callback
        ];
    }

    /**
     * Converte padrões como {id} para regex
     */
    private function convertPattern(string $pattern): string
    {
        $pattern = preg_replace('#\{([a-zA-Z0-9_]+)\}#', '(?P<\1>[a-zA-Z0-9_-]+)', $pattern);
        return '#^' . $pattern . '$#';
    }

    /**
     * Dispara a rota correspondente
     */
    public function dispatch(string $method, string $uri)
    {
        // Remove query string
        $uri = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            if (preg_match($route['pattern'], $uri, $matches)) {
                // Captura apenas parâmetros nomeados {id}, {slug}, etc.
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                if (is_callable($route['callback'])) {
                    return call_user_func_array($route['callback'], $params);
                }

                if (is_string($route['callback'])) {
                    return $this->callController($route['callback'], $params);
                }
            }
        }

        // Página não encontrada
        http_response_code(404);
        echo "Página não encontrada!";
        exit;
    }

    /**
     * Chama Controller@metodo
     */
    private function callController(string $callback, array $params = [])
    {
        [$controller, $method] = explode('@', $callback);

        $controllerFile = __DIR__ . '/../app/controllers/' . $controller . '.php';

        if (!file_exists($controllerFile)) {
            throw new Exception("Controller {$controller} não encontrado.");
        }

        require_once $controllerFile;

        if (!class_exists($controller)) {
            throw new Exception("Classe {$controller} não existe.");
        }

        // Permite passar $routeParams ao construtor se necessário
        $controllerInstance = new $controller($params);

        if (!method_exists($controllerInstance, $method)) {
            throw new Exception("Método {$method} não encontrado no controller {$controller}.");
        }

        return call_user_func_array([$controllerInstance, $method], $params);
    }
}
