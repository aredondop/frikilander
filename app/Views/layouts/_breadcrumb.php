<?php if (!empty($breadcrumb) && is_array($breadcrumb)): ?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <?php foreach ($breadcrumb as $item): ?>
        <li class="breadcrumb-item">
          <?php if (isset($item['url'])): ?>
            <a href="<?= esc($item['url']) ?>"><?= esc($item['label']) ?></a>
          <?php else: ?>
            <?= esc($item['label']) ?>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </nav>
<?php endif; ?>
