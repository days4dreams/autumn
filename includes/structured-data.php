<?php
/**
 * Structured data for Google: describes Autumn House as a place to stay,
 * so search results can show its details. Shown on the homepage only.
 * The facts come from includes/config.php and the list below.
 * Test it at https://search.google.com/test/rich-results
 */
$amenities = ['Free Wi-Fi', 'Free on-street parking', 'Kitchen', 'Washer-dryer', 'Bath with shower',
    'Underfloor heating', 'Electric stove', 'Projector with streaming', 'Travel cot', 'Highchair',
    'Baby bath', "Children's books and games", 'Garden', 'Dedicated workspace'];

$data = [
    '@context' => 'https://schema.org',
    '@type' => 'LodgingBusiness',
    'name' => $site['name'],
    'description' => $site['description'],
    'url' => $site['url'] . '/',
    'image' => [
        $site['url'] . '/images/home/living-room-fire.jpg',
        $site['url'] . '/images/home/kitchen.jpg',
        $site['url'] . '/images/home/twin-room.jpg',
        $site['url'] . '/images/house/double-bed.jpg',
    ],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $site['address']['street'],
        'addressLocality' => $site['address']['town'],
        'addressRegion' => $site['address']['county'],
        'postalCode' => $site['address']['postcode'],
        'addressCountry' => $site['address']['country'],
    ],
    'numberOfRooms' => 2,
    'maximumAttendeeCapacity' => 4,
    'petsAllowed' => false,
    'smokingAllowed' => false,
    'checkinTime' => '15:00',
    'checkoutTime' => '11:00',
    'amenityFeature' => array_map(function ($name) {
        return ['@type' => 'LocationFeatureSpecification', 'name' => $name, 'value' => true];
    }, $amenities),
    'sameAs' => $site['also_listed_at'],
];
?>
  <script type="application/ld+json"><?= json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_HEX_TAG) ?></script>
