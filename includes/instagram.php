<?php
/**
 * The row of six photos above the footer, with a button to Instagram.
 * Photos: change the list below: [photo, description of the photo].
 */
$instagramPhotos = [
    ['/images/instagram/house-sign.jpg', 'The Autumn House sign by the front door'],
    ['/images/instagram/autumn-stems.jpg', 'Autumn leaves in a vase on the windowsill'],
    ['/images/instagram/shelf.jpg', 'A vase, brass bell and bird print on a shelf'],
    ['/images/instagram/basin.jpg', 'The brass tap and green tiles in the bathroom'],
    ['/images/instagram/green-lamp.jpg', 'A green lamp on the bedroom windowsill'],
    ['/images/instagram/green-stairs.jpg', 'The painted green staircase'],
];
?>
<section class="instagram band torn" aria-label="Instagram">
  <div class="wrap">
    <div class="instagram-row">
<?php foreach ($instagramPhotos as [$src, $alt]): ?>
      <?= content_image($src, $alt, '', '1/1') ?>
<?php endforeach; ?>
      <a class="btn btn--paper instagram-handle" href="<?= e($site['instagram_url']) ?>"<?= link_attrs($site['instagram_url']) ?>><?= e($site['instagram_handle']) ?></a>
    </div>
  </div>
</section>
