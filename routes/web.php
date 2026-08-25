<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\BentleyPromotionController;
use App\Http\Controllers\Web\ComparablesController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\GalleryController;
use App\Http\Controllers\Web\GenieScissorLiftController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MapController;
use App\Http\Controllers\Web\SpecificationsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public website
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('web.home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('web.gallery');
Route::get('/bentley-promotion', [BentleyPromotionController::class, 'index'])->name('web.bentley');
Route::get('/genie-scissor-lift', [GenieScissorLiftController::class, 'index'])->name('web.genie');
Route::get('/specifications', [SpecificationsController::class, 'index'])->name('web.specifications');
Route::get('/comparables', [ComparablesController::class, 'index'])->name('web.comparables');
Route::get('/map', [MapController::class, 'index'])->name('web.map');
Route::get('/contact', [ContactController::class, 'create'])->name('web.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('web.contact.store');

/*
|--------------------------------------------------------------------------
| Breeze authenticated area
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Cuba admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('sliders', SliderController::class)->except(['show']);
    Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::patch('inquiries/{inquiry}', [InquiryController::class, 'update'])->name('inquiries.update');
    Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
});

require __DIR__.'/auth.php';
