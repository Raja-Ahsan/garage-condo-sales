<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MapController extends Controller
{
    public function index(): View
    {
        return view('screens.web.pages.map.index', [
            'property' => config('property'),
            'infoCards' => [
                ['label' => 'Address', 'value' => config('property.address')],
                ['label' => 'Community', 'value' => 'StarCreek by Garages of America'],
                ['label' => 'Region', 'value' => 'North Dallas · Collin County'],
            ],
        ]);
    }
}
