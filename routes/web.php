<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\PaintingController;
use App\Http\Controllers\Admin\EventController;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Painting;
use App\Models\Event;
use App\Models\Period;

Route::get('/sitemap.xml', function () {

    $sitemap = Sitemap::create()

        // pages fixes
        ->add(Url::create('/')->setPriority(1.0))
        ->add(Url::create('/biographie')->setPriority(0.8))
        ->add(Url::create('/oeuvres')->setPriority(0.9))
        ->add(Url::create('/periodes')->setPriority(0.8))
        ->add(Url::create('/actu')->setPriority(0.8))
        ->add(Url::create('/contact')->setPriority(0.5));

    // oeuvres
    Painting::all()->each(function ($painting) use ($sitemap) {
        $sitemap->add(
            Url::create("/oeuvres/{$painting->id}")
                ->setLastModificationDate($painting->updated_at)
                ->setPriority(0.7)
        );
    });

    // événements
    Event::all()->each(function ($event) use ($sitemap) {
        $sitemap->add(
            Url::create("/actu/{$event->id}")
                ->setLastModificationDate($event->updated_at)
                ->setPriority(0.7)
        );
    });

    return $sitemap->toResponse(request());
});

// Public
Route::get('/', [IndexController::class, 'index'])->name('accueil');
Route::get('/biographie', [IndexController::class, 'biographie'])->name('biographie');
Route::get('/periodes', [IndexController::class, 'periodes'])->name('periodes');
Route::get('/oeuvres', [IndexController::class, 'oeuvres'])->name('oeuvres');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/actu', [IndexController::class, 'actu'])->name('actu');
Route::get('/events/{event}', [IndexController::class, 'event'])->name('event');

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
