<?php
require_once __DIR__ . '/../../core/Model.php';

class Agendamento extends Model {

    public static function allWithRelations() {
        $sql = "SELECT a.*, 
                       c.nome as cliente_nome, 
                       s.nome as servico_nome, 
                       b.id as barbeiro_id, u.nome as barbeiro_nome
                FROM agendamentos a
                JOIN clientes c ON c.id = a.cliente_id
                JOIN servicos s ON s.id = a.servico_id
                JOIN barbeiros b ON b.id = a.barbeiro_id
                JOIN usuarios u ON u.id = b.usuario_id
                ORDER BY a.data, a.hora";
        $stmt = self::$db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($dados) {
        $stmt = self::$db->prepare("INSERT INTO agendamentos 
            (cliente_id, servico_id, barbeiro_id, data, hora, status) 
            VALUES (?, ?, ?, ?, ?, 'PENDENTE')");
        return $stmt->execute([
            $dados['cliente_id'],
            $dados['servico_id'],
            $dados['barbeiro_id'],
            $dados['data'],
            $dados['hora']
        ]);
    }

    public static function existeConflito($barbeiro_id, $data, $hora) {
        $stmt = self::$db->prepare("SELECT * FROM agendamentos 
                                    WHERE barbeiro_id = ? AND data = ? AND hora = ? 
                                    AND status != 'CANCELADO'");
        $stmt->execute([$barbeiro_id, $data, $hora]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}