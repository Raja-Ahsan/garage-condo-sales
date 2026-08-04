<?php

/**
 * Dual Luxury Garage Condos — shared marketing content.
 * Sourced from elite-garage-suites-main/src/lib/property.ts
 */

$cdn = static function (string $key, int $w = 1600): string {
    return sprintf(
        'https://images.builderservices.io/s/cdn/v1.0/i/m?url=https%%3A%%2F%%2Fstorage.googleapis.com%%2Fproduction-fatcow-v1-0-1%%2F961%%2F1961961%%2FpI5RpNmC%%2F%s&methods=resize%%2C%d%%2C5000',
        $key,
        $w
    );
};

$photoKeys = [
    ['key' => '6b1e35ec547d43d4bd61f0423e0c7085', 'caption' => 'Exterior — Side-by-Side Suites'],
    ['key' => '26ebb0c7eded4cd88f9f573a6152f5a5', 'caption' => 'Loft Office — Left Unit'],
    ['key' => 'bf71cbca7bfd435480f2fcf6a533ddfd', 'caption' => 'Main Floor Interior'],
    ['key' => '85493e5ff10042898c7770e0326203a6', 'caption' => 'Upgraded Kitchen'],
    ['key' => 'c08563fef9054387a9fbe094aba5104d', 'caption' => 'Split Staircase & Wire Rails'],
    ['key' => 'f50b4f093d894e8189b0f2e8f2e25022', 'caption' => 'Commercial Roll-Up Door'],
    ['key' => 'ff5abe3c9bcd46d487a4a74b7a96abb8', 'caption' => 'Right Unit Bay'],
];

$photos = array_map(static function (array $p) use ($cdn): array {
    return [
        'key' => $p['key'],
        'caption' => $p['caption'],
        'src' => $cdn($p['key'], 1600),
        'thumb' => $cdn($p['key'], 900),
        'full' => $cdn($p['key'], 2400),
    ];
}, $photoKeys);

return [
    'name' => 'Dual Luxury Garage Condos',
    'tagline' => 'Rare Side-by-Side Luxury Garage Condo Suites in Allen, Texas',
    'address' => '2137 Chelsea Blvd, Allen, TX 75013',
    'community' => 'StarCreek Community · Garages of America',
    'price' => 1280000,
    'price_label' => '$1,280,000',
    'sqft' => 2930,
    'units' => 2,
    'contact' => [
        'name' => 'Daniel Haggerty',
        'email' => 'dahaggerty@gmail.com',
        'phone' => '615-416-3537',
        'phone_href' => 'tel:+16154163537',
    ],
    'photos' => $photos,
    'map_embed_url' => 'https://www.google.com/maps?q='.rawurlencode('2137 Chelsea Blvd, Allen, TX 75013').'&output=embed',
];
