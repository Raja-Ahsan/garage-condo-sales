<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\Slider;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $property = config('property');

        $recentInquiries = ContactInquiry::query()
            ->latestFirst()
            ->limit(6)
            ->get();

        return view('screens.admin.dashboard.index', [
            'user' => auth()->user(),
            'property' => $property,
            'recentInquiries' => $recentInquiries,
            'stats' => [
                'users' => User::query()->count(),
                'photos' => count($property['photos'] ?? []),
                'units' => (int) ($property['units'] ?? 0),
                'price_label' => $property['price_label'] ?? null,
                'sliders' => Slider::query()->count(),
                'inquiries' => ContactInquiry::query()->count(),
                'new_inquiries' => ContactInquiry::query()->unread()->count(),
            ],
        ]);
    }
}
