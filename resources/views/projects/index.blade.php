@extends('layouts.public')

@section('title', 'Mes Projets')

@section('content')
<section class="heading_projets reveal">
        <div class="container-fluid py-3 reveal-1">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <img loading="lazy" src="{{ asset('images/image_projets.svg') }}" alt="Illustration de l'entête" class="img-fluid py-4 image_projets reveal-2">
                </div>
                <h1 class="display-5 fw-bold text-center reveal-3">Projets</h1>
                <p class="reveal-4"> Mes projets : une vitrine de ma créativité et de mon savoir-faire en développement web</p>
            </div>
            
        </div>
    </section>
<section class="projets py-4 reveal">
    <h1 class="display-5 fw-bold text-center reveal-1">Mes Projets</h1>
    <hr class="w-25 mx-auto my-3 border-2">

    <div class="container reveal-2">
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4 mb-4 reveal-3">
                    <div class="card">
                        @if($project->image)
                            <img loading="lazy" src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->titre }}">
                        @else
                            <img loading="lazy" src="{{ asset('assets/images/default-project.png') }}" class="card-img-top" alt="Image par défaut">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->titre }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                            <p class="card-text"><small class="text-custom">Langages utilisés : {{ $project->technologies }}</small></p>
                            <a href="{{ $project->url }}" class="btn btn-success" target="_blank">Voir le projet</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
