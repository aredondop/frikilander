<?php if (!empty($sidebar) && is_array($sidebar)): ?>
  <div class="list-group">
    <?php foreach ($sidebar as $item): ?>
      <a href="<?= esc($item['url']) ?>" class="list-group-item list-group-item-action">
        <?= esc($item['label']) ?>
      </a>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>No hay contenido en el sidebar.</p>
<?php endif; ?>
