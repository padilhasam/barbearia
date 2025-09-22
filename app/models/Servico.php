<?php
require_once __DIR__ . '/../../core/Model.php';

class Servico extends Model
{
    /**
     * Retorna todos os serviços
     *
     * @return array
     */
    public function getAll(): array
    {
        $stmt = self::$db->query("SELECT * FROM servicos ORDER BY nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca um serviço pelo ID
     *
     * @param int $id
     * @return array|false
     */
    public function findById(int $id)
    {
        $stmt = self::$db->prepare("SELECT * FROM servicos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Cria um novo serviço
     *
     * @param array $dados
     * @return bool
     */
    public function create(array $dados): bool
    {
        $stmt = self::$db->prepare(
            "INSERT INTO servicos (nome, descricao, preco) VALUES (?, ?, ?)"
        );
        return $stmt->execute([
            $dados['nome'],
            $dados['descricao'] ?? null,
            $dados['preco']
        ]);
    }

    /**
     * Atualiza um serviço pelo ID
     *
     * @param int $id
     * @param array $dados
     * @return bool
     */
    public function update(int $id, array $dados): bool
    {
        $stmt = self::$db->prepare(
            "UPDATE servicos SET nome = ?, descricao = ?, preco = ? WHERE id = ?"
        );
        return $stmt->execute([
            $dados['nome'],
            $dados['descricao'] ?? null,
            $dados['preco'],
            $id
        ]);
    }

    /**
     * Remove um serviço pelo ID
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = self::$db->prepare("DELETE FROM servicos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
