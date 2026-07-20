<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ComparablesController;
use App\Http\Controllers\Web\ContactController;
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
| Cuba admin (auth middleware to be tightened in a later phase)
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return view('screens.admin.dashboard.index');
})->name('admin.dashboard');

require __DIR__.'/auth.php';
