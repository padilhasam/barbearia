<?php 
// Layout admin: inclui header + sidebar e renderiza a view específica
require_once __DIR__ . '/header.php'; 
?>

<main class="content flex-grow-1 p-4">
    <?php 
    // Renderiza a view específica do controller
    if (isset($viewFile) && file_exists($viewFile)) {
        require $viewFile;
    } else {
        echo "<p>Conteúdo não encontrado.</p>";
    }
    ?>
</main>

<?php 
require_once __DIR__ . '/footer.php'; 
?>