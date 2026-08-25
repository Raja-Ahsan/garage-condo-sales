<?php

namespace Database\Seeders;

use App\Models\CmsModule;
use Illuminate\Database\Seeder;

class CmsModuleSeeder extends Seeder
{
    /**
     * Sidebar modules for the property admin.
     * Listing routes only — create actions live on those pages.
     */
    public function run(): void
    {
        CmsModule::updateOrCreate(
            ['route_name' => 'admin.dashboard'],
            [
                'name' => 'Dashboard',
                'icon' => 'fa-regular fa-house',
                'sort_order' => 1,
                'status' => 'active',
                'parent_id' => 0,
            ]
        );

        CmsModule::updateOrCreate(
            ['route_name' => 'admin.sliders.index'],
            [
                'name' => 'Slider',
                'icon' => 'fa-solid fa-images',
                'sort_order' => 2,
                'status' => 'active',
                'parent_id' => 0,
            ]
        );

        CmsModule::updateOrCreate(
            ['route_name' => 'admin.inquiries.index'],
            [
                'name' => 'Inquiries',
                'icon' => 'fa-solid fa-envelope',
                'sort_order' => 3,
                'status' => 'active',
                'parent_id' => 0,
            ]
        );

        $allowed = [
            'admin.dashboard',
            'admin.sliders.index',
            'admin.inquiries.index',
        ];

        CmsModule::query()
            ->where(function ($q) use ($allowed) {
                $q->whereNotIn('route_name', $allowed)
                    ->orWhereNull('route_name');
            })
            ->delete();
    }
}
