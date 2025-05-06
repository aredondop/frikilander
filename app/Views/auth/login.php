<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Login</h2>

    <form action="<?= base_url('auth/login') ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>
<?= $this->endSection() ?>
