<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\PaintingController;
use App\Http\Controllers\Admin\EventController;

// Public
Route::get('/', [IndexController::class, 'index'])->name('accueil');
Route::get('/biographie', [IndexController::class, 'biographie'])->name('biographie');
Route::get('/periodes', [IndexController::class, 'periodes'])->name('periodes');
Route::get('/oeuvres', [IndexController::class, 'oeuvres'])->name('oeuvres');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/actu', [IndexController::class, 'actu'])->name('actu');

// Admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});
Route::prefix('admin', 'verified')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {
        Route::resource('periods', PeriodController::class);
        Route::resource('paintings', PaintingController::class);
        Route::resource('events', EventController::class);
    });

require __DIR__.'/settings.php';
