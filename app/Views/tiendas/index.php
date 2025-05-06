<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php if (empty($tiendas)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No hay tiendas publicadas por el momento.
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($tiendas as $tienda): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <?php if (!empty($tienda['imagen_principal'])): ?>
                                <img src="<?= base_url('uploads/' . $tienda['imagen_principal']) ?>" class="card-img-top" alt="<?= esc($tienda['entidad_nombre']) ?>">
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
                                <h5 class="card-title"><?= esc($tienda['entidad_nombre']) ?></h5>
                                <p class="card-text"><?= esc($tienda['metadescripcion'] ?? 'Tienda disponible en Frikilander') ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url($tienda['entidad_url'] . '/tienda/') ?>" class="btn btn-sm btn-outline-secondary">
                                            Ver Tienda
                                        </a>
                                    </div>
                                    <small class="text-muted">ID #<?= esc($tienda['id']) ?></small>
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
