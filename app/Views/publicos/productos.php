<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <?php foreach ($productos as $producto): ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="<?= base_url('uploads/' . esc($producto['imagen'])) ?>" class="card-img-top" alt="<?= esc($producto['titulo']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($producto['titulo']) ?></h5>
                    <p class="card-text"><?= esc($producto['descripcion_corta']) ?></p>
                    <p><small>Entidad: <?= esc($producto['entidad_nombre']) ?></small></p>
                    <p><strong>Precio: <?= esc(number_format($producto['precio_sin_impuestos'], 2)) ?> €</strong></p>
                    <a href="#" class="btn btn-sm btn-outline-primary">Ver Detalle</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>
