<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div id="frikilanderCarousel" class="carousel slide mb-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#frikilanderCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#frikilanderCarousel" data-slide-to="1"></li>
    <li data-target="#frikilanderCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" role="img" aria-label="Primer slide"><title>Primer slide</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">¡Bienvenido a Frikilander!</text></svg>
      <div class="carousel-caption d-none d-md-block">
        <h5>Explora Eventos Únicos</h5>
        <p>Descubre todas las aventuras y experiencias disponibles.</p>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" role="img" aria-label="Segundo slide"><title>Segundo slide</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Tiendas & Productos</text></svg>
      <div class="carousel-caption d-none d-md-block">
        <h5>Compra lo Mejor en Cultura Pop</h5>
        <p>Desde figuras coleccionables hasta merchandising único.</p>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" role="img" aria-label="Tercer slide"><title>Tercer slide</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Únete a la Comunidad</text></svg>
      <div class="carousel-caption d-none d-md-block">
        <h5>Participa en Ambientaciones Épicas</h5>
        <p>Crea personajes, explora mundos y vive historias inolvidables.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#frikilanderCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#frikilanderCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

<div class="container py-5">
    <h2 class="mb-4 text-center">🎲 Bienvenido a Frikilander 🎮</h2>
    <p class="lead text-center mb-5">Tu plataforma para descubrir eventos, partidas, ambientaciones y tiendas del universo friki. ¡Únete y explora!</p>

    <!-- Bloques destacados -->
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">🌍 Explora Entidades</h5>
                    <p class="card-text">Descubre asociaciones, clubes y comunidades de rol, cosplay, gaming y más.</p>
                    <a href="<?= base_url('entidades') ?>" class="btn btn-primary btn-sm">Ver Entidades</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📅 Próximos Eventos</h5>
                    <p class="card-text">No te pierdas torneos, jornadas, meetups y convenciones cerca de ti.</p>
                    <a href="<?= base_url('eventos') ?>" class="btn btn-primary btn-sm">Ver Eventos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">🛒 Tiendas Online</h5>
                    <p class="card-text">Merchandising, cómics, figuras, juegos de mesa y más, directamente desde nuestras entidades.</p>
                    <a href="<?= base_url('tiendas') ?>" class="btn btn-primary btn-sm">Ver Tiendas</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bloque de ambientaciones -->
    <div class="row mb-5">
        <div class="col">
            <h2 class="text-center mb-4">⚔️ Ambientaciones Destacadas</h2>
            <div class="text-center">
                <a href="<?= base_url('ambientaciones') ?>" class="btn btn-outline-secondary">Ver Todas las Ambientaciones</a>
            </div>
        </div>
    </div>

    <!-- Bloque Spotify -->
    <div class="row mb-5">
        <div class="col">
            <h2 class="text-center mb-4">🎧 Nuestra Playlist en Spotify</h2>
            <div class="d-flex justify-content-center">
                <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/7Clxaxcp5Sk3uU2K0M23MI?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- Call to action -->
    <div class="row">
        <div class="col text-center">
            <p class="lead">¿Quieres crear tu propia entidad o tienda?</p>
            <a href="<?= base_url('login') ?>" class="btn btn-success">Inicia sesión y comienza</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
