<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Period;
use App\Models\Painting;
use App\Models\Event;

use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index()
    {
        return Inertia::render('Index', [
            'title' => 'Accueil',
            'latestPaintings' => Painting::latest()->take(5)->get(),
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

        $request->validate([
            'period.*'   => 'nullable|exists:periods,id',
            'technique'  => 'nullable|array',
            'available'  => 'nullable|boolean',
            'width_min'  => 'nullable|integer|min:0',
            'width_max'  => 'nullable|integer|min:0',
            'height_min' => 'nullable|integer|min:0',
            'height_max' => 'nullable|integer|min:0',
        ]);

        $query = Painting::with('period');

        // FILTRES
        $periods = (array) $request->input('period', []);
        $techniques = (array) $request->input('technique', []);

        $query->when(!empty($periods), fn($q) => $q->whereIn('period_id', $periods));
        $query->when(!empty($techniques), fn($q) => $q->whereIn('technique', $techniques));
        

        // DISPONIBILITÉ
        $query->when($request->has('available') && $request->available !== '', function ($q) use ($request) {
        $q->where('is_available', filter_var($request->available, FILTER_VALIDATE_BOOLEAN));
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
            'events' => Event::orderBy('date_start', 'desc')->get(),
            'title' => 'Actu',
        ]);
    }

    public function event(Event $event)
    {
        return Inertia::render('Event', [
            'event' => $event,
            'title' => $event->title,
        ]);
    }

    public function contact()
    {
        return Inertia::render('Contact', [
            'title' => 'Contact',
        ]);
    }
}
