<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\VeilleController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\EducationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projets', [ProjectController::class, 'showProjects'])->name('projects.index');
Route::get('/projets/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/veilles', [VeilleController::class, 'index'])->name('veilles.index');
Route::get('/propos',[HomeController::class, 'propos'])->name('propos.index');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::middleware(['auth'])->group(function () {
    // Admin routes destinées aux projets
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/projets/create', [AdminController::class, 'create'])->name('admin.projets.create');
    Route::get('/admin/projets/{project}', [AdminController::class, 'show'])->name('admin.projets.show');
    Route::get('/admin/projets/{project}/edit', [AdminController::class, 'edit'])->name('admin.projets.edit');
    Route::post('/admin/projets', [AdminController::class, 'store'])->name('admin.projets.store');
    Route::patch('/admin/projets/{project}', [AdminController::class, 'update'])->name('admin.projets.update');
    Route::delete('/admin/projets/{project}', [AdminController::class, 'destroy'])->name('admin.projets.destroy');
    

    // Admin routes destinées aux veilles
    Route::get('/admin/veilles/create', [VeilleController::class, 'create'])->name('admin.veilles.create');
    Route::get('/admin/veilles/{veille}', [VeilleController::class, 'show'])->name('admin.veilles.show');
    Route::post('/admin/veilles', [VeilleController::class, 'store'])->name('admin.veilles.store');
    Route::patch('/admin/veilles/{veille}', [VeilleController::class, 'update'])->name('admin.veilles.update');
    Route::get('/admin/veilles/{veille}/edit', [VeilleController::class, 'edit'])->name('admin.veilles.edit');
    Route::delete('/admin/veilles/{veille}', [VeilleController::class, 'destroy'])->name('admin.veilles.destroy');
    Route::get('/admin/veilles', [VeilleController::class, 'adminIndex'])->name('admin.veilles.index');

    // Admin routes destinées aux compétences
    Route::get('/admin/skills/create', [SkillController::class, 'create'])->name('admin.skills.create');
    Route::get('/admin/skills/{skill}', [SkillController::class, 'show'])->name('admin.skills.show');
    Route::post('/admin/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::patch('/admin/skills/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::get('/admin/skills/{skill}/edit', [SkillController::class, 'edit'])->name('admin.skills.edit');
    Route::delete('/admin/skills/{skill}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');
    Route::get('/admin/skills', [SkillController::class, 'indexAdmin'])->name('admin.skills.index');
    
    // Admin routes destinées aux certifications
    Route::get('/admin/certifications/create', [CertificationController::class, 'create'])->name('admin.certifications.create');
    Route::get('/admin/certifications/{certification}', [CertificationController::class, 'show'])->name('admin.certifications.show');
    Route::post('/admin/certifications', [CertificationController::class, 'store'])->name('admin.certifications.store');
    Route::patch('/admin/certifications/{certification}', [CertificationController::class, 'update'])->name('admin.certifications.update');
    Route::get('/admin/certifications/{certification}/edit', [CertificationController::class, 'edit'])->name('admin.certifications.edit');
    Route::delete('/admin/certifications/{certification}', [CertificationController::class, 'destroy'])->name('admin.certifications.destroy');
    Route::get('/admin/certifications', [CertificationController::class, 'indexAdmin'])->name('admin.certifications.index');

    // Admin routes destinées aux educations
    Route::get('/admin/educations/create', [EducationController::class, 'create'])->name('admin.educations.create');
    Route::get('/admin/educations/{education}', [EducationController::class, 'show'])->name('admin.educations.show');
    Route::post('/admin/educations', [EducationController::class, 'store'])->name('admin.educations.store');
    Route::patch('/admin/educations/{education}', [EducationController::class, 'update'])->name('admin.educations.update');
    Route::get('/admin/educations/{education}/edit', [EducationController::class, 'edit'])->name('admin.educations.edit');
    Route::delete('/admin/educations/{education}', [EducationController::class, 'destroy'])->name('admin.educations.destroy');
    Route::get('/admin/educations', [EducationController::class, 'indexAdmin'])->name('admin.educations.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
