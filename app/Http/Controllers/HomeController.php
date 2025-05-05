<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certification;
use App\Models\Education;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $projects = Project::latest()->take(3)->get();
        return view('home', compact('projects'));
    }

    public function propos(){
        $skills = Skill::all();
        $certifications = Certification::all();
        $educations = Education::all();
        return view('propos.index', compact('skills', 'certifications', 'educations'));
        
    }
}
