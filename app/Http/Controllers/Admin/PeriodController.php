<?php
namespace App\Http\Controllers\Admin;

use App\Models\Period;
use App\Models\Painting;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class PeriodController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Periods/Index', [
            'periods' => Period::orderBy('start_date', 'desc')->get(),
            'title' => 'Périodes'
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Periods/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('periods', 'public');
        }

        Period::create($validated);

        return redirect()->route('admin.periods.index')->with('success', 'Période créée avec succès.');
    }

    public function edit(Period $period)
    {
        return Inertia::render('Admin/Periods/Edit', [
            'period' => $period
        ]);
    }

    public function update(Request $request, Period $period)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('periods', 'public');
        }

        $period->update($validated);

        return redirect()->route('admin.periods.index')->with('success', 'Période mise à jour.');
    }

    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('admin.periods.index')->with('success', 'Période supprimée.');
    }
}
