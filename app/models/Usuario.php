<?php
require_once __DIR__ . '/../../core/Database.php';

class Usuario
{
    protected $table = 'usuarios';
    protected $db;

    public function __construct()
    {
        // Pega a conexão PDO do singleton Database
        $this->db = Database::getInstance()->getConnection();
    }

    // Busca um usuário pelo email
    public function findByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cria um novo usuário (senha já deve vir como hash)
    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (nome, email, senha, perfil, status) 
                VALUES (:nome, :email, :senha, :perfil, :status)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':senha', $data['senha']);
        $stmt->bindParam(':perfil', $data['perfil']);
        $stmt->bindParam(':status', $data['status']);
        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $fields = "nome = :nome, email = :email, perfil = :perfil, status = :status";
        if (!empty($data['senha'])) {
            $fields .= ", senha = :senha";
        }

        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':perfil', $data['perfil']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if (!empty($data['senha'])) {
            $stmt->bindParam(':senha', $data['senha']);
        }

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY nome ASC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        return $this->findById($id);
    }

    public function existsEmail($email, $excludeId = null)
    {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE email = :email";
        if ($excludeId) {
            $sql .= " AND id != :id";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        if ($excludeId) {
            $stmt->bindParam(':id', $excludeId, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
