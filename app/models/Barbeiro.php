<?php
require_once __DIR__ . '/../../core/Model.php';

class Barbeiro extends Model {

    public static function all() {
        $stmt = self::$db->query("SELECT b.*, u.nome as usuario_nome 
                                  FROM barbeiros b 
                                  JOIN usuarios u ON u.id = b.usuario_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $stmt = self::$db->prepare("SELECT * FROM barbeiros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($dados) {
        $stmt = self::$db->prepare("INSERT INTO barbeiros (usuario_id, especialidade) VALUES (?, ?)");
        return $stmt->execute([
            $dados['usuario_id'],
            $dados['especialidade']
        ]);
    }
}