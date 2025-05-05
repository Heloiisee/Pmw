<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    /**
     * Affiche la liste côté public.
     */
    public function index()
    {
        $certifications = Certification::all();
        return view('certifications.index', compact('certifications'));
    }

    /**
     * Affiche la liste côté admin.
     */
    public function indexAdmin()
    {
        $certifications = Certification::all();
        return view('admin.certifications.index', compact('certifications'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.certifications.create');
    }

    /**
     * Enregistre une nouvelle certification.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        Certification::create([
            'nom' => $request->nom,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification ajoutée avec succès !');
    }

    /**
     * Affiche une certification spécifique.
     */
    public function show(string $id)
    {
        $certification = Certification::findOrFail($id);
        return view('admin.certifications.show', compact('certification'));
    }

    /**
     * Affiche le formulaire d’édition.
     */
    public function edit(string $id)
    {
        $certification = Certification::findOrFail($id);
        return view('admin.certifications.edit', compact('certification'));
    }

    /**
     * Met à jour une certification.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $certification = Certification::findOrFail($id);
        $certification->update([
            'nom' => $request->nom,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification mise à jour avec succès.');
    }

    /**
     * Supprime une certification.
     */
    public function destroy(string $id)
    {
        $certification = Certification::findOrFail($id);
        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('success', 'Certification supprimée avec succès.');
    }
}
