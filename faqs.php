<?php
/*
 * FAQs page. The questions themselves live in content/faqs.md (one file for
 * the whole site); this page shows all of them, in their groups.
 */
$title = 'FAQs';
$description = 'Answers to common questions about staying at Autumn House in Alnwick: check-in, parking, the house, families, pets and booking direct.';
require __DIR__ . '/includes/content.php';
require __DIR__ . '/includes/head.php';
?>

<section class="band band--tight">
  <div class="wrap faq-page">
    <div class="faq-page-intro stack">
      <h1>Frequently asked questions</h1>
      <p class="lead">Everything you need to know <span class="hand">before you arrive</span></p>
      <p>Check-in times, parking, what's in the kitchen, bringing the dog and booking direct.</p>
      <p>Anything we haven't answered? <a href="/enquire">Send us a message</a>. We're always happy to help.</p>
    </div>
    <div>
<?php foreach (faqs() as $group): ?>
      <div class="faq-group">
<?php if ($group['name'] !== ''): ?>
        <h2 class="label"><?= e($group['name']) ?></h2>
<?php endif; ?>
        <div class="faq">
<?php foreach ($group['questions'] as $q): ?>
          <?= faq_item($q) ?>

<?php endforeach; ?>
        </div>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/callout.php'; ?>
<?php include __DIR__ . '/includes/footer.php'; ?>
