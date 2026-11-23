<?php
/*
 * Family Stays. Wording is written straight in below: edit it here.
 * The questions near the bottom come from content/faqs.md (those marked "show on: family").
 */
$title = 'Family-friendly cottage in Alnwick';
$description = 'Family holidays in Alnwick: a two-bedroom cottage sleeping four, with a travel cot, games and books, close to the castle, gardens and coast.';
$ogImage = '/images/family/double-bedroom.jpg';
$ogImageAlt = 'The double bedroom with gingham bedding';
$overPhoto = true;
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';
?>

<section class="hero hero--short hero--centre">
  <?= content_image('/images/family/twin-room-doorway.jpg', 'The twin bedroom, seen through the doorway', 'band-photo', '') ?>
  <div class="shade-over"></div>
  <div class="wrap stack centre">
    <p class="label">Family stays in Alnwick</p>
    <h1>Family holidays, <em>close to everything</em></h1>
  </div>
</section>

<section class="band torn">
  <div class="wrap split">
    <div class="stack">
      <p class="label">Made for little adventurers</p>
      <h2>Autumn House is a cosy base for families, made for holidays that feel <em>easy, cosy and close to home.</em></h2>
      <p>There's a travel cot, highchair and baby bath, children's tableware, and books and games for every age, from babies to ten-plus. The castle, The Alnwick Garden and Barter Books are all within walking distance.</p>
      <div class="btns">
        <a class="btn btn--fill" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book your stay</a>
        <a class="btn" href="/the-house">See the house</a>
      </div>
    </div>
    <div class="media">
      <div class="card-torn tilt-r"><div><?= content_image('/images/home/childrens-books.jpg', 'Paddington books in the twin room', '', '4/5') ?><span class="hand">Toys &amp; treasures</span></div></div>
    </div>
  </div>
</section>

<section class="band torn-photo statement" style="padding-bottom: 0">
  <?= content_image('/images/family/double-bedroom.jpg', 'The double bedroom with gingham bedding', 'band-photo', '') ?>
  <div class="wrap" style="min-height: 22rem"></div>
</section>

<section class="band" style="--band: var(--primary-light)">
  <div class="wrap overlap">
    <div class="card-torn tilt-l"><div><?= content_image('/images/family/draughts.jpg', 'A draughts set on the coffee table', '', '4/5') ?><span class="hand">Rainy-day games</span></div></div>
    <div class="stack">
      <p class="label">Days out</p>
      <h2>Family holidays at <em>Autumn House</em> can be as full or as slow as you need them to be.</h2>
      <p>Spend a morning in The Alnwick Garden, try broomstick training at Alnwick Castle, or splash about at Willowburn Leisure Centre, just round the corner.</p>
      <p>Then come home to hot chocolate, a film on the projector and an early night in the twin room. Alnmouth's beach is a short drive away when you're ready for sand.</p>
    </div>
  </div>
</section>

<section class="band torn torn--flip">
  <div class="wrap stack" style="gap: 3rem">
    <h2 class="centre-text">Why families <em>love</em> Autumn House</h2>
    <div class="features">
      <div><?= svg('illustrations/10-seedling.svg', 'illustration') ?><h3 class="hand">Room for four</h3><p>A double room and a twin room, plus a travel cot, highchair and baby bath for the littlest guests.</p></div>
      <div><?= svg('illustrations/04-flower.svg', 'illustration') ?><h3 class="hand">Everything to hand</h3><p>Children's tableware, books, board games and a washer-dryer for muddy clothes.</p></div>
      <div><?= svg('illustrations/09-sprig-small.svg', 'illustration') ?><h3 class="hand">Days out nearby</h3><p>The Alnwick Garden, the castle, the Playhouse cinema and the beach at Alnmouth.</p></div>
    </div>
  </div>
</section>

<?php $review = 'family'; include __DIR__ . '/includes/review.php'; ?>

<?php $familyFaqs = faq_list('family'); if ($familyFaqs !== ''): ?>
<section class="band torn" style="--band: var(--primary-light); padding-block: 0">
  <div class="split" style="gap: 0; align-items: stretch">
    <div class="stack wrap" style="padding-block: var(--band-space); max-width: 36rem; margin-inline: auto; width: 100%">
      <p class="label">Good to know</p>
      <h2>The best family stays are often <em>the simplest ones.</em></h2>
      <p>The questions families ask us most often.</p>
      <?= $familyFaqs ?>
    </div>
    <?= content_image('/images/family/bedroom-dresser.jpg', 'The dresser in the double bedroom', '', '') ?>
  </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/callout.php'; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
