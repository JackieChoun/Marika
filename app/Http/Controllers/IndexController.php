<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Period;
use App\Models\Painting;

use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index()
    {
        return Inertia::render('Index', [
            'title' => 'Accueil',
            'latestPaintings' => Painting::latest()->take(4)->get(),
        ]);
    }

    public function biographie()
    {
        return Inertia::render('Biographie', [
            'title' => 'Biographie',
        ]);
    }

    public function periodes()
    {
        return Inertia::render('Periodes', [
            'periods' => Period::orderBy('start_date', 'desc')->get(),
            'title' => 'Périodes',
        ]);
    }

  public function oeuvres(Request $request)
    {
        $query = Painting::with('period');

        // PÉRIODE
        $query->when($request->period, function ($q) use ($request) {
            $q->where('period_id', $request->period);
        });

        // TECHNIQUE
        $query->when($request->technique, function ($q) use ($request) {
            $q->where('technique', "LIKE", $request->technique);
        });

        // DISPONIBILITÉ
        $query->when($request->available !== null, function ($q) use ($request) {
            $q->where('is_available', $request->available);
        });

        // DIMENSIONS (ex: width_min, width_max, etc.)
        $query->when($request->width_min, fn($q) => $q->where('width', '>=', $request->width_min));
        $query->when($request->width_max, fn($q) => $q->where('width', '<=', $request->width_max));

        $query->when($request->height_min, fn($q) => $q->where('height', '>=', $request->height_min));
        $query->when($request->height_max, fn($q) => $q->where('height', '<=', $request->height_max));

        $paintings = $query
            ->orderBy('date', 'desc')
            ->paginate(9)
            ->withQueryString();

        $techniques = Painting::select('technique')
            ->whereNotNull('technique')
            ->distinct()
            ->orderBy('technique')
            ->pluck('technique');

        return Inertia::render('Oeuvres', [
            'paintings' => $paintings,
            'periods' => Period::orderBy('start_date', 'desc')->get(),
            'techniques' => $techniques,
            'filters' => $request->only([
                'period',
                'technique',
                'available',
                'width_min',
                'width_max',
                'height_min',
                'height_max',
            ]),
            'title' => 'Oeuvres',
        ]);
    }

    public function actu()
    {
        return Inertia::render('Actu', [
            'title' => 'Actu',
        ]);
    }

    public function contact()
    {
        return Inertia::render('Contact', [
            'title' => 'Contact',
        ]);
    }
}
