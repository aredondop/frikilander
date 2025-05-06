<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Crear Nueva Tienda</h2>

<?= form_open('tiendas/guardar') ?>

<div class="form-group">
    <label for="nombre">Nombre de la Tienda</label>
    <input type="text" class="form-control" name="nombre" id="nombre" required>
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
</div>

<button type="submit" class="btn btn-success mt-3">Crear Tienda</button>

<?= form_close() ?>

<?= $this->endSection() ?>
