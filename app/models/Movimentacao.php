<?php

class Movimentacao {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrar($idCaixa, $tipo, $descricao, $valor, $formaPagamento) {
        $stmt = $this->db->prepare("INSERT INTO movimentacoes (id_caixa, tipo, descricao, valor, forma_pagamento) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$idCaixa, $tipo, $descricao, $valor, $formaPagamento]);
    }

    public function listarPorCaixa($idCaixa) {
        $stmt = $this->db->prepare("SELECT * FROM movimentacoes WHERE id_caixa = ? ORDER BY created_at DESC");
        $stmt->execute([$idCaixa]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calcularSaldo($idCaixa) {
        $stmt = $this->db->prepare("
            SELECT 
                SUM(CASE WHEN tipo = 'ENTRADA' THEN valor ELSE -valor END) as saldo 
            FROM movimentacoes WHERE id_caixa = ?
        ");
        $stmt->execute([$idCaixa]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['saldo'] ?? 0;
    }
}