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
        $paintings = Painting::with('period')
            ->orderBy('date', 'desc')
            ->paginate(9)
            ->withQueryString();

        return Inertia::render('Oeuvres', [
            'paintings' => $paintings,
            'periods' => Period::orderBy('start_date', 'desc')->get(),
            'title' => 'Oeuvres',
        ]);
    }

    public function contact()
    {
        return Inertia::render('Contact', [
            'title' => 'Contact',
        ]);
    }
}
