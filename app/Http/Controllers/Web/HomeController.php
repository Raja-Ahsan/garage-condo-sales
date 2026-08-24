<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $property = config('property');

        $sliders = Slider::query()
            ->active()
            ->ordered()
            ->get();

        $heroPhotos = $sliders->isNotEmpty()
            ? $sliders->map(fn (Slider $slider) => [
                'key' => 'slider-'.$slider->id,
                'src' => $slider->image_url,
                'caption' => $slider->title,
            ])->values()->all()
            : collect($property['photos'] ?? [])->map(fn ($photo) => [
                'key' => $photo['key'] ?? null,
                'src' => $photo['src'],
                'caption' => $photo['caption'] ?? null,
            ])->values()->all();

        return view('screens.web.pages.home.index', [
            'property' => $property,
            'photos' => $property['photos'] ?? [],
            'heroPhotos' => $heroPhotos,
        ]);
    }
}
