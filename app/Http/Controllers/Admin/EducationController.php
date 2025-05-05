<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $educations = Education::orderBy('date_debut', 'desc')->get();
        return view('educations.index', compact('educations'));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function indexAdmin()
    {
        $educations = Education::all();
        return view('admin.educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'description' => 'nullable|string',
        ]);

        Education::create([
            'titre' => $request->titre,
            'etablissement' => $request->etablissement,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.educations.index')->with('success', 'Éducation ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $education = Education::findOrFail($id);
        return view('admin.educations.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education = Education::findOrFail($id);
        return view('admin.educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'description' => 'nullable|string',
        ]);

        $education = Education::findOrFail($id);
        $education->update([
            'titre' => $request->titre,
            'etablissement' => $request->etablissement,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.educations.index')->with('success', 'Éducation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('admin.educations.index')->with('success', 'Éducation supprimée avec succès.');
    }
}
