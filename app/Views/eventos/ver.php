<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2><?= esc($evento['nombre']) ?></h2>

<p><?= esc($evento['descripcion']) ?></p>
<?php if (!empty($evento['fecha_inicio'])): ?>
    <p><strong>Fecha de inicio:</strong> <?= esc($evento['fecha_inicio']) ?></p>
<?php endif; ?>

<a href="<?= base_url($entidad['url'] . '/eventos') ?>" class="btn btn-sm btn-secondary">← Volver a eventos</a>
<?= $this->endSection() ?>
