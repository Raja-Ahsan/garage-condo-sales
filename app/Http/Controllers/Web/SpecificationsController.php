<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SpecificationsController extends Controller
{
    public function index(): View
    {
        $photos = config('property.photos');

        return view('screens.web.pages.specifications.index', [
            'property' => config('property'),
            'rightUnitImage' => $photos[6]['src'] ?? $photos[0]['src'],
            'leftUnitImage' => $photos[1]['src'] ?? $photos[0]['src'],
            'rightSpecs' => [
                "Footprint: 20' × 40'",
                "Ceilings: 24' – 26'",
                "Loft: 15' × 20' finished office",
                "Door: 12' × 12' electric commercial roll-up",
                'Passage door: 3\'0 × 6\'8" steel + 3\'0 × 6\'0" transom window',
                'Full bath: 3\' glass-enclosed shower, stone vanity top, vinyl plank',
                'Tankless water heater',
                'Commercial-size utility floor sink & hose bib',
                'Upgraded electrical, abundant LED, 72" industrial fan w/ remote',
                'Finished walls (some ½" plywood over sheetrock), fresh paint',
                'Main floor stained concrete',
                'Est. value: $495,000',
            ],
            'leftSpecs' => [
                "Footprint: 22.5' × 50'",
                "Ceilings: 24' – 26'",
                "Loft: 18' × 22.5' finished office w/ 6'0 × 4'0 picture window",
                "Second split-level loft: 18' × 14'",
                "Door: 12' × 15' electric commercial roll-up",
                'Passage door: 3\'0 × 6\'8" steel + 3\'0 × 6\'0" transom window',
                "5× bronzed skylights (2'6 × 4'0)",
                'Larger private ½ bath w/ stone-top vanity',
                'Full kitchen: double SS sink, 12 LF laminate counter, tile backsplash, tankless heater, appliances, commercial microwave, refer, pantry',
                '18-stair double-split staircase w/ 4×4 landings, solid oak trim',
                'Contemporary wire handrails',
                'WiFi, landlines, hardwired internet, upgraded electrical',
                '72" industrial fan w/ remote, abundant LED',
                "8' built-in workstation w/ laminate top",
                'Comparable units at $695k+',
            ],
            'additionalFeatures' => [
                '2× 3\'0 × 6\'8" steel keypad passage doors connecting the units (one upper, one lower)',
                'No stairs currently in Right unit — original staircase retained in storage, available to reinstall',
                'All upgrades & paint approximately 1 year old',
            ],
        ]);
    }
}
