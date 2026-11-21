<?php
/**
 * A guest review over a photo, styled like the review cards on Instagram.
 * Wording: put *italics* in <em>…</em>. Change the photo by replacing the
 * placeholder() line with content_image('/images/your-photo.jpg', '').
 */
?>
<section class="band torn-photo review">
  <?= placeholder('', 'review-photo') ?>
  <div class="wrap">
    <figure class="review-card">
      <blockquote>Lorem ipsum <em>dolor sit amet</em>, consectetur adipiscing elit. Sed do eiusmod tempor, <em>ut labore et dolore</em> magna aliqua.</blockquote>
      <figcaption>&ndash; Lorem and Family</figcaption>
    </figure>
  </div>
</section>
