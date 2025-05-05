@extends('layouts.public')

@section('title', 'Mes Propos')

@section('content')
<section class="heading_propos reveal">
        <div class="container-fluid py-3 reveal-1">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <img loading="lazy" src="{{ asset('images/undraw_about-me_5990.svg') }}" alt="Illustration de l'entête" class="img-fluid py-4 image_propos reveal-2">
                </div>
                <h1 class="display-5 fw-bold text-center reveal-3">Qui-suis je ?</h1>
                <p class="reveal-4">Pour découvrir en détail mon parcours...</p>
            </div>
            
        </div>
    </section>

    <section class="profil reveal">
        <div class="container reveal-1">
            <div class="row justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="profil-title reveal-2"><i class="fas fa-user-circle reveal-2"></i> Profil</h1>
                    <hr class="w-25 border-2 mx-auto">
                    <p class="profil_text reveal-3">
                        Étudiante en BTS SIO option SLAM et aspirante développeuse web, je m’appelle Melissa GUICHERON. 
                        À travers mon apprentissage, je mets en pratique les connaissances acquises lors de mes études pour consolider et enrichir mes compétences. 
                        Ce portfolio reflète mon parcours, mes réalisations et ma volonté d’allier esthétisme et fonctionnalité dans chacun de mes projets pour un rendu à la fois moderne et efficace.
                    </p>
                </div>
            </div>
        </div>
    </section>  
    
    <section class="competences reveal">
        <div class="container reveal-1">
            <h1 class="display-5 fw-bold text-center reveal-1">Compétences</h1>
            <hr class="w-25 mx-auto my-3 border-2">
            <div class="row justify-content-center text-center gap-3 reveal-3 py-5">
                <div class="col-md-4">
                    <i class="fas fa-laptop-code competence-icon"></i>
                    <h2>Développement de sites web responsives</h2>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-paint-brush competence-icon"></i>
                    <h2>Création de maquettes graphiques</h2>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-layer-group competence-icon"></i>
                    <h2>Intégration de designs modernes</h2>
                </div>
            </div>
        </div>
        <section class="competences-techniques">
        <div class="container">
            <h2 class="text-start fw-bold">Compétences techniques</h2>
        <hr class="w-25 my-3 border-2">
        <div class="row justify-content-start text-center">
            <div class="col-md-6">
                @foreach ($skills as $skill)
                        <div class="skill">
                            <span><i class="{{ $skill->image }}"></i> {{ $skill->nom }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ $skill->niveau }}%;">
                                    {{ $skill->niveau }}%
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        </div>
    </section> 

    <section class="competences-info">
                <div class="container">
                    <div class="row text-start justify-content-start ">
                            <h2 class="text-start fw-bold">En savoir plus sur mes compétences...</h2>
                            <hr class="w-25 my-3 border-2 ">
                            <p>Vous souhaitez en savoir plus sur mes compétences et mes réalisations ?</p>
                            <a href="{{ asset('pdf/CV_2025-04-29_Melissa_Guicheron-2.pdf') }}" class="btn btn-custom w-auto me-2">Mon CV</a>
                            <a href="{{ asset('pdf/tableau_de_synthèse_v2.pdf') }}" class="btn btn-custom w-auto me-2">Tableau de synthèse</a>
                            <a href="{{ asset('pdf/Attestation_de_stage.pdf') }}" class="btn btn-custom w-auto me-2">Attestation du stage 1</a>
                            <a href="{{ asset('pdf/Attestation_de_stage_2.pdf') }}" class="btn btn-custom w-auto me-2">Attestation du stage 2</a>
                    </div>
                </div>
    </section>
</section>
<section class="certifications reveal">
    <div class="container">
        <h1 class="display-5 fw-bold text-center reveal-1 text">Certifications</h1>
        <hr class="w-25 border-2 mx-auto reveal-2">
        <div class="row justify-content-center text-center gap-6 reveal-3 py-5 text-white">
            @foreach($certifications as $certification)
                <div class="col-md-4 mb-4">
                    @if ($certification->icon)
                        <i class="{{ $certification->icon }} certifications-icon"></i>
                    @else
                        <i class="fas fa-certificate certifications-icon"></i>
                    @endif
                    <h2>{{ $certification->nom }}</h2>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="parcours-scolaire py-5 bg-light reveal">
    <div class="container">
        <h2 class="text-center text-2xl fw-bold mb-4 reveal-1">Parcours scolaire</h2>
        <hr class="w-25 mx-auto border-2 mb-5">

        <div class="timeline reveal-2">
            @foreach($educations as $education)
                <div class="timeline-item mb-4 p-4 bg-white shadow-sm rounded reveal-3">
                    <h4 class="text-xl fw-bold">{{ $education->titre }}</h4>
                    <p class="text-gray-600 italic">{{ $education->etablissement }}</p>
                    <p class="text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($education->date_debut)->format('M Y') }} —
                        {{ $education->date_fin ? \Carbon\Carbon::parse($education->date_fin)->format('M Y') : 'En cours' }}
                    </p>
                    @if($education->description)
                        <p class="mt-2 text-gray-800">{{ $education->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>



@endsection