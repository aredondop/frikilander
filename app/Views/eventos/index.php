<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Eventos en <?= esc($entidad['nombre']) ?></h2>

<?php if (empty($eventos)): ?>
    <p>No hay eventos disponibles.</p>
<?php else: ?>
    <div class="row">
        <?php foreach ($eventos as $evt): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($evt['nombre']) ?></h5>
                        <p class="card-text"><?= esc($evt['descripcion']) ?></p>
                        <a href="<?= base_url($entidad['url'] . '/evento/' . $evt['nombre']) ?>" class="btn btn-sm btn-outline-primary">Ver evento</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>
