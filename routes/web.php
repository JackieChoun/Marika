<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index'])->name('accueil');
Route::get('/biographie', [IndexController::class, 'biographie'])->name('biographie');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
