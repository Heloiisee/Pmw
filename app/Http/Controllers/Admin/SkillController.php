<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    public function indexAdmin()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'niveau' => 'required|integer|min:0|max:100',
        'icon' => 'nullable|string|max:255',
    ]);

    Skill::create([
        'nom' => $request->nom,
        'niveau' => $request->niveau,
        'icon' => $request->icon,
    ]);

    return redirect()->route('admin.skills.index')->with('success', 'Compétence ajoutée avec succès !');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'niveau' => 'required|integer|min:0|max:100',
            'icon' => 'required|string|max:255',

        ]);
        $skill = Skill::findOrFail($id);
        $skill->update([
            'nom' => $request->nom,
            'niveau' => $request->niveau,
            'icon' => $request->icon,
        ]);
        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }

}
