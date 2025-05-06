<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <?php foreach ($ambientaciones as $ambientacion): ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($ambientacion['nombre']) ?></h5>
                    <p class="card-text"><?= esc($ambientacion['descripcion']) ?></p>
                    <p><small>Entidad: <?= esc($ambientacion['entidad_nombre']) ?></small></p>
                    <a href="#" class="btn btn-sm btn-outline-primary">Ver Detalle</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>
