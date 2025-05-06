<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <h2><?= esc($pagina['titulo']) ?></h2>
    <p><?= esc($pagina['metadescripcion']) ?></p>
    <img src="<?= base_url('uploads/' . $entidad['imagen_principal']) ?>" alt="Imagen tienda" class="img-fluid mb-3" style="max-height: 300px;">
    <hr>
</div>

<h4>Categorías</h4>
<div class="row mb-4">
    <?php foreach ($categorias as $categoria): ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($categoria['nombre']) ?></h5>
                    <p class="card-text"><?= esc($categoria['descripcion']) ?></p>
                    <a href="<?= base_url($entidad['url'] . '/tienda/' . $categoria['nombre']) ?>" class="btn btn-sm btn-outline-primary">Ver productos</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<h4>Productos destacados</h4>
<div class="row">
    <?php foreach ($productos as $producto): ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="<?= base_url('uploads/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['titulo']) ?>" style="height: 225px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($producto['titulo']) ?></h5>
                    <p class="card-text"><?= esc($producto['descripcion_corta']) ?></p>
                    <p class="card-text"><strong>Precio:</strong> <?= number_format($producto['precio_sin_impuestos'], 2) ?> €</p>
                    <a href="<?= base_url($entidad['url'] . '/tienda/producto/' . $producto['slug']) ?>" class="btn btn-sm btn-outline-secondary">Ver detalle</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
