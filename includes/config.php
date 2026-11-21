<?php
/**
 * Site settings: the ONE place to change these details.
 * Every page reads from here, so a change here updates the whole site.
 *
 * Making Winter's Nook or Spring Hideaway from this site? Change this file,
 * the colours at the top of css/style.css, and the logo files in images/logos/.
 */

$site = [
    'name'     => 'Autumn House',
    'tagline'  => 'by Staying Season',
    'url'      => 'https://autumn.greensmokestudio.com', // no trailing slash
    'year'     => date('Y'), // updates itself every January

    // Where the "Book now" buttons go. '#' until the booking link is ready.
    'booking_url' => '#',

    // Footer links still to come. '#' until they're ready.
    'staying_season_url' => '#',

    // The Enquire form's emails come "from" this address (replies go to the guest).
    // An address on greensmokestudio.com is less likely to land in spam.
    'mail_from' => 'noreply@greensmokestudio.com',

    'instagram_url'    => 'https://www.instagram.com/atstayingseason/',
    'instagram_handle' => '@atstayingseason',

    // The thin bar across the very top of every page.
    // Leave 'text' empty ('') to switch it off. 'link' is optional.
    'announcement' => [
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing',
        'link' => '',
    ],

    // Shown on Google and when a page is shared, unless a page sets its own.
    'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.',
    'default_image' => '/images/placeholder.svg',
];

/** The main menu, in order. Also used for the "Explore" list in the footer. */
$menu = [
    '/'             => 'Home',
    '/faqs'         => 'FAQs',
    '/the-guide'    => 'The Guide',
    '/the-house'    => 'The House',
    '/family-stays' => 'Family Stays',
    '/enquire'      => 'Enquire',
];

/**
 * Private settings written by the publishing workflow (not in the public
 * repository): currently just the address the Enquire form sends to.
 */
$private = is_file(__DIR__ . '/private.php') ? (include __DIR__ . '/private.php') : [];
$site['enquiry_email'] = $private['enquiry_email'] ?? '';

/** Escape text before printing it into HTML. Use for anything that isn't hard-coded markup. */
function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

/** The current page's clean path, e.g. "/the-guide/slow-weekend" (no query string, no trailing slash). */
function current_path()
{
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $path = preg_replace('#\.(php|html)$#', '', $path);
    if ($path === '/index') {
        $path = '/';
    }
    return ($path === '/') ? '/' : rtrim($path, '/');
}

/** Is this menu link the section we're in? "/the-guide" is also current on every Guide post. */
function is_current($link)
{
    $path = current_path();
    if ($link === '/') {
        return $path === '/';
    }
    return $path === $link || strpos($path, $link . '/') === 0;
}

/** Attributes for a link that may go to another website: those open in a new tab. */
function link_attrs($url)
{
    return preg_match('#^https?://#', $url) ? ' target="_blank" rel="noopener"' : '';
}

/**
 * Print an SVG file from /images straight into the page, so CSS can colour
 * it (logos and illustrations follow the text colour around them).
 * Areas that were white in Affinity take the background colour instead.
 */
function svg($file, $class = '', $label = '')
{
    static $count = 0;
    $path = __DIR__ . '/../images/' . $file;
    if (!preg_match('#^[a-z0-9/_-]+\.svg$#', $file) || !is_file($path)) {
        return '';
    }
    $svg = file_get_contents($path);
    $svg = substr($svg, strpos($svg, '<svg'));                       // drop the XML header
    $svg = preg_replace('/\s(serif:id|xml:space|xmlns:serif|xmlns:xlink|width|height)="[^"]*"/', '', $svg);
    $svg = str_replace(['fill:white;', 'fill:#fff;', 'fill="#fff"'], ['fill:var(--knockout);', 'fill:var(--knockout);', 'fill="var(--knockout)"'], $svg);
    // Each SVG's internal names get a unique prefix so two on one page don't clash.
    $prefix = 's' . (++$count) . '-';
    $svg = preg_replace('/\bid="([^"]+)"/', 'id="' . $prefix . '$1"', $svg);
    $svg = preg_replace('/url\(#([^)]+)\)/', 'url(#' . $prefix . '$1)', $svg);
    $svg = preg_replace('/href="#([^"]+)"/', 'href="#' . $prefix . '$1"', $svg);
    $a11y = ($label !== '') ? ' role="img" aria-label="' . e($label) . '"' : ' aria-hidden="true" focusable="false"';
    $svg = preg_replace('/<svg\b/', '<svg class="' . e($class) . '"' . $a11y, $svg, 1);
    return preg_replace('/>\s+</', '><', $svg);
}

/** The placeholder image, until real photos go in. $ratio is width/height, e.g. '4/5'. */
function placeholder($alt = '', $class = '', $ratio = '')
{
    $style = $ratio ? ' style="aspect-ratio:' . e($ratio) . '"' : '';
    return '<img src="/images/placeholder.svg" alt="' . e($alt) . '" class="photo ' . e($class) . '"' . $style . ' loading="lazy">';
}
