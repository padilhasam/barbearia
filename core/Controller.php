<?php
class Controller
{
    /**
     * Carrega um model
     */
    public function model(string $model)
    {
        $file = __DIR__ . '/../app/models/' . $model . '.php';

        if (!file_exists($file)) {
            throw new Exception("Model {$model} não encontrado.");
        }

        require_once $file;

        if (!class_exists($model)) {
            throw new Exception("Classe do model {$model} não existe.");
        }

        return new $model();
    }

    /**
     * Redireciona para outra URL
     */
    public function redirect(string $url): void
    {
        header("Location: " . $url);
        exit;
    }

    /**
     * Renderiza uma view
     *
     * @param string $view Nome da view (ex: "clientes/login")
     * @param array $data Dados a serem passados para a view
     * @param string|null $layout Layout a ser usado: "admin", "cliente" ou null (sem layout)
     */
    public function view(string $view, array $data = [], ?string $layout = 'admin'): void
    {
        extract($data);

        $viewFile = __DIR__ . '/../app/views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            die("View {$view} não encontrada.");
        }

        // Se não tiver layout, carrega a view direto
        if ($layout === null) {
            require $viewFile;
            return;
        }

        // Monta caminho do layout
        $layoutFile = __DIR__ . '/../app/views/layouts/' . $layout . '.php';

        if (!file_exists($layoutFile)) {
            die("Layout {$layout} não encontrado.");
        }

        // O layout deve usar a variável $viewFile para incluir a view
        require $layoutFile;
    }
}
