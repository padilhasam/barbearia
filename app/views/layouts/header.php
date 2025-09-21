<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Nome do sistema vindo do config
$config = require __DIR__ . '/../../config/config.php';
$appName = $config['app_name'] ?? 'Sistema Barbearia';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $appName; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS custom -->
    <link rel="stylesheet" href="/public/css/style.css">

    <!-- Ícones (opcional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-light">
