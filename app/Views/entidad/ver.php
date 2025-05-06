<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="text-center mb-4">
        <h2><?= esc($entidad['nombre']) ?></h2>
        <?php if ($entidad['imagen_principal']): ?>
            <img src="<?= base_url('uploads/' . $entidad['imagen_principal']) ?>" alt="<?= esc($entidad['nombre']) ?>" class="img-fluid mb-3">
        <?php endif; ?>
        <p><?= esc($entidad['descripcion']) ?></p>
    </div>
    
    <hr>

    <div>
        <h4>Explora</h4>
        <ul class="list-unstyled">
            <?php foreach ($sidebar as $item): ?>
                <li><a href="<?= $item['url'] ?>"><?= esc($item['label']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?= $this->endSection() ?>
