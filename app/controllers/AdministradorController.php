<?php

require_once __DIR__ . '/../../core/Controller.php';

class AdministradorController extends Controller
{
    // private $barbeiroModel;
    
    public function __construct()
    {
        // $this->barbeiroModel = new Servico();
    }

    // ==================== SESSÃO ====================
    private function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // ================= Página de serviço =================
    public function perfil()
    {
        // $barbeiros = $this->barbeiroModel->getAll();
        $this->view('perfil/admin', [], 'administrador');
    }
}
