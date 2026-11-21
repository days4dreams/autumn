<?php
/*
 * Home page. The wording is written straight into the HTML below: edit it here.
 * Photos are placeholders for now: swap placeholder(...) for
 * content_image('/images/your-photo.jpg', 'Describe the photo').
 */
$title = '';   // the homepage uses the site name and tagline as its title
$description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.';
$overPhoto = true;
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';
?>

<section class="hero">
  <?= placeholder('', 'band-photo') ?>
  <div class="shade-over"></div>
  <div class="wrap stack">
    <p class="hand">Lorem ipsum dolor</p>
    <h1>Lorem ipsum <em>dolor sit</em> amet elit</h1>
    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, ut enim ad minim veniam.</p>
    <div class="btns"><a class="btn btn--fill" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book your stay</a></div>
  </div>
</section>

<section class="band torn">
  <div class="wrap split">
    <div class="stack">
      <p class="label">Lorem ipsum dolor</p>
      <h2>Lorem ipsum dolor sit amet, <em>consectetur adipiscing</em> elit sed do.</h2>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
      <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <div class="btns"><a class="btn" href="/the-house">See the house</a></div>
    </div>
    <div class="media">
      <div class="card-torn tilt-r"><div><?= placeholder('', '', '4/5') ?><span class="hand">Lorem ipsum</span></div></div>
      <?= svg('logos/stamp.svg', 'stamp') ?>
    </div>
  </div>
</section>

<section class="band torn torn--flip" style="--band: var(--primary-light)">
  <div class="wrap features">
    <div><?= svg('illustrations/03-hare.svg', 'illustration') ?><h3 class="hand">Lorem ipsum</h3><p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p></div>
    <div><?= svg('illustrations/01-oak-leaf.svg', 'illustration') ?><h3 class="hand">Dolor sit amet</h3><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p></div>
    <div><?= svg('illustrations/07-sprig-berries.svg', 'illustration') ?><h3 class="hand">Consectetur</h3><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p></div>
  </div>
</section>

<section class="band torn">
  <div class="wrap stack" style="gap: 2.5rem">
    <h2 class="centre-text">Lorem ipsum at <em>Autumn House</em></h2>
    <div class="cards">
      <article class="card">
        <?= placeholder('', '', '4/3') ?>
        <div class="card-body"><h3>The House</h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p><a class="btn" href="/the-house">See the house</a></div>
      </article>
      <article class="card">
        <?= placeholder('', '', '4/3') ?>
        <div class="card-body"><h3>Family Stays</h3><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p><a class="btn" href="/family-stays">Family stays</a></div>
      </article>
      <article class="card">
        <?= placeholder('', '', '4/3') ?>
        <div class="card-body"><h3>The Guide</h3><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p><a class="btn" href="/the-guide">Read the guide</a></div>
      </article>
    </div>
  </div>
</section>

<section class="band torn-photo statement">
  <?= placeholder('', 'band-photo') ?>
  <div class="shade-over"></div>
  <div class="wrap">
    <h2>Lorem ipsum, dolor sit and <em>amet.</em></h2>
    <div class="btns"><a class="btn btn--light" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book your stay</a></div>
  </div>
</section>

<section class="band" style="--band: var(--primary-light)">
  <div class="wrap overlap">
    <div class="card-torn tilt-l"><div><?= placeholder('', '', '4/5') ?><span class="hand">Lorem ipsum</span></div></div>
    <div class="stack">
      <p class="label">Lorem ipsum dolor sit</p>
      <h2>From lorem ipsum and dolor sit to amet, <em>consectetur</em> adipiscing elit sed do eiusmod.</h2>
    </div>
  </div>
</section>

<section class="band torn torn--flip">
  <div class="wrap stack" style="gap: 2rem">
    <p class="label centre-text">Lorem ipsum dolor</p>
    <div class="slider" id="home-slider" data-slider tabindex="0" aria-label="Ways to stay (scrolls sideways)">
<?php
// The numbered slides: [title, text, button text, link]
$slides = [
    ['Family stays', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.', 'Plan a family stay', '/family-stays'],
    ['Lorem ipsum', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'Enquire', '/enquire'],
    ['Dolor sit amet', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.', 'Enquire', '/enquire'],
    ['Consectetur', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui.', 'Read the guide', '/the-guide'],
];
foreach ($slides as $i => [$slideTitle, $slideText, $slideButton, $slideLink]):
?>
      <article class="slide">
        <?= placeholder('', '', '4/3') ?>
        <p class="slide-number"><?= sprintf('%02d.', $i + 1) ?></p>
        <h3 class="label"><?= e($slideTitle) ?></h3>
        <p><?= e($slideText) ?></p>
        <div><a class="btn btn--small" href="<?= e($slideLink) ?>"><?= e($slideButton) ?></a></div>
      </article>
<?php endforeach; ?>
    </div>
    <div class="slider-arrows" data-slider-arrows="home-slider" hidden>
      <button type="button" data-direction="-1" aria-label="Previous">&larr;</button>
      <button type="button" data-direction="1" aria-label="Next">&rarr;</button>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/review.php'; ?>
<?php include __DIR__ . '/includes/callout.php'; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
