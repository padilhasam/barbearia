
<div class="container py-4">
  <h2>Novo Agendamento</h2>
  <form method="POST" action="/agendamentos/store">
    <div class="mb-3">
      <label>Cliente</label>
      <select name="cliente_id" class="form-select" required>
        <?php foreach($clientes as $c): ?>
          <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Serviço</label>
      <select name="servico_id" class="form-select" required>
        <?php foreach($servicos as $s): ?>
          <option value="<?= $s['id'] ?>"><?= $s['nome'] ?> - R$<?= $s['preco'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Barbeiro</label>
      <select name="barbeiro_id" class="form-select" required>
        <?php foreach($barbeiros as $b): ?>
          <option value="<?= $b['id'] ?>"><?= $b['nome'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label>Data</label>
      <input type="date" name="data" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Hora</label>
      <input type="time" name="hora" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Agendar</button>
  </form>
      </div>