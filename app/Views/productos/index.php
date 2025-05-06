<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Productos destacados</h2>

<div class="row">
    <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (!empty($producto['imagen'])): ?>
                        <img src="<?= base_url('uploads/productos/' . esc($producto['imagen'])) ?>" class="card-img-top" alt="<?= esc($producto['titulo']) ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($producto['titulo']) ?></h5>
                        <p class="card-text"><?= esc($producto['descripcion_corta']) ?></p>
                        <p class="card-text"><strong><?= number_format($producto['precio_sin_impuestos'], 2) ?> €</strong></p>
                        <a href="<?= base_url('productos/ver/' . $producto['id']) ?>" class="btn btn-info">Ver Producto</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
