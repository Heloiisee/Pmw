<div class="container-fluid" id="header">
    <div class="row">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">Melissa.</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav mx-auto d-flex flex-row gap-3">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{route('home') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('projects.index') }}">Projets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('veilles.index') }}">Veilles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('propos.index') }}">Propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</div>
