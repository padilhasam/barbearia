<?php
    require_once '../core/Controller.php';

    class AdminController extends Controller {
        
        // Método para exibir o painel
        public function index() {
            // Carrega a view do painel admin
            $this->view('layouts/admin'); // usando a view layouts/admin.php
        }
    }
    
?>