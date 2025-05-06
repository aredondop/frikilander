<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Frikilander' ?></title>

  <!-- BOOTSTRA.386 CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstra386/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bootstra386/css/style.css') ?>">
  
  <?= $this->renderSection('styles') ?>
</head>
<body>

  <!-- Menú principal común -->
  <?= view('layouts/_menu') ?>

  <!-- Título de la página -->
  <section class="container mt-3">
    <?= view('layouts/_titulo', ['titulo' => $titulo ?? 'Título por defecto']) ?>
  </section>

  <!-- Breadcrumb (si se pasa) -->
  <section class="container">
    <?= view('layouts/_breadcrumb', ['breadcrumb' => $breadcrumb ?? []]) ?>
  </section>

  <div class="container mt-4">
    <div class="row">

      <?php if (!empty($sidebar)) : ?>
        <!-- Sidebar presente -->
        <aside class="col-md-3">
          <?= view('layouts/_sidebar', ['sidebar' => $sidebar]) ?>
        </aside>
        <main class="col-md-9">
      <?php else : ?>
        <!-- Sin sidebar, usar todo el ancho -->
        <main class="col-md-12">
      <?php endif; ?>

        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
      </main>

    </div>
  </div>

  <!-- Footer común -->
  <?= view('layouts/_footer') ?>

  <!-- Scripts -->
  <script src="<?= base_url('assets/bootstra386/js/bootstrap.js') ?>"></script>
  <script src="<?= base_url('assets/bootstra386/js/script.js') ?>"></script>
  <?= $this->renderSection('scripts') ?>
</body>
</html>
