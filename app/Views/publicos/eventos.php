<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <?php foreach ($eventos as $evento): ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($evento['nombre']) ?></h5>
                    <p class="card-text"><?= esc($evento['descripcion']) ?></p>
                    <p><small>Ambientación: <?= esc($evento['ambientacion_nombre']) ?></small></p>
                    <p><small>Entidad: <?= esc($evento['entidad_nombre']) ?></small></p>
                    <a href="#" class="btn btn-sm btn-outline-primary">Ver Detalle</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>
