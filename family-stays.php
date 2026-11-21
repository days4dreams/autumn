<?php
/*
 * Family Stays. Wording is written straight in below: edit it here.
 * The questions near the bottom come from content/faqs.md (those marked "show on: family").
 */
$title = 'Family Stays';
$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.';
$overPhoto = true;
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';
?>

<section class="hero hero--short hero--centre">
  <?= placeholder('', 'band-photo') ?>
  <div class="shade-over"></div>
  <div class="wrap stack centre">
    <p class="label">Lorem ipsum dolor sit</p>
    <h1>Family holidays <em>lorem ipsum</em> dolor sit</h1>
  </div>
</section>

<section class="band torn">
  <div class="wrap split">
    <div class="stack">
      <p class="label">Lorem ipsum</p>
      <h2>Autumn House is a lorem ipsum dolor sit amet, made for family holidays that feel <em>easy, cosy and close to home.</em></h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <div class="btns">
        <a class="btn btn--fill" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book your stay</a>
        <a class="btn" href="/the-house">See the house</a>
      </div>
    </div>
    <div class="media">
      <div class="card-torn tilt-r"><div><?= placeholder('', '', '4/5') ?><span class="hand">Lorem ipsum</span></div></div>
    </div>
  </div>
</section>

<section class="band torn-photo statement" style="padding-bottom: 0">
  <?= placeholder('', 'band-photo') ?>
  <div class="wrap" style="min-height: 22rem"></div>
</section>

<section class="band" style="--band: var(--primary-light)">
  <div class="wrap overlap">
    <div class="card-torn tilt-l"><div><?= placeholder('', '', '4/5') ?><span class="hand">Lorem ipsum</span></div></div>
    <div class="stack">
      <p class="label">Lorem ipsum dolor</p>
      <h2>Family holidays at <em>Autumn House</em> can be as full or as slow as you need them to be.</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</section>

<section class="band torn torn--flip">
  <div class="wrap stack" style="gap: 3rem">
    <h2 class="centre-text">Why families <em>love</em> Autumn House</h2>
    <div class="features">
      <div><?= svg('illustrations/10-seedling.svg', 'illustration') ?><h3 class="hand">Lorem ipsum</h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p></div>
      <div><?= svg('illustrations/04-flower.svg', 'illustration') ?><h3 class="hand">Dolor sit amet</h3><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p></div>
      <div><?= svg('illustrations/09-sprig-small.svg', 'illustration') ?><h3 class="hand">Consectetur</h3><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p></div>
    </div>
  </div>
</section>

<?php $familyFaqs = faq_list('family'); if ($familyFaqs !== ''): ?>
<section class="band torn" style="--band: var(--primary-light); padding-block: 0">
  <div class="split" style="gap: 0; align-items: stretch">
    <div class="stack wrap" style="padding-block: var(--band-space); max-width: 36rem; margin-inline: auto; width: 100%">
      <p class="label">Lorem ipsum details</p>
      <h2>The best family stays are often <em>the simplest ones.</em></h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
      <?= $familyFaqs ?>
    </div>
    <?= placeholder('', '', '') ?>
  </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/callout.php'; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
