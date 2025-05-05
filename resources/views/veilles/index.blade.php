@extends('layouts.public')
@section('title', 'Veilles')
@section('content')

<section class="heading_veille reveal">
        <div class="container-fluid py-3 reveal-1">
            <div class="row d-flex
                align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <img loading="lazy" src="{{ asset('images/images_veille.svg') }}" alt="Illustration de l'entête" class="img-fluid py-4 image_veille reveal-2">
                    </div>
                    <h1 class="display-5 fw-bold text-center reveal-3">Veille technologique</h1>
                    <p class="reveal-4">Pour découvrir ma veille technologique...</p>
                </div>
            </div>
        </section>
        <section class="intro_veille reveal">
            <div class="container">
                <div class="row">
                    <h1 class="display-5 fw-bold text-center reveal-3">Une petite presentation</h1>
                    <hr class="w-25 mx-auto my-3 border-2">
                    <h4 class="text-center fw-bold reveal-3">Qu'est-ce qu'une veille technologiques ?</h6>
                    <p class="reveal-4">La veille technologique est une pratique essentielle pour rester informé des dernières innovations et tendances dans mon domaine. 
                    Elle me permet d'améliorer mes compétences et d'intégrer des outils modernes dans mes projets.</p>
                </div>
            </div>
        </section>
        <section class="objectifs_veille reveal">
            <div class="container py-5 reveal-1">
                <div class="row justify-content-center text-center">
                    <div class="col-md-10">
                        <h1 class="display-5 fw-bold reveal-3">Objectifs</h1>
                        <hr class="w-25 border-2 mx-auto">
                        <p class="lead reveal-4">
                            À travers ma veille technologique, je cherche à :
                        </p>
                        <ul class="list-unstyled text-start mt-4 reveal-5">
                            <li><i class="fas fa-check-circle"></i> Rester informée des tendances et innovations en développement web</li>
                            <li><i class="fas fa-check-circle"></i> Améliorer mes compétences et approfondir mes connaissances</li>
                            <li><i class="fas fa-check-circle"></i> Explorer de nouveaux outils et frameworks</li>
                            <li><i class="fas fa-check-circle"></i> Appliquer les meilleures pratiques en développement et sécurité</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="veilles_dynamiques py-5 reveal">
        <div class="container py-5 reveal-1">
    <h1 class="mb-4  fw-bold text-center reveal-2">Veille Technologique</h1>
    <p class="text-center mb-5 reveal-3">
        Retrouvez ici mes ressources et outils découverts au fil de ma veille : frameworks, réseaux sociaux, outils utiles et plus encore.
    </p>

    @if($veilles->count() > 0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 rev">
        @foreach ($veilles as $veille)
            <div class="col">
                <div class="card veille-card h-100 shadow-sm">
                    @if($veille->image)
                        <img src="{{ asset('storage/' . $veille->image) }}" class="card-img-top veille-img" alt="{{ $veille->titre }}">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold veille-title">{{ $veille->titre }}</h5>
                        <p class="card-text veille-text">{{ Str::limit($veille->contenu, 100) }}</p>
                        <p class="mt-auto text-muted small"><strong>Catégorie :</strong> {{ ucfirst($veille->categorie) }}</p>
                        @if($veille->source)
                            <a href="{{ $veille->source }}" target="_blank" class="btn btn-custom mt-3 align-self-start">
                                <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Voir la source
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="text-center mt-5 text-muted">Aucune veille disponible pour le moment.</p>
@endif

</div>
    </section>

@endsection