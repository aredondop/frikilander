<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2><?= esc($ambientacion['nombre']) ?></h2>

<p><?= esc($ambientacion['descripcion']) ?></p>

<a href="<?= base_url($entidad['url'] . '/ambientaciones') ?>" class="btn btn-sm btn-secondary">← Volver a ambientaciones</a>
<?= $this->endSection() ?>
