<?php
require_once __DIR__ . '/../../core/Model.php';

class Pagamento extends Model
{
    /**
     * Retorna todos os pagamentos
     *
     * @return array
     */
    public function getAll(): array
    {
        $stmt = self::$db->query("SELECT * FROM pagamentos ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retorna a soma dos pagamentos pagos de hoje
     *
     * @return float
     */
    public function getReceitaHoje(): float
    {
        $stmt = self::$db->prepare(
            "SELECT SUM(valor) as total 
             FROM pagamentos 
             WHERE status = 'PAGO' 
             AND DATE(created_at) = CURDATE()"
        );
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] ?? 0.0;
    }

    /**
     * Cria um novo pagamento
     *
     * @param array $dados
     * @return bool
     */
    public function create(array $dados): bool
    {
        $stmt = self::$db->prepare(
            "INSERT INTO pagamentos (agendamento_id, valor, metodo, status) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([
            $dados['agendamento_id'],
            $dados['valor'],
            $dados['metodo'],
            $dados['status'] ?? 'PENDENTE'
        ]);
    }

    /**
     * Atualiza um pagamento pelo ID
     *
     * @param int $id
     * @param array $dados
     * @return bool
     */
    public function update(int $id, array $dados): bool
    {
        $stmt = self::$db->prepare(
            "UPDATE pagamentos SET valor = ?, metodo = ?, status = ? WHERE id = ?"
        );
        return $stmt->execute([
            $dados['valor'],
            $dados['metodo'],
            $dados['status'],
            $id
        ]);
    }

    /**
     * Remove um pagamento pelo ID
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = self::$db->prepare("DELETE FROM pagamentos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Busca um pagamento pelo ID
     *
     * @param int $id
     * @return array|false
     */
    public function findById(int $id)
    {
        $stmt = self::$db->prepare("SELECT * FROM pagamentos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
