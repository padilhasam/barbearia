<?php

class Caixa {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function abrirCaixa($saldoInicial, $observacoes = '') {
        $stmt = $this->db->prepare("INSERT INTO caixa (data, saldo_inicial, saldo_final, observacoes) VALUES (CURDATE(), ?, ?, ?)");
        return $stmt->execute([$saldoInicial, $saldoInicial, $observacoes]);
    }

    public function listarCaixas() {
        $stmt = $this->db->query("SELECT * FROM caixa ORDER BY data DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarCaixa($id) {
        $stmt = $this->db->prepare("SELECT * FROM caixa WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarSaldo($id, $novoSaldo) {
        $stmt = $this->db->prepare("UPDATE caixa SET saldo_final = ? WHERE id = ?");
        return $stmt->execute([$novoSaldo, $id]);
    }
}