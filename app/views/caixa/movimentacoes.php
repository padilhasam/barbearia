<?php include __DIR__ . '/../layouts/admin.php'; ?>

<h2>Movimentações do Caixa (<?= $caixa['data'] ?>)</h2>
<a href="/caixa/add-movimentacao/<?= $caixa['id'] ?>" class="btn btn-success mb-3">Adicionar</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Descrição</th>
      <th>Valor</th>
      <th>Forma Pagamento</th>
      <th>Data</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($movimentacoes as $m): ?>
      <tr>
        <td><?= $m['tipo'] ?></td>
        <td><?= $m['descricao'] ?></td>
        <td>R$ <?= $m['valor'] ?></td>
        <td><?= $m['forma_pagamento'] ?></td>
        <td><?= $m['created_at'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include __DIR__ . '/../layouts/footer.php'; ?>