<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <div class="row">
      
      <div class="col-md-4">
        <ul class="list-unstyled">
          <li><a href="<?= base_url('/aviso-legal') ?>">Aviso Legal</a></li>
          <li><a href="<?= base_url('/politica-privacidad') ?>">Política de Privacidad</a></li>
          <li><a href="<?= base_url('/condiciones-uso') ?>">Condiciones de Uso</a></li>
        </ul>
      </div>

      <div class="col-md-4 text-center">
        <form class="form-inline" action="<?= base_url('/buscar') ?>" method="get">
          <input class="form-control form-control-sm mr-2" type="search" placeholder="Buscar..." name="q" aria-label="Buscar">
          <button class="btn btn-sm btn-outline-secondary" type="submit">Buscar</button>
        </form>
      </div>

      <div class="col-md-4 text-md-right text-center">
        <small>&copy; Ángel Redondo Pliego 2025</small><br>
        <small>Hecho con ❤️ para FOC</small>
      </div>
    </div>

    <hr>

    <div class="text-center">
      <small>&copy; <?= date('Y') ?> Frikilander. Todos los derechos reservados.</small>
    </div>
  </div>
</footer>
