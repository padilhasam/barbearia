<?php require_once __DIR__ . '/../layouts/cliente.php'; ?>
    
<?php
    $success = $_SESSION['register_success'] ?? '';
    unset($_SESSION['register_success']);
    ?>

    <?php if ($success): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($success) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    <?php endif; ?>

<div class="dashboard-cliente">

    <!-- 1. Boas-vindas e resumo do perfil -->
    <section class="resumo-perfil">
        <h2>Olá, <?= $cliente->nome ?></h2>
        <p>Próximo agendamento: 
            <?php if($proximoAgendamento): ?>
                <?= $proximoAgendamento->data ?> às <?= $proximoAgendamento->hora ?> com <?= $proximoAgendamento->barbeiro_nome ?>
            <?php else: ?>
                Nenhum agendamento próximo.
            <?php endif; ?>
        </p>
    </section>

    <!-- 2. Agendar novo horário -->
    <section class="agendar-horario">
        <h3>Agendar novo horário</h3>
        <a href="/clientes/agendamento" class="btn btn-primary">Agendar agora</a>
    </section>

    <!-- 3. Meus agendamentos -->
    <section class="meus-agendamentos">
        <h3>Meus agendamentos</h3>
        <?php if(!empty($agendamentos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Barbeiro</th>
                        <th>Serviço</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?= $agendamento->data ?></td>
                            <td><?= $agendamento->hora ?></td>
                            <td><?= $agendamento->barbeiro_nome ?></td>
                            <td><?= $agendamento->servico_nome ?></td>
                            <td><?= $agendamento->status ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você ainda não tem agendamentos.</p>
        <?php endif; ?>
    </section>

    <!-- 4. Meus pagamentos (opcional) -->
    <section class="meus-pagamentos">
        <h3>Meus pagamentos</h3>
        <a href="/clientes/pagamentos" class="btn btn-secondary">Ver histórico</a>
    </section>

</div>
