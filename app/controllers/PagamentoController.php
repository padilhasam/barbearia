<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Barbeiro.php';

class PagamentoController extends Controller
{
    private $pagamentoModel;
    
    public function __construct()
    {
        $this->pagamentoModel = new Servico();
    }

    // ==================== SESSÃO ====================
    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // ================= Página de serviço =================
    public function index()
    {
        $pagamentos = $this->pagamentoModel->getAll();
        $this->view('pagamentos/index', compact('pagamentos'), 'administrador');
    }
}
