<?php
require_once __DIR__ . '/../core/Database.php'; // sobe um nível antes de ir para core

// Pega a conexão PDO
$db = Database::getInstance()->getConnection();

// Cria hash da senha
$senhaHash = password_hash('123456', PASSWORD_DEFAULT);

// Insere o usuário admin
$stmt = $db->prepare(
    "INSERT INTO usuarios (nome, email, senha, perfil, status) VALUES (:nome, :email, :senha, :perfil, :status)"
);
$stmt->execute([
    ':nome'   => 'Administrador',
    ':email'  => 'admin@teste.com',
    ':senha'  => $senhaHash,
    ':perfil' => 'ADMIN',
    ':status' => 'ATIVO',
]);

echo "Usuário admin criado com sucesso!";