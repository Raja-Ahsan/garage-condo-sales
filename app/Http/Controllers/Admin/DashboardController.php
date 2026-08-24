<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $property = config('property');

        return view('screens.admin.dashboard.index', [
            'user' => auth()->user(),
            'property' => $property,
            'stats' => [
                'users' => User::query()->count(),
                'photos' => count($property['photos'] ?? []),
                'units' => (int) ($property['units'] ?? 0),
                'price_label' => $property['price_label'] ?? null,
            ],
        ]);
    }
}
