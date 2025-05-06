<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <?php foreach ($entidades as $entidad): ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="<?= base_url('uploads/' . esc($entidad['imagen_principal'] ?? 'default.jpg')) ?>" class="card-img-top" alt="<?= esc($entidad['nombre']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($entidad['nombre']) ?></h5>
                    <p class="card-text"><?= esc($entidad['descripcion']) ?></p>
                    <a href="<?= base_url($entidad['url']) ?>" class="btn btn-sm btn-outline-primary">Ver Entidad</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>
