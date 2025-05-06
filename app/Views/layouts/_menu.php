<header class="navbar navbar-expand navbar-light bg-light flex-column flex-md-row bd-navbar">
  <a class="navbar-brand mr-0 mr-md-2" href="<?= base_url('/') ?>">
    FRIKILANDER
  </a>

  <div class="navbar-nav-scroll">
    <ul class="navbar-nav bd-navbar-nav flex-row">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/') ?>">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/eventos') ?>">Eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/ambientaciones') ?>">Ambientaciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/productos') ?>">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/entidades') ?>">Entidades</a>
      </li>
    </ul>
  </div>

  <ul class="navbar-nav ml-md-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> Cuenta
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
        <?php if (session()->get('logged_in')): ?>
          <a class="dropdown-item" href="<?= base_url('/perfil') ?>">Mi Perfil</a>
          <a class="dropdown-item" href="<?= base_url('/logout') ?>">Salir</a>
        <?php else: ?>
          <a class="dropdown-item" href="<?= base_url('/login') ?>">Entrar</a>
          <a class="dropdown-item" href="<?= base_url('/registrar') ?>">Registrar</a>
        <?php endif; ?>
      </div>
    </li>
  </ul>
</header>
