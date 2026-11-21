<?php
/**
 * Everything from <!DOCTYPE> to the opening <body>, plus the announcement bar
 * and the site header with the menu.
 *
 * Set these in the page BEFORE including this file:
 *   $title        Page title, e.g. "FAQs" (the site name is added automatically)
 *   $description  One or two sentences for Google and social media (about 150 characters)
 *   $overPhoto    true when the page opens with a full-width photo: the header
 *                 then sits on top of the photo in light colours
 *   $ogImage      Optional. Image for social media shares, e.g. "/images/my-photo.jpg"
 */
require_once __DIR__ . '/config.php';

$fullTitle   = (isset($title) && $title !== '') ? $title . ' | ' . $site['name'] : $site['name'] . ' ' . $site['tagline'];
$description = $description ?? $site['description'];
$canonical   = $site['url'] . (current_path() === '/' ? '/' : current_path());
$shareImage  = $site['url'] . ($ogImage ?? $site['default_image']);
$overPhoto   = !empty($overPhoto);
// Adding ?v= and the file's date makes browsers fetch the stylesheet again after each change.
$cssVersion  = @filemtime(__DIR__ . '/../css/style.css') ?: 1;
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($fullTitle) ?></title>
  <meta name="description" content="<?= e($description) ?>">
<?php if (!$site['launched']): ?>
  <meta name="robots" content="noindex, nofollow"><!-- until launch: see 'launched' in includes/config.php -->
<?php endif; ?>
  <link rel="canonical" href="<?= e($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e($site['name']) ?>">
  <meta property="og:title" content="<?= e($fullTitle) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:image" content="<?= e($shareImage) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <link rel="preload" href="/fonts/baskervville.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="/fonts/dm-sans.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="/css/style.css?v=<?= e($cssVersion) ?>">
  <link rel="icon" href="/images/favicon.svg" type="image/svg+xml">
  <script src="/js/site.js" defer></script>
</head>
<body<?= $overPhoto ? ' class="over-photo"' : '' ?>>
<a class="skip-link" href="#main">Skip to content</a>
<?php if ($site['announcement']['text'] !== ''): ?>
<div class="announcement" id="announcement">
  <div class="wrap">
    <p><?php if ($site['announcement']['link'] !== ''): ?><a href="<?= e($site['announcement']['link']) ?>"<?= link_attrs($site['announcement']['link']) ?>><?= e($site['announcement']['text']) ?></a><?php else: ?><?= e($site['announcement']['text']) ?><?php endif; ?></p>
    <button type="button" class="announcement-close" aria-label="Close announcement" hidden>&times;</button>
  </div>
</div>
<?php endif; ?>
<?php include __DIR__ . '/header.php'; ?>
<main id="main">
