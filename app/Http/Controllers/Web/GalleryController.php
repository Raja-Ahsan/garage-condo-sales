<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        return view('screens.web.pages.gallery.index', [
            'property' => config('property'),
            'images' => $this->galleryImages(),
        ]);
    }

    /**
     * @return list<array{src: string, alt: string, name: string}>
     */
    private function galleryImages(): array
    {
        $directory = public_path('images/gallery');

        if (! File::isDirectory($directory)) {
            return [];
        }

        return collect(File::files($directory))
            ->filter(fn ($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif'], true))
            ->sortBy(fn ($file) => strtolower($file->getFilename()))
            ->values()
            ->map(fn ($file) => [
                'name' => $file->getFilename(),
                'src' => asset('images/gallery/'.$file->getFilename()),
                'alt' => 'Property gallery — '.$file->getFilenameWithoutExtension(),
            ])
            ->all();
    }
}
