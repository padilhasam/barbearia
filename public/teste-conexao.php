<?php
// public/teste-conexao.php

require_once __DIR__ . 'core/Database.php';

try {
    // Usa o Singleton
    $db = Database::getInstance()->getConnection();

    echo "Conexão bem-sucedida!";

} catch (Exception $e) {
    echo "Erro na conexão: " . $e->getMessage();
}