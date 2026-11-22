<?php
/*
 * Home page. The wording is written straight into the HTML below: edit it here.
 * Photos: content_image('/images/home/photo.jpg', 'Describe the photo', ...).
 * Change the path to swap a photo; the description is for people who can't see it.
 */
$title = '';   // the homepage uses the site name and tagline as its title
$description = 'A two-bedroom stone cottage in Alnwick, sleeping four, a short walk from the castle, The Alnwick Garden and Barter Books. Book direct.';
$overPhoto = true;
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';
?>

<section class="hero">
  <?= content_image('/images/home/living-room-fire.jpg', 'The sitting room in the evening, with the wood burner lit', 'band-photo', '') ?>
  <div class="shade-over"></div>
  <div class="wrap stack">
    <p class="hand">Welcome to Autumn House</p>
    <h1>A stone cottage <em>in the heart of</em> Alnwick</h1>
    <p>Two bedrooms, room for four, and a short stroll to the castle, the gardens and Barter Books.</p>
    <div class="btns"><a class="btn btn--fill" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book your stay</a></div>
  </div>
</section>

<section class="band torn">
  <div class="wrap split">
    <div class="stack">
      <p class="label">Your home from home</p>
      <h2>Peel off your walking boots, <em>pop the kettle on</em> and make yourself at home.</h2>
      <p>Autumn House is a stone-built, two-bedroom cottage with a new kitchen and bathroom, a cosy living room, and a garden front and back. There's room for four to rest, play and explore.</p>
      <p>Parking is free right outside, the Co-op is a minute's walk away, and Alnwick's cafés, pubs and restaurants are all within a ten-minute stroll.</p>
      <div class="btns"><a class="btn" href="/the-house">See the house</a></div>
    </div>
    <div class="media">
      <div class="card-torn tilt-r"><div><?= content_image('/images/home/rocking-chair.jpg', 'A rocking chair and reading lamp in a corner of the sitting room', '', '4/5') ?><span class="hand">Read, rock, repeat</span></div></div>
      <?= svg('logos/stamp.svg', 'stamp') ?>
    </div>
  </div>
</section>

<section class="band torn torn--flip" style="--band: var(--primary-light)">
  <div class="wrap features">
    <div><?= svg('illustrations/03-hare.svg', 'illustration') ?><h3 class="hand">On your doorstep</h3><p>Barter Books is 400m away, The Alnwick Garden 500m and Alnwick Castle 1.2km, all easy on foot.</p></div>
    <div><?= svg('illustrations/01-oak-leaf.svg', 'illustration') ?><h3 class="hand">Cosy nights in</h3><p>A fireside rocking chair, board games, good books and a projector for film nights.</p></div>
    <div><?= svg('illustrations/07-sprig-berries.svg', 'illustration') ?><h3 class="hand">Coast &amp; country</h3><p>The Northumberland coast is nine minutes' drive away, with Craster, Warkworth and Dunstanburgh within twenty.</p></div>
  </div>
</section>

<section class="band torn">
  <div class="wrap stack" style="gap: 2.5rem">
    <h2 class="centre-text">Inside <em>Autumn House</em></h2>
    <div class="cards">
      <article class="card">
        <?= content_image('/images/home/kitchen.jpg', 'The kitchen, with oak cupboards and terracotta tiles', '', '4/3') ?>
        <div class="card-body"><h3>The House</h3><p>Two bedrooms, a bright new kitchen and bathroom, and a living room made for curling up.</p><a class="btn" href="/the-house">See the house</a></div>
      </article>
      <article class="card">
        <?= content_image('/images/home/twin-room.jpg', 'The twin bedroom', '', '4/3') ?>
        <div class="card-body"><h3>Family Stays</h3><p>A travel cot, children's tableware, books and games, with plenty for little ones nearby.</p><a class="btn" href="/family-stays">Family stays</a></div>
      </article>
      <article class="card">
        <?= content_image('/images/home/northumberland-map.jpg', 'A framed map of Northumberland', '', '4/3') ?>
        <div class="card-body"><h3>The Guide</h3><p>Our favourite places to eat, walk and explore in and around Alnwick.</p><a class="btn" href="/the-guide">Read the guide</a></div>
      </article>
    </div>
  </div>
</section>

<section class="band torn-photo statement">
  <?= content_image('/images/home/reading-corner-evening.jpg', 'The reading corner, lamp-lit in the evening', 'band-photo', '') ?>
  <div class="shade-over"></div>
  <div class="wrap">
    <h2>Slow mornings, long walks and <em>cosy nights in.</em></h2>
    <div class="btns"><a class="btn btn--light" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book your stay</a></div>
  </div>
</section>

<section class="band" style="--band: var(--primary-light)">
  <div class="wrap overlap">
    <div class="card-torn tilt-l"><div><?= content_image('/images/home/hosts.jpg', 'Your hosts at the front door of Autumn House', '', '4/5') ?><span class="hand">Lauren &amp; David</span></div></div>
    <div class="stack">
      <p class="label">Meet your hosts</p>
      <h2>We're Lauren and David, and <em>we'd love to welcome you.</em></h2>
      <p>Born and raised in the North East, we travelled the world and spent several years in New Zealand before coming home to Northumberland in 2024.</p>
      <p>We look after Autumn House ourselves, from the bookings to the clean linen.</p>
    </div>
  </div>
</section>

<section class="band torn torn--flip">
  <div class="wrap stack" style="gap: 2rem">
    <p class="label centre-text">Make the most of your stay</p>
    <div class="slider" id="home-slider" data-slider tabindex="0" aria-label="Ways to stay (scrolls sideways)">
<?php
// The numbered slides: [title, text, button text, link, photo, photo description]
$slides = [
    ['Family stays', 'A travel cot, children\'s tableware and a games drawer, with swimming, a cinema and Barter Books close by.', 'Plan a family stay', '/family-stays', '/images/home/childrens-books.jpg', 'Paddington books in the twin room'],
    ['Rainy days', 'Board games, books and a Bluetooth speaker live in the living room console.', 'See the house', '/the-house', '/images/home/draughts.jpg', 'A game of draughts on the coffee table'],
    ['Film nights', 'Stream Netflix, Disney+ and more on the projector, or cast from your phone.', 'Ask a question', '/enquire', '/images/home/film-night.jpg', 'The projector set up for a film night'],
    ['Local favourites', 'Kippers in Craster, treats from Turnbulls and walks in Hulne Park.', 'Read the guide', '/the-guide', '/images/guide/wilding.jpg', 'Books on the side table'],
];
foreach ($slides as $i => [$slideTitle, $slideText, $slideButton, $slideLink, $slidePhoto, $slideAlt]):
?>
      <article class="slide">
        <?= content_image($slidePhoto, $slideAlt, '', '4/3') ?>
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
