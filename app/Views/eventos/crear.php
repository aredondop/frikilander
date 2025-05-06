<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Crear Nuevo Evento</h2>

<?= form_open('eventos/guardar') ?>

<div class="form-group">
    <label for="titulo">Título del Evento</label>
    <input type="text" class="form-control" id="titulo" name="titulo" required>
</div>

<div class="form-group">
    <label for="descripcion_corta">Descripción Corta</label>
    <textarea class="form-control" id="descripcion_corta" name="descripcion_corta" rows="2"></textarea>
</div>

<div class="form-group">
    <label for="descripcion_larga">Descripción Larga</label>
    <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="5"></textarea>
</div>

<div class="form-group">
    <label for="fecha_evento">Fecha del Evento</label>
    <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
</div>

<button type="submit" class="btn btn-primary mt-3">Crear Evento</button>

<?= form_close() ?>

<?= $this->endSection() ?>
