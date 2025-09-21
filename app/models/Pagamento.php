<?php
require_once __DIR__ . '/../../core/Model.php';

class Pagamento extends Model {

    public static function all() {
        $sql = "SELECT p.*, a.data, a.hora, c.nome as cliente_nome 
                FROM pagamentos p
                JOIN agendamentos a ON a.id = p.agendamento_id
                JOIN clientes c ON c.id = a.cliente_id";
        $stmt = self::$db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($dados) {
        $stmt = self::$db->prepare("INSERT INTO pagamentos (agendamento_id, valor, metodo, status) 
                                    VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $dados['agendamento_id'],
            $dados['valor'],
            $dados['metodo'],
            $dados['status']
        ]);
    }
}