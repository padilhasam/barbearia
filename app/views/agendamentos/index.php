<?php include __DIR__ . '/../layouts/admin.php'; ?>

<h2>Agendamentos</h2>
<a href="/agendamentos/create" class="btn btn-primary mb-3">Novo Agendamento</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Serviço</th>
      <th>Barbeiro</th>
      <th>Data</th>
      <th>Hora</th>
      <th>Status</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($agendamentos as $a): ?>
    <tr>
      <td><?= $a['cliente_nome'] ?></td>
      <td><?= $a['servico_nome'] ?></td>
      <td><?= $a['barbeiro_nome'] ?></td>
      <td><?= $a['data'] ?></td>
      <td><?= $a['hora'] ?></td>
      <td><?= $a['status'] ?></td>
      <td>
        <a href="/agendamentos/edit/<?= $a['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../layouts/footer.php'; ?>