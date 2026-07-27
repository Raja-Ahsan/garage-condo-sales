<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class GenieScissorLiftController extends Controller
{
    public function index(): View
    {
        return view('screens.web.pages.genie-scissor-lift.index', [
            'property' => config('property'),
            'images' => $this->galleryImages(),
            'platform' => [
                'title' => 'Platform',
                'subtitle' => 'Genie GS-1930 · platform performance',
                'rows' => [
                    ['label' => 'Max Platform Height', 'value' => '19 ft'],
                    ['label' => 'Deck Extension', 'value' => '35.83 in'],
                    ['label' => 'Max Working Height', 'value' => '25.56 ft'],
                    ['label' => 'Max Platform Weight Capacity', 'value' => '599.66 lb'],
                    ['label' => 'Platform Inner Length', 'value' => '64.18 in'],
                    ['label' => 'Platform Inner Width', 'value' => '29.14 in'],
                    ['label' => 'Lower Time', 'value' => '25 sec'],
                    ['label' => 'Lift Time', 'value' => '16 sec'],
                ],
            ],
            'dimensions' => [
                'title' => 'Dimensions',
                'subtitle' => 'Genie GS-1930 · overall machine size',
                'rows' => [
                    ['label' => 'Overall Length', 'value' => '6.01 ft', ],
                    ['label' => 'Wheelbase', 'value' => '4.34 ft', ],
                    ['label' => 'Overall Width', 'value' => '2.5 ft'],
                    ['label' => 'Height W/ Rails', 'value' => '6.57 ft'],
                    ['label' => 'Ground Clearance', 'value' => '2.37 in'],
                    ['label' => 'Height W/O Rails', 'value' => '5.75 ft'],
                    ['label' => 'Turning Radius', 'value' => '5.09 ft'],
                ],
            ],
            'specifications' => [
                'title' => 'Specifications',
                'subtitle' => 'Genie GS-1930 · engine & operational',
                'groups' => [
                    [
                        'heading' => 'Engine',
                        'rows' => [
                            ['label' => 'System Voltage', 'value' => '24 V'],
                            ['label' => 'Number Of Batteries', 'value' => '4'],
                        ],
                    ],
                    [
                        'heading' => 'Operational',
                        'rows' => [
                            ['label' => 'Operating Weight', 'value' => '2702.9 lb'],
                            ['label' => 'Hydraulic System Fluid Capacity', 'value' => '3.8 gal'],
                            ['label' => 'Max Speed', 'value' => '2.5 mph'],
                            ['label' => 'Tire Size', 'value' => '12x4.5x8'],
                            ['label' => 'Tire Fill/Type', 'value' => 'Solid Non-Marking'],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * @return list<array{src: string, alt: string, name: string}>
     */
    private function galleryImages(): array
    {
        $images = [];
        $single = public_path('images/scissor-lift.jpg');

        if (File::isFile($single)) {
            $images[] = [
                'name' => 'scissor-lift.jpg',
                'src' => asset('images/scissor-lift.jpg'),
                'alt' => 'Genie GS-1930 Scissor Lift',
            ];
        }

        $directory = public_path('images/scissor-lift');

        if (File::isDirectory($directory)) {
            $fromFolder = collect(File::files($directory))
                ->filter(fn ($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif'], true))
                ->sortBy(fn ($file) => strtolower($file->getFilename()))
                ->values()
                ->map(fn ($file) => [
                    'name' => $file->getFilename(),
                    'src' => asset('images/scissor-lift/'.$file->getFilename()),
                    'alt' => 'Genie Scissor Lift — '.$file->getFilenameWithoutExtension(),
                ])
                ->all();

            $images = array_merge($images, $fromFolder);
        }

        return $images;
    }
}
