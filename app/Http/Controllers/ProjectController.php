<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Logique pour récupérer tous les projets
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function show($id)
    {
        // Logique pour afficher un projet spécifique
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function showProjects()
    {
        // Logique pour afficher tous les projets
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        // Logique pour afficher le formulaire de création d'un projet
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        // Logique pour enregistrer un nouveau projet
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'technologies' => 'nullable|string|max:255',
            'url' => 'nullable|url',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
    }

    public function destroy(Project $project)
{
    if ($project->image) {
        Storage::delete('public/' . $project->image);
    }

    $project->delete();
    
    return redirect()->route('projects.index')->with('success', 'Projet supprimé.');
}

}
