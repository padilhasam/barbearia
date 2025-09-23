<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Agendamento.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Servico.php';
require_once __DIR__ . '/../models/Barbeiro.php';

class AgendamentoController extends Controller
{
    private $agendamentoModel;
    private $clienteModel;
    private $servicoModel;
    private $barbeiroModel;

    public function __construct()
    {
        $this->agendamentoModel = new Agendamento();
        $this->clienteModel = new Cliente();
        $this->servicoModel = new Servico();
        $this->barbeiroModel = new Barbeiro();
    }

    // ================= Lista todos os agendamentos =================
    public function index()
    {
        $agendamentos = $this->agendamentoModel->getAll();
        $this->view('agendamentos/index', compact('agendamentos'), 'administrador');
    }

    // ================= Formulário para criar novo agendamento =================
    public function create()
    {
        $clientes = $this->clienteModel->getAll();
        $servicos = $this->servicoModel->getAll();
        $barbeiros = $this->barbeiroModel->getAll();
        $this->view('agendamentos/create', compact('clientes', 'servicos', 'barbeiros'));
    }

    // ================= Salvar novo agendamento =================
    public function store()
    {
        $data = [
            'cliente_id' => $_POST['cliente_id'],
            'servico_id' => $_POST['servico_id'],
            'barbeiro_id'=> $_POST['barbeiro_id'],
            'data'       => $_POST['data'],
            'hora'       => $_POST['hora'],
            'status'     => $_POST['status'] ?? 'PENDENTE'
        ];

        // Verifica conflito de horário
        if ($this->agendamentoModel->checkConflict($data['barbeiro_id'], $data['data'], $data['hora'])) {
            $_SESSION['erro'] = "Conflito de horário com outro agendamento.";
            header('Location: ' . BASE_URL . '/admin/agendamentos/adicionar');
            exit;
        }

        $this->agendamentoModel->create($data);
        $_SESSION['success'] = "Agendamento criado com sucesso!";
        header('Location: ' . BASE_URL . '/admin/agendamentos');
        exit;
    }

    // ================= Formulário para editar agendamento =================
    public function edit($id)
    {
        $agendamento = $this->agendamentoModel->getById($id);
        if (!$agendamento) {
            $_SESSION['erro'] = "Agendamento não encontrado.";
            header('Location: ' . BASE_URL . '/admin/agendamentos');
            exit;
        }

        $clientes = $this->clienteModel->getAll();
        $servicos = $this->servicoModel->getAll();
        $barbeiros = $this->barbeiroModel->getAll();

        $this->view('agendamentos/edit', [
            'agendamento' => $agendamento,
            'clientes'    => $clientes,
            'servicos'    => $servicos,
            'barbeiros'   => $barbeiros
        ]);
    }

    // ================= Atualizar agendamento =================
    public function update($id)
    {
        $data = [
            'cliente_id' => $_POST['cliente_id'],
            'servico_id' => $_POST['servico_id'],
            'barbeiro_id'=> $_POST['barbeiro_id'],
            'data'       => $_POST['data'],
            'hora'       => $_POST['hora'],
            'status'     => $_POST['status'] ?? 'PENDENTE'
        ];

        $atual = $this->agendamentoModel->getById($id);
        if (!$atual) {
            $_SESSION['erro'] = "Agendamento não encontrado.";
            header('Location: ' . BASE_URL . '/admin/agendamentos');
            exit;
        }

        // Verifica conflito (ignora o próprio agendamento)
        $conflito = $this->agendamentoModel->checkConflict($data['barbeiro_id'], $data['data'], $data['hora']);
        if ($conflito && ($atual['data'] != $data['data'] || $atual['hora'] != $data['hora'])) {
            $_SESSION['erro'] = "Conflito de horário com outro agendamento.";
            header('Location: ' . BASE_URL . "/admin/agendamentos/editar/$id");
            exit;
        }

        $this->agendamentoModel->update($id, $data);
        $_SESSION['success'] = "Agendamento atualizado com sucesso!";
        header('Location: ' . BASE_URL . '/admin/agendamentos');
        exit;
    }

    // ================= Excluir agendamento =================
    public function delete($id)
    {
        $agendamento = $this->agendamentoModel->getById($id);
        if (!$agendamento) {
            $_SESSION['erro'] = "Agendamento não encontrado.";
            header('Location: ' . BASE_URL . '/admin/agendamentos');
            exit;
        }

        $this->agendamentoModel->delete($id);
        $_SESSION['success'] = "Agendamento removido com sucesso!";
        header('Location: ' . BASE_URL . '/admin/agendamentos');
        exit;
    }
}
