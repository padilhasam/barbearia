<h1 class="mb-4">Meus Agendamentos</h1>

<?php if (!empty($agendamentos)): ?>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Serviço</th>
                <th>Barbeiro</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agendamentos as $agendamento): ?>
                <tr>
                    <td><?= $agendamento['id']; ?></td>
                    <td><?= $agendamento['servico']; ?></td>
                    <td><?= $agendamento['barbeiro']; ?></td>
                    <td><?= date('d/m/Y', strtotime($agendamento['data'])); ?></td>
                    <td><?= $agendamento['hora']; ?></td>
                    <td><?= $agendamento['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Você ainda não possui agendamentos.</p>
<?php endif; ?>