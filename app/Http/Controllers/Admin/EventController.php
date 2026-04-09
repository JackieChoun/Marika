<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->get('type'); // null | stage | exposition

        $events = Event::query()
            ->when($type, fn ($q) => $q->where('type', $type))
            ->orderBy('date_start', 'desc')
            ->get();

        return Inertia::render('Admin/Events/Index', [
            'title' => 'Actualités & Masterclass',
            'events' => $events,
            'filters' => [
                'type' => $type,
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Events/Create', [
            'title' => 'Ajouter une actualité ou une masterclass',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'type' => 'required|in:stage,exposition',
        'date_start' => 'required|date',
        'date_end' => 'nullable|date|after_or_equal:date_start',
        'location' => 'required|string|max:255',
        'description' => 'nullable|string',
        'external_link' => 'nullable|url',
        'image' => 'nullable|image|max:2048',
    ]);

    // upload image
    if ($request->hasFile('image')) {
        $validated['image_path'] = $request->file('image')->store('events', 'public');
    }

    // création
    \App\Models\Event::create($validated);

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Événement créé');
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
    public function destroy(Event $event)
{

    if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
        Storage::disk('public')->delete($event->image_path);
    }

    $event->delete();

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Événement supprimé');
}
}
