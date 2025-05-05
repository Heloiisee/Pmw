@extends('layouts.public')

@section('title', 'Accueil')

@section('content')
<section class="heading reveal">
    <div class="container-fluid py-3 reveal-1">
        <div class="row d-flex align-items-center">
            <div class="col-12 text-center reveal-2">
                <img loading="lazy" src="{{ asset('images/images_heading.svg') }}" alt="Illustration de l'entête" class="img-fluid py-4 image_heading">
            </div>
            <p class="text-center py-3 reveal-3">
                <i>Je suis <strong>Melissa Guicheron</strong>, une développeuse qui souhaite s’améliorer de jour en jour...</i>
            </p>
        </div>
    </div>
</section>

<section class="introduction py-5 reveal">
    <div class="container reveal-1">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-md-10 text-center">
                <h1 class="display-5 fw-bold reveal-2">Me définir en quelques mots...</h1>
                <hr class="w-25 mx-auto my-3 border-2">
                <p class="fs-4 fw-light">
                    <i class="fas fa-code reveal-3"></i> Je suis <strong>Melissa Guicheron</strong>, développeuse web passionnée par l'innovation et le design. <br>
                    Mon ambition ? Progresser continuellement pour concevoir des sites et applications qui allient esthétisme et fonctionnalité.
                </p>
            </div>
        </div>
    </div>
</section>
{{-- SECTION PROJETS DYNAMIQUES --}}
<section class="projets py-4 reveal">
    <h1 class="display-5 fw-bold text-center reveal-1">Projets</h1>
    <hr class="w-25 mx-auto my-3 border-2">

    <div class="container reveal-2">
        @if(isset($projects) && $projects->count() > 0)
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-4 mb-4 reveal-3">
                        <div class="card h-100">
                            @if ($project->image)
                                <img 
                                    loading="lazy" 
                                    src="{{ asset('storage/' . $project->image) }}" 
                                    class="card-img-top" 
                                    alt="Capture d'écran du projet {{ $project->titre }}">
                            @else
                                <img 
                                    loading="lazy" 
                                    src="{{ asset('assets/images/default-project.png') }}" 
                                    class="card-img-top" 
                                    alt="Image par défaut du projet">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $project->titre }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($project->description, 100) }}</p>
                                <p class="card-text">
                                    <small class="text-custom">Langages utilisés : {{ $project->technologies }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('projects.index') }}" class="btn">Voir tous les projets</a>
            </div>
        @else
            <div class="text-center">
                <p class="text-muted">Aucun projet disponible pour le moment.</p>
            </div>
        @endif
    </div>
</section>

{{-- SECTION BTS --}}
<section class="bts reveal">
    <div class="container reveal-1">
        <div class="row align-items-center gx-4 gy-4 reveal-2">
            <h1 class="display-5 fw-bold text-center py-3">BTS (Brevet de Technicien Supérieur)</h1>
            <hr class="w-25 mx-auto my-3 border-2">
            <p class="reveal-3">
                Le BTS SIO (Services Informatiques aux Organisations) est un diplôme Bac+2 orienté vers le développement ou la gestion des réseaux informatiques.
            </p>

            <div class="col-12 col-lg-6">
                <div class="card h-100 shadows p-4 reveal-2">
                    <div class="card-body">
                        <h5 class="card-title reveal-3">SLAM</h5>
                        <p class="card-text reveal-4">
                            Conception et développement d'applications, participation à la conception, au déploiement, à la maintenance des logiciels et bases de données.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card h-100 shadows p-4 reveal-2">
                    <div class="card-body">
                        <h5 class="card-title reveal-3">SISR</h5>
                        <p class="card-text reveal-4">
                            Administration des systèmes et réseaux : installation, maintenance, supervision des infrastructures réseaux.
                        </p>
                    </div>
                </div>
            </div>
            <p class="redirections mt-3 text-center">
                Pour en savoir plus sur le BTS SIO : 
                <a href="https://diplomeo.com/trouver-bts-sio" target="_blank">Diplomeo</a> &bull; 
                <a href="https://www.cidj.com/etudes-formations-alternance/les-diplomes/bts-sio-services-informatiques-aux-organisations" target="_blank">CIDJ</a>
            </p>
        </div>
    </div>
</section>

{{-- SECTION CONTACT --}}
<section class="contact reveal py-5">
    <div class="container text-center">
        <h1 class="display-5 fw-bold reveal-2">Contact</h1>
        <hr class="w-25 mx-auto my-3 border-2">
        <p class="reveal-3">Si vous êtes intéressé(e) par mon travail, voici comment me contacter :</p>

        <div class="d-flex justify-content-center gap-4 my-4">
            <div>
                <a href="https://github.com/Heloiisee" title="GitHub" target="_blank" class="d-block">
                    <img src="{{ asset('images/icons8-github(1).svg') }}" class="img-fluid" alt="GitHub" style="width: 50px;">
                </a>
                <p class="mt-2">GitHub</p>
            </div>
            <div>
                <a href="https://www.linkedin.com/in/melissa-guicheron-6a6201290/" title="LinkedIn" target="_blank" class="d-block">
                    <img src="{{ asset('images/icons8-linkedin(1).svg') }}" class="img-fluid" alt="LinkedIn" style="width: 50px;">
                </a>
                <p class="mt-2">LinkedIn</p>
            </div>
        </div>

        <p class="mb-4">Ou directement via le formulaire de contact :</p>
        <a href="{{ route('contact') }}" class="btn btn-contact fw-bold text-white">
            <i class="fa-solid fa-paper-plane me-2"></i> Envoyer un message
        </a>
    </div>
</section>

@endsection
