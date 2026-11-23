<?php
/**
 * A guest review over a photo, styled like the review cards on Instagram.
 *
 * The reviews live in the list below. A page picks one by setting
 * $review = 'family'; (for example) before including this file;
 * without that, the first one is shown.
 * Wording: put the words to stress in <em>…</em>. Change the photo by
 * changing its path.
 */
$reviews = [
    'home' => [
        'text'  => 'Lauren was <em>warm and welcoming</em> from the moment I booked. The house was warm and welcoming with <em>everything thought of.</em>',
        'name'  => 'Lyndsay, May 2026',
        'photo' => '/images/home/wood-burner.jpg',
    ],
    'guide' => [
        'text'  => 'A lovely little gem of a cottage <em>in the heart of Alnwick.</em> Homely and <em>has everything you need</em> for a lovely stay.',
        'name'  => 'Jill, February 2026',
        'photo' => '/images/home/wood-burner.jpg',
    ],
    'family' => [
        'text'  => 'Beautifully decorated, this felt like <em>a home away from home.</em> Had everything we needed for travel with my seven-month-old. <em>The travel cot and highchair were immaculate!</em>',
        'name'  => 'Ciara, July 2025',
        'photo' => '/images/family/double-bedroom.jpg',
    ],
];
$shown = $reviews[$review ?? 'home'] ?? reset($reviews);
?>
<section class="band torn-photo review">
  <?= content_image($shown['photo'], '', 'review-photo') ?>
  <div class="wrap">
    <figure class="review-card">
      <blockquote><?= $shown['text'] /* may contain <em> for italics */ ?></blockquote>
      <figcaption>&ndash; <?= e($shown['name']) ?></figcaption>
    </figure>
<?php if (!empty($site['ratings'])): ?>
    <ul class="ratings" aria-label="Guest ratings, <?= e($site['ratings_as_of']) ?>">
<?php foreach ($site['ratings'] as $r): ?>
      <li><span class="ratings-score"><?= e($r['score']) ?></span><span class="ratings-detail">out of <?= e($r['out_of']) ?> on <?= e($r['site']) ?><br><?= e($r['count']) ?> reviews</span></li>
<?php endforeach; ?>
    </ul>
<?php endif; ?>
  </div>
</section>
