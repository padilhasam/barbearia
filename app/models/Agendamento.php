<?php
require_once __DIR__ . '/../../core/Model.php';

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    /**
     * Retorna todos os agendamentos com informações do cliente, serviço e barbeiro
     */
    public function getAll(): array
    {
        $sql = "SELECT a.*, 
                       c.nome AS cliente_nome, 
                       s.nome AS servico_nome, 
                       b.id AS barbeiro_id, 
                       u.nome AS barbeiro_nome
                FROM {$this->table} a
                JOIN clientes c ON c.id = a.cliente_id
                JOIN servicos s ON s.id = a.servico_id
                JOIN barbeiros b ON b.id = a.barbeiro_id
                JOIN usuarios u ON u.id = b.usuario_id
                ORDER BY a.data, a.hora";

        $stmt = self::$db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna agendamentos do dia atual
     */
    public function getByToday(): array
    {
        $stmt = self::$db->prepare(
            "SELECT * FROM {$this->table} WHERE data = :hoje ORDER BY hora"
        );
        $stmt->execute(['hoje' => date('Y-m-d')]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Cria um novo agendamento
     */
    public function create(array $data): bool
    {
        $stmt = self::$db->prepare(
            "INSERT INTO {$this->table} (cliente_id, servico_id, barbeiro_id, data, hora, status) 
             VALUES (:cliente_id, :servico_id, :barbeiro_id, :data, :hora, :status)"
        );
        return $stmt->execute([
            'cliente_id'  => $data['cliente_id'],
            'servico_id'  => $data['servico_id'],
            'barbeiro_id' => $data['barbeiro_id'],
            'data'        => $data['data'],
            'hora'        => $data['hora'],
            'status'      => $data['status'] ?? 'PENDENTE'
        ]);
    }

    /**
     * Atualiza um agendamento existente
     */
    public function update(int $id, array $data): bool
    {
        $stmt = self::$db->prepare(
            "UPDATE {$this->table} 
             SET cliente_id = :cliente_id,
                 servico_id = :servico_id,
                 barbeiro_id = :barbeiro_id,
                 data = :data,
                 hora = :hora,
                 status = :status
             WHERE id = :id"
        );

        return $stmt->execute([
            'cliente_id'  => $data['cliente_id'],
            'servico_id'  => $data['servico_id'],
            'barbeiro_id' => $data['barbeiro_id'],
            'data'        => $data['data'],
            'hora'        => $data['hora'],
            'status'      => $data['status'] ?? 'PENDENTE',
            'id'          => $id
        ]);
    }

    /**
     * Remove um agendamento
     */
    public function delete(int $id): bool
    {
        $stmt = self::$db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Verifica se já existe conflito de agendamento para o barbeiro
     */
    public function checkConflict(int $barbeiro_id, string $data, string $hora): bool
    {
        $stmt = self::$db->prepare(
            "SELECT * FROM {$this->table} 
             WHERE barbeiro_id = :barbeiro_id 
               AND data = :data 
               AND hora = :hora 
               AND status != 'CANCELADO'"
        );
        $stmt->execute([
            'barbeiro_id' => $barbeiro_id,
            'data'        => $data,
            'hora'        => $hora
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
}
