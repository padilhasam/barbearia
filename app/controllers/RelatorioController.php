<?php

require_once __DIR__ . '/../../core/Controller.php';

class RelatorioController extends Controller
{
    // private $servicoModel;

    public function __construct()
    {
        // $this->servicoModel = new Servico();
    }

    // ==================== SESSÃO ====================
    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // ================= Página de relatoiros =================
    public function index()
    {
        $servicos = '';
        $this->view('relatorios/index', compact('servicos'), 'administrador');
    }
}
