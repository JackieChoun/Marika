<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actu;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class ActuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Actu/Index', [
            'title' => 'Actualités',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Actu $actu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actu $actu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actu $actu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actu $actu)
    {
        //
    }
}
