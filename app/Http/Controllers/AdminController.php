<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::all(); // ou Project::latest()->get() si tu veux les plus récents d'abord

        return view('admin.index', compact('projects'));
    }
    public function showProjects()
{
    // Logique pour afficher tous les projets
    $projects = Project::all();
    return view('admin.projects.index', compact('projects'));

}



public function create()
{
    // Logique pour afficher le formulaire de création d'un projet
    return view('admin.projets.create');
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'technologies' => 'nullable|string|max:255',
        'url' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'pdf' => 'nullable|mimes:pdf|max:2048',
    ]);

    // Traitement de l'image
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Traitement du PDF
    if ($request->hasFile('pdf')) {
        $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        $validatedData['url'] = 'storage/' . $pdfPath; // Stocke le lien vers le PDF comme "url"
    }

    Project::create($validatedData);

    return redirect()->route('admin.index')->with('success', 'Projet ajouté avec succès.');
}



public function destroy(Project $project)
{
if ($project->image) {
    Storage::delete('public/' . $project->image);
}

$project->delete();

return redirect()->route('admin.index')->with('success', 'Projet supprimé.');
}

public function show(Project $project)
{
    return view('admin.projets.show', compact('project'));

}
public function edit(Project $project)
{
    return view('admin.projets.edit', compact('project'));
}
public function update(Request $request, Project $project)
{
    // Validation des données
    $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'technologies' => 'nullable|string|max:255',
        'url' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'pdf' => 'nullable|mimes:pdf|max:2048',
    ]);

    // Traitement de l'image si elle est envoyée
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($project->image) {
            Storage::delete('public/' . $project->image);
        }
        // Sauvegarder la nouvelle image
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Traitement du PDF si il est envoyé
    if ($request->hasFile('pdf')) {
        // Sauvegarder le PDF
        $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        $validatedData['url'] = 'storage/' . $pdfPath; // Stocker le lien du PDF dans l'URL
    }

    // Mettre à jour le projet
    $project->update($validatedData);

    // Retourner à la page avec un message flash
    return redirect()->route('admin.index')->with('success', 'Le projet a été modifié avec succès.');
}

}
