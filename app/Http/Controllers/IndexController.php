<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

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

    public function contact()
    {
        return Inertia::render('Contact', [
            'title' => 'Contact',
        ]);
    }
}
