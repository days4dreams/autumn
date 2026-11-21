<?php
/**
 * Ends every page: the Instagram photo row, the site footer and the scripts.
 * Nothing should come after it.
 */
?>
</main>
<?php include __DIR__ . '/instagram.php'; ?>
<footer class="site-footer band torn" style="--band: var(--secondary)">
  <div class="wrap">
    <div class="footer-grid">
      <div>
        <p class="label">Explore</p>
        <ul class="footer-links">
<?php foreach ($menu as $href => $label): ?>
          <li><a href="<?= e($href) ?>"><?= e($label) ?></a></li>
<?php endforeach; ?>
        </ul>
      </div>
      <div class="footer-centre">
        <a href="/" class="footer-mark"><?= svg('logos/a-h-circle.svg', 'monogram', $site['name'] . ' home') ?></a>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
        <a class="btn btn--light" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book now</a>
      </div>
      <div>
        <p class="label">Stay in touch</p>
        <ul class="footer-links">
          <li><a href="<?= e($site['instagram_url']) ?>"<?= link_attrs($site['instagram_url']) ?>>Instagram</a></li>
          <li><a href="<?= e($site['staying_season_url']) ?>"<?= link_attrs($site['staying_season_url']) ?>>Staying season</a></li>
          <li><a href="/terms"<?= is_current('/terms') ? ' aria-current="page"' : '' ?>>Terms</a></li>
        </ul>
      </div>
    </div>
    <p class="footer-base">&copy; <?= e($site['name']) ?> <?= e($site['year']) ?></p>
  </div>
</footer>
</body>
</html>
