<?php
require_once __DIR__ . '/../../core/Model.php';

class Usuario extends Model {

    public function __construct() {
        parent::__construct(); // garante que a conexão seja iniciada
    }

    public static function all() {
        $stmt = self::$db->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $stmt = self::$db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($dados) {
        $stmt = self::$db->prepare(
            "INSERT INTO usuarios (nome, email, senha, perfil) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([
            $dados['nome'],
            $dados['email'],
            password_hash($dados['senha'], PASSWORD_BCRYPT),
            $dados['perfil']
        ]);
    }

    public static function autenticar($email, $senha) {
        $stmt = self::$db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }
}