<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="card mb-4 shadow-sm">
    <img src="<?= base_url('uploads/productos/default.png') ?>" class="card-img-top" alt="<?= esc($producto['titulo']) ?>" style="height: 400px; object-fit: cover;">
    <div class="card-body">
        <h2 class="card-title"><?= esc($producto['titulo']) ?></h2>
        <p class="card-text"><strong>Descripción corta:</strong> <?= esc($producto['descripcion_corta']) ?></p>
        <p class="card-text"><strong>Descripción larga:</strong> <?= esc($producto['descripcion_larga']) ?></p>
        <p class="card-text"><strong>Precio:</strong> <?= number_format($producto['precio_sin_impuestos'], 2) ?> €</p>
        <p class="card-text"><strong>Stock:</strong> <?= esc($producto['stock']) ?> unidades</p>
        <a href="<?= base_url($entidad['url'] . '/tienda') ?>" class="btn btn-outline-primary">Volver a la tienda</a>
    </div>
</div>

<?= $this->endSection() ?>
