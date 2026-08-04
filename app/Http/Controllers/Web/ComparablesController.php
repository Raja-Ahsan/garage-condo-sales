<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ComparablesController extends Controller
{
    public function index(): View
    {
        return view('screens.web.pages.comparables.index', [
            'property' => config('property'),
            'compCards' => [
                [
                    'label' => 'Comparable Low',
                    'value' => '$485,000',
                    'note' => 'Single-unit sale · similar footprint · standard finish',
                    'highlight' => true,
                ],
                [
                    'label' => 'Comparable High',
                    'value' => '$795,000',
                    'note' => 'Single-unit sale · upgraded interior · loft',
                    'highlight' => true,
                ],
                [
                    'label' => 'Two Singles Combined',
                    'value' => '$1,280,000',
                    'note' => 'At the mid-comp of $745,000 per unit',
                    'highlight' => false,
                ],
            ],
            'premiumReasons' => [
                [
                    'title' => 'Physically Irreplaceable',
                    'body' => 'The community is fully built out; a new side-by-side pair with connected upper and lower passage doors will not come to market again.',
                ],
                [
                    'title' => 'Fully Upgraded',
                    'body' => 'All upgrades and paint are approximately one year old — the next owner steps into a finished asset.',
                ],
                [
                    'title' => 'Two Purchase Bonus Options',
                    'body' => 'Double Bonus w/ Accepted Cash Offer.',
                    'href' => 'web.bentley',
                ],
                [
                    'title' => 'No Commission',
                    'body' => 'Direct-from-owner sale preserves value for the buyer that would otherwise be paid in brokerage.',
                ],
            ],
        ]);
    }
}
