<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Barbeiro.php';

class BarbeiroController extends Controller
{
    private $barbeiroModel;
    
    public function __construct()
    {
        $this->barbeiroModel = new Servico();
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
        $barbeiros = $this->barbeiroModel->getAll();
        $this->view('barbeiros/index', compact('barbeiros'), 'administrador');
    }
}
