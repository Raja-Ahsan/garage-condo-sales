<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class BentleyPromotionController extends Controller
{
    public function index(): View
    {
        $genie = app(GenieScissorLiftController::class)->content();

        return view('screens.web.pages.bentley-promotion.index', [
            'property' => config('property'),
            'images' => $this->galleryImages(),
            'dimensions' => [
                'title' => '2013 Bentley Mulsanne Dimensions',
                'subtitle' => '(base), 6.8L, Premium Unleaded Petrol, 8 SPEED AUTOMATIC',
                'rows' => [
                    ['label' => 'Height', 'metric' => '1526 mm', 'imperial' => '5 ft 0 in'],
                    ['label' => 'Width', 'metric' => '1926 mm', 'imperial' => '6 ft 4 in'],
                    ['label' => 'Length', 'metric' => '5576 mm', 'imperial' => '18 ft 4 in'],
                    ['label' => 'Ground clearance unladen', 'metric' => '164 mm', 'imperial' => '6 in'],
                    ['label' => 'Wheelbase', 'metric' => '3266 mm', 'imperial' => '10 ft 9 in'],
                    ['label' => 'Weight', 'metric' => '2595 kg', 'imperial' => '5721 lbs'],
                    ['label' => 'Tyre size', 'metric' => '265/45 R20', 'imperial' => '265/45 R20'],
                ],
            ],
            'vehicleDetails' => [
                'title' => '2013 Bentley Mulsanne',
                'subtitle' => 'Beluga Solid · Autumn-hand stitched Premium Leather Interior · Last model available with mirror matched Burlwood veneer trim.',
                'rows' => [
                    ['label' => 'Mileage', 'value' => '22,155'],
                    ['label' => 'Trim', 'value' => 'SEDAN 4D'],
                    ['label' => 'Engine', 'value' => 'V8, TWIN TURBO, 6.8 LITER'],
                    ['label' => 'Transmission Detail', 'value' => 'AUTOMATIC, 8-SPD'],
                    ['label' => 'Drivetrain', 'value' => 'RWD'],
                    ['label' => 'MPG', 'value' => 'CITY 11 / HWY 18'],
                    ['label' => 'Exterior Color', 'value' => 'BELUGA SOLID'],
                    ['label' => 'Interior Color', 'value' => 'TAN'],
                    ['label' => 'VIN', 'value' => 'SCBBB7ZHXDC018291'],
                    ['label' => 'Stock No.', 'value' => '018291'],
                ],
            ],
            'geniePlatform' => $genie['platform'],
            'genieDimensions' => $genie['dimensions'],
            'genieSpecifications' => $genie['specifications'],
            'genieImages' => $genie['images'],
        ]);
    }

    /**
     * @return list<array{src: string, alt: string, name: string}>
     */
    private function galleryImages(): array
    {
        $directory = public_path('images/bentleypromotion');

        if (! File::isDirectory($directory)) {
            return [];
        }

        return collect(File::files($directory))
            ->filter(fn ($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif'], true))
            ->sortBy(fn ($file) => strtolower($file->getFilename()))
            ->values()
            ->map(fn ($file) => [
                'name' => $file->getFilename(),
                'src' => asset('images/bentleypromotion/'.$file->getFilename()),
                'alt' => 'Bentley promotion — '.$file->getFilenameWithoutExtension(),
            ])
            ->all();
    }
}
