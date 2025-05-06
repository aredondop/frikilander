<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <h2><?= esc($categoria['nombre']) ?></h2>
    <p><?= esc($categoria['descripcion']) ?></p>
    <hr>
</div>

<div class="row">
    <?php foreach ($productos as $producto): ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="<?= base_url('uploads/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['titulo']) ?>" style="height: 225px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($producto['titulo']) ?></h5>
                    <p class="card-text"><?= esc($producto['descripcion_corta']) ?></p>
                    <a href="<?= base_url($entidad['url'] . '/tienda/producto/' . $producto['slug']) ?>" class="btn btn-sm btn-outline-secondary">Ver detalle</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
