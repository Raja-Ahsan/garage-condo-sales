<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('screens.web.pages.home.index', [
            'property' => config('property'),
            'photos' => config('property.photos'),
        ]);
    }
}
