<?php
namespace App\Http\Controllers\Admin;

use App\Models\Painting;
use App\Models\Period;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class PaintingController extends Controller
{
    public function index()
    {
        $periods = Period::orderBy('start_date', 'desc')
            ->with('paintings')
            ->get();

        return Inertia::render('Admin/Paintings/Index', [
            'periods' => $periods,
            'title' => 'Oeuvres'
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Paintings/Create', [
            'periods' => Period::orderBy('start_date', 'desc')->get(),
            'title' => 'Ajouter une oeuvre',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'date'         => 'required|date',
            'height'       => 'nullable|numeric',
            'width'        => 'nullable|numeric',
            'technique'    => 'nullable|string|max:100',
            'price'        => 'nullable|numeric',
            'is_available' => 'boolean',
            'image'        => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
            'period_id'    => 'nullable|exists:periods,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('paintings', 'public');
        }

        Painting::create($validated);

        return redirect()->route('admin.paintings.index')->with('success', 'Oeuvre ajoutée avec succès.');
    }

    public function destroy(Painting $painting)
    {
        if ($painting->image_path && Storage::disk('public')->exists($painting->image_path)) {
            Storage::disk('public')->delete($painting->image_path);
        }
        $painting->delete();
        return redirect()->route('admin.paintings.index')->with('success', 'Oeuvre supprimée.');
    }
}
