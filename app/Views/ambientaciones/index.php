<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Ambientaciones en <?= esc($entidad['nombre']) ?></h2>

<?php if (empty($ambientaciones)): ?>
    <p>No hay ambientaciones disponibles.</p>
<?php else: ?>
    <div class="row">
        <?php foreach ($ambientaciones as $amb): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($amb['nombre']) ?></h5>
                        <p class="card-text"><?= esc($amb['descripcion']) ?></p>
                        <a href="<?= base_url($entidad['url'] . '/ambientacion/' . $amb['nombre']) ?>" class="btn btn-sm btn-outline-primary">Ver ambientación</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>
