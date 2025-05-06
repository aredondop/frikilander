<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Crear Nuevo Producto</h2>

<?= form_open('productos/guardar') ?>

<div class="form-group">
    <label for="titulo">Nombre del Producto</label>
    <input type="text" class="form-control" name="titulo" id="titulo" required>
</div>

<div class="form-group">
    <label for="descripcion_corta">Descripción Corta</label>
    <textarea class="form-control" name="descripcion_corta" id="descripcion_corta" rows="2"></textarea>
</div>

<div class="form-group">
    <label for="descripcion_larga">Descripción Larga</label>
    <textarea class="form-control" name="descripcion_larga" id="descripcion_larga" rows="4"></textarea>
</div>

<div class="form-group">
    <label for="precio_sin_impuestos">Precio sin impuestos (€)</label>
    <input type="number" step="0.01" class="form-control" name="precio_sin_impuestos" id="precio_sin_impuestos" required>
</div>

<div class="form-group">
    <label for="stock_disponible">Stock disponible</label>
    <input type="number" class="form-control" name="stock_disponible" id="stock_disponible" required>
</div>

<button type="submit" class="btn btn-info mt-3">Crear Producto</button>

<?= form_close() ?>

<?= $this->endSection() ?>
