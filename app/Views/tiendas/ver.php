<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="mb-4">
            <h2><?= esc($tienda['entidad_nombre']) ?> - Tienda Online</h2>
            <p class="lead"><?= esc($tienda['metadescripcion'] ?? 'Descubre nuestros productos de cultura pop y más') ?></p>
            <a href="<?= base_url($tienda['entidad_url']) ?>" class="btn btn-outline-secondary btn-sm">
                Ver entidad
            </a>
        </div>
        <hr>
    </div>
</section>

<section class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php if (empty($productos)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No hay productos disponibles en esta tienda.
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <?php if (!empty($producto['imagen'])): ?>
                                <img src="<?= base_url('uploads/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['titulo']) ?>">
                            <?php else: ?>
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                                     preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Sin Imagen</text>
                                </svg>
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title"><?= esc($producto['titulo']) ?></h5>
                                <p class="card-text"><?= esc($producto['descripcion_corta']) ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url($tienda['entidad_url'] . '/tienda/' . $producto['slug']) ?>" class="btn btn-sm btn-outline-secondary">
                                            Ver producto
                                        </a>
                                    </div>
                                    <small class="text-muted">€<?= esc($producto['precio_sin_impuestos']) ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
