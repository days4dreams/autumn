<?php
/**
 * "Ready to stay?" band with booking buttons. Used near the end of most pages.
 * A page can change the wording by setting $calloutLabel / $calloutText first.
 */
$calloutLabel = $calloutLabel ?? 'Lorem ipsum dolor?';
$calloutText  = $calloutText ?? 'Lorem ipsum dolor sit amet, consectetur <em>adipiscing elit</em> sed do eiusmod.';
?>
<section class="band torn callout" style="--band: var(--shade)">
  <div class="wrap callout-inner">
    <p class="label"><?= e($calloutLabel) ?></p>
    <h2><?= $calloutText /* may contain <em> for italics */ ?></h2>
    <div class="btns">
      <a class="btn btn--fill" href="<?= e($site['booking_url']) ?>"<?= link_attrs($site['booking_url']) ?>>Book your stay</a>
      <a class="btn" href="/enquire">Enquire</a>
    </div>
  </div>
</section>
