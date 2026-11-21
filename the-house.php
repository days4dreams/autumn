<?php
/*
 * The House. Wording is written straight in below: edit it here.
 * The photo grid takes any number of photos: add a line to $housePhotos.
 */
$title = 'The House';
$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.';
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';

// The photo grid: [photo, description, shape (width/height)]. Shapes vary to make the grid interesting.
$housePhotos = [
    ['', '', '4/5'], ['', '', '3/4'], ['', '', '4/3'],
    ['', '', '1/1'], ['', '', '4/5'], ['', '', '3/4'],
    ['', '', '4/3'], ['', '', '3/4'], ['', '', '4/5'],
];
?>

<header class="wrap page-head centre-text">
  <h1>Lorem ipsum, <em>dolor</em> &amp; sit amet</h1>
</header>

<section class="band band--tight" style="--band: var(--primary-light); padding-block: 0">
  <div class="split" style="gap: 0; align-items: stretch">
    <div class="stack wrap" style="padding-block: var(--band-space); max-width: 36rem; margin-inline: auto">
      <p class="label">Lorem ipsum</p>
      <h2>The main lorem ipsum spans the dolor and sit amet, with <em>consectetur</em> adipiscing elit.</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
    <?= placeholder('', '', '') ?>
  </div>
</section>

<section class="band torn">
  <div class="wrap gallery">
<?php foreach ($housePhotos as [$src, $alt, $shape]): ?>
    <?= content_image($src, $alt, '', $shape) ?>
<?php endforeach; ?>
  </div>
</section>

<?php $houseFaqs = faq_list('house'); if ($houseFaqs !== ''): ?>
<section class="band torn torn--flip" style="--band: var(--primary-light)">
  <div class="wrap split" style="align-items: start">
    <div class="stack">
      <p class="label">Good to know</p>
      <h2>Lorem ipsum <em>dolor</em> sit amet</h2>
      <p><a href="/faqs">See all FAQs</a></p>
    </div>
    <?= $houseFaqs ?>
  </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/callout.php'; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
