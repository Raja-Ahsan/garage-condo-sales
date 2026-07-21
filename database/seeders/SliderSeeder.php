<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Seed hero slides from existing property CDN photos.
     */
    public function run(): void
    {
        $photos = config('property.photos', []);

        foreach ($photos as $index => $photo) {
            Slider::updateOrCreate(
                ['image' => $photo['src']],
                [
                    'title' => $photo['caption'] ?? ('Slide '.($index + 1)),
                    'sort_order' => $index + 1,
                    'status' => 'active',
                ]
            );
        }
    }
}
