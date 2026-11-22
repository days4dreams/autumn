<?php
/*
 * The House. Wording is written straight in below: edit it here.
 * The photo grid takes any number of photos: add a line to $housePhotos.
 */
$title = 'The House';
$description = 'Inside Autumn House: a two-bedroom stone cottage in Alnwick with a new kitchen and bathroom, a cosy living room and gardens front and back.';
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';

// The photo grid: [photo, description]. Add or remove lines freely; photos keep their own shape.
$housePhotos = [
    ['/images/house/kitchen.jpg', 'The kitchen'],
    ['/images/house/coffee-table.jpg', 'The coffee table and writing bureau in the sitting room'],
    ['/images/house/double-bed.jpg', 'The double bed with gingham bedding and green cushions'],
    ['/images/house/shower.jpg', 'The shower over the bath, with brass fittings and green tiles'],
    ['/images/house/rocking-chair.jpg', 'The rocking chair in the evening lamplight'],
    ['/images/house/kitchen-window.jpg', 'The kitchen sink under the window'],
    ['/images/house/dresser.jpg', 'The dresser in the double bedroom'],
    ['/images/house/towel-ladder.jpg', 'The towel ladder in the bathroom'],
    ['/images/house/writing-desk.jpg', 'The writing bureau, set up as a desk'],
    ['/images/house/pressed-flowers.jpg', 'Pressed flowers in a gold frame'],
    ['/images/house/stairs.jpg', 'The painted green stairs'],
    ['/images/house/cushions.jpg', 'Cushions on the double bed'],
];
?>

<header class="wrap page-head centre-text">
  <h1>Stone walls, <em>warm</em> &amp; welcoming rooms</h1>
</header>

<section class="band band--tight" style="--band: var(--primary-light); padding-block: 0">
  <div class="split" style="gap: 0; align-items: stretch">
    <div class="stack wrap" style="padding-block: var(--band-space); max-width: 36rem; margin-inline: auto">
      <p class="label">The house</p>
      <h2>A stone-built Alnwick cottage with <em>a brand new kitchen and bathroom</em>, two bedrooms and a garden front and back.</h2>
      <p>In the living room, shelves of books and artwork flank the chimney breast. A vintage Parker Knoll rocking chair waits by the hearth, and a wool blanket waits on the sofa for a good book and a hot drink.</p>
      <p>Upstairs, the main bedroom has a double bed and built-in wardrobes; the second has two single beds. Both have reading lamps and blackout curtains.</p>
      <p>The bright kitchen has an induction hob, oven, microwave and washer-dryer, and the bathroom has a bath with a shower over it and underfloor heating. Free Wi-Fi throughout.</p>
    </div>
    <?= content_image('/images/house/sitting-room-alcove.jpg', 'An alcove in the sitting room with a writing bureau and shelves', '', '') ?>
  </div>
</section>

<section class="band torn">
  <div class="wrap gallery">
<?php foreach ($housePhotos as [$src, $alt]): ?>
    <?= content_image($src, $alt) ?>
<?php endforeach; ?>
  </div>
</section>

<?php $houseFaqs = faq_list('house'); if ($houseFaqs !== ''): ?>
<section class="band torn torn--flip" style="--band: var(--primary-light)">
  <div class="wrap split" style="align-items: start">
    <div class="stack">
      <p class="label">Good to know</p>
      <h2>Questions about <em>the house</em></h2>
      <p><a href="/faqs">See all FAQs</a></p>
    </div>
    <?= $houseFaqs ?>
  </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/includes/callout.php'; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
