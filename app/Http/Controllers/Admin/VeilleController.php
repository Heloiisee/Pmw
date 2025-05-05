<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Veille;
use Illuminate\Http\Request;

class VeilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veilles = Veille::latest()->paginate(10);
        return view('veilles.index', compact('veilles'));
    }
    /**
     * Display a listing of the resource for admin.
     */
    public function adminIndex()
    {
        $veilles = Veille::latest()->paginate(10);
        return view('admin.veilles.index', compact('veilles'));
    }

    /**
     * Show the form for viewing a specific resource.
     */
    public function show(string $id)
    {
        $veille = Veille::findOrFail($id);
        return view('admin.veilles.show', compact('veille'));
    }

    public function showVeilles()
    {
        $veilles = Veille::all();
        return view('veilles.index', compact('veilles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.veilles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'titre' => 'required|string|max:255',
        'contenu' => 'nullable|string',
        'type' => 'required|in:lien,pdf',
        'source' => 'nullable|url',
        'pdf_file' => 'nullable|mimes:pdf|max:2048',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'categorie' => 'nullable|string|max:255',
    ]);

    // Gestion du PDF
    if ($request->type === 'pdf' && $request->hasFile('pdf_file')) {
        $data['source'] = $request->file('pdf_file')->store('pdfs', 'public');
    }

    // Gestion de l’image
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    Veille::create($data);

    return redirect()->route('admin.veilles.index')->with('success', 'Veille ajoutée avec succès.');
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $veille = Veille::findOrFail($id);
        return view('admin.veilles.edit', compact('veille'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $veille = Veille::findOrFail($id);
        $veille->delete();

        return redirect()->route('admin.veilles.index')->with('success', 'Veille supprimée avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $veille = Veille::findOrFail($id);

        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'nullable|string',
            'type' => 'required|in:lien,pdf',
            'source' => 'nullable|url',
            'pdf_file' => 'nullable|mimes:pdf|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'categorie' => 'nullable|string|max:255',
        ]);

        if ($request->type === 'pdf' && $request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
            $data['source'] = $pdfPath;
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $veille->update($data);

        return redirect()->route('admin.veilles.index')->with('success', 'Veille mise à jour avec succès.');
    }
}
