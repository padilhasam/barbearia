<?php
require_once __DIR__ . '/header.php';
?>
<!-- Boas-vindas -->
<div class="card card-welcome text-center mb-4 bg-light text-dark shadow-lg">
    <div class="mb-3 d-flex justify-content-center">
        <div class="rounded-circle d-inline-flex align-items-center justify-content-center" 
            style="width:70px; height:70px; background-color:#f8f9fa;">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#212529" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
        </div>
    </div>
    <h5 class="fw-bold mb-1">Olá, <?= htmlspecialchars($cliente['nome']) ?> 👋</h5>
    <p class="mb-0 small text-dark-50">
        Você tem <strong><?= count($agendamentos) ?> agendamentos</strong> e <strong>50 pontos</strong>.
    </p>
</div>

<!-- Próximo agendamento -->
<div class="card card-proximo mb-4 text-center bg-dark text-light shadow-sm">
    <h6 class="fw-bold mb-2 text-danger">Próximo Agendamento</h6>
    <?php if($proximoAgendamento): ?>
        <p class="mb-1"><strong><?= $proximoAgendamento->data ?> às <?= $proximoAgendamento->hora ?></strong></p>
        <p class="mb-1"><i class="bi bi-scissors me-1"></i> <?= $proximoAgendamento->barbeiro_nome ?> | <?= $proximoAgendamento->servico_nome ?></p>
        <p class="mb-2"><i class="bi bi-geo-alt me-1"></i> <?= $proximoAgendamento->local ?? 'Unidade principal' ?></p>
        <a href="<?= BASE_URL ?>/clientes/agendamento" class="btn btn-outline-light btn-sm">Alterar / Cancelar</a>
    <?php else: ?>
        <p class="fst-italic mb-0">Nenhum agendamento próximo.</p>
    <?php endif; ?>
</div>

<!-- Meus agendamentos -->
<div class="mb-4">
    <h6 class="fw-semibold mb-3"><i class="bi bi-calendar-event me-1"></i> Meus Agendamentos</h6>
    <?php if(!empty($agendamentos)): ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach($agendamentos as $a): ?>
                <div class="col">
                    <div class="card card-agendamento h-100 shadow-sm bg-dark text-light">
                        <div class="card-body d-flex flex-column">
                            <h6 class="fw-bold"><?= $a->data ?> às <?= $a->hora ?></h6>
                            <p class="mb-1"><i class="bi bi-scissors me-1"></i> <?= $a->barbeiro_nome ?> | <?= $a->servico_nome ?></p>
                            <span class="badge <?= $a->status === 'Confirmado' ? 'bg-success' : 'bg-secondary' ?> mb-2"><?= $a->status ?></span>
                            <div class="mt-auto d-flex justify-content-between">
                                <?php if($a->status === 'Confirmado'): ?>
                                    <a href="<?= BASE_URL ?>/clientes/agendamento/editar/<?= $a->id ?>" class="btn btn-sm btn-outline-light">Remarcar</a>
                                    <a href="<?= BASE_URL ?>/clientes/agendamento/cancelar/<?= $a->id ?>" class="btn btn-sm btn-outline-danger">Cancelar</a>
                                <?php endif; ?>
                                <a href="<?= BASE_URL ?>/clientes/agendamento/detalhe/<?= $a->id ?>" class="btn btn-sm btn-outline-light">Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-white fst-italic">Você ainda não tem agendamentos.</p>
    <?php endif; ?>
</div>

<!-- Ações rápidas -->
<div class="mb-4">
    <h6 class="fw-semibold mb-3"><i class="bi bi-lightning-fill me-1"></i> Ações rápidas</h6>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card card-primary h-100 text-center bg-dark text-light">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="fs-2 mb-2"><i class="bi bi-plus-circle"></i></div>
                    <h6 class="fw-bold mb-3">Novo Agendamento</h6>
                    <a href="<?= BASE_URL ?>/clientes/agendamento" class="btn btn-light btn-sm mt-auto">Agendar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-success h-100 text-center bg-dark text-light">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="fs-2 mb-2"><i class="bi bi-credit-card-2-front"></i></div>
                    <h6 class="fw-bold mb-3">Meus Pagamentos</h6>
                    <a href="<?= BASE_URL ?>/clientes/pagamentos" class="btn btn-light btn-sm mt-auto">Ver histórico</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-dark h-100 text-center bg-dark text-light">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="fs-2 mb-2"><i class="bi bi-person"></i></div>
                    <h6 class="fw-bold mb-3">Meu Perfil</h6>
                    <a href="<?= BASE_URL ?>/clientes/perfil" class="btn btn-light btn-sm mt-auto">Acessar perfil</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-whatsapp h-100 text-center bg-dark text-light">
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="fs-2 mb-2"><i class="bi bi-whatsapp"></i></div>
                    <h6 class="fw-bold mb-3">Agendar via WhatsApp</h6>
                    <a href="https://wa.me/5511999999999?text=Quero%20agendar%20um%20hor%C3%A1rio" target="_blank" class="btn btn-light btn-sm mt-auto">Agendar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/footer.php';
