<?php include __DIR__ . '/../layouts/admin.php'; ?>

<h2>Controle de Caixa</h2>
<a href="/caixa/create" class="btn btn-primary mb-3">Abrir Caixa</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Data</th>
      <th>Saldo Inicial</th>
      <th>Saldo Final</th>
      <th>Observações</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($caixas as $c): ?>
      <tr>
        <td><?= $c['data'] ?></td>
        <td>R$ <?= $c['saldo_inicial'] ?></td>
        <td>R$ <?= $c['saldo_final'] ?></td>
        <td><?= $c['observacoes'] ?></td>
        <td>
          <a href="/caixa/movimentacoes/<?= $c['id'] ?>" class="btn btn-sm btn-info">Movimentações</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../layouts/footer.php'; ?>