<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2><?= esc($pagina['titulo']) ?></h2>

<?php if (!empty($pagina['metadescripcion'])): ?>
    <p><em><?= esc($pagina['metadescripcion']) ?></em></p>
<?php endif; ?>

<div>
    <?= esc($pagina['texto']) ?>
</div>

<a href="<?= base_url('/' . $entidad['url']) ?>" class="btn btn-sm btn-secondary">← Volver a la entidad</a>
<?= $this->endSection() ?>
