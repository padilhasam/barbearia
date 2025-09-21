<?php
require_once __DIR__ . '/../../core/Model.php';

class Servico extends Model {

    public static function all() {
        $stmt = self::$db->query("SELECT * FROM servicos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $stmt = self::$db->prepare("SELECT * FROM servicos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($dados) {
        $stmt = self::$db->prepare("INSERT INTO servicos (nome, descricao, preco) VALUES (?, ?, ?)");
        return $stmt->execute([
            $dados['nome'],
            $dados['descricao'],
            $dados['preco']
        ]);
    }
}