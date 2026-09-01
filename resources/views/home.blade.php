@extends('layouts.public')

@section('content')
<section class="hero-gradient text-white py-5">
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-uppercase mb-4">Bienvenue sur PharmaUSTA</h1>
                <p class="lead mb-4">La plateforme numérique des ressources pédagogiques des étudiants en Pharmacie de l'USTA</p>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-file-earmark-text me-2"></i>Découvrir les ressources
                    </a>
                @else
                    <a href="{{ route('ressources.index') }}" class="btn btn-success btn-lg px-4">
                        <i class="bi bi-file-earmark-text me-2"></i>Découvrir les ressources
                    </a>
                @endguest
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Comment ça marche ?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="icon-circle mx-auto mb-3 bg-primary">
                        <i class="bi bi-search"></i>
                    </div>
                    <h5 class="fw-bold text-uppercase">Recherchez</h5>
                    <p class="text-muted">Trouvez facilement les ressources pédagogiques par cours, niveau ou mot-clé.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="icon-circle mx-auto mb-3 bg-primary">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h5 class="fw-bold text-uppercase">Prévisualisez</h5>
                    <p class="text-muted">Consultez le contenu d'un document avant de le télécharger.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center">
                    <div class="icon-circle mx-auto mb-3 bg-primary">
                        <i class="bi bi-download"></i>
                    </div>
                    <h5 class="fw-bold text-uppercase">Téléchargez</h5>
                    <p class="text-muted">Accédez et téléchargez les documents utiles pour vos révisions et vos examens.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="stats-gradient text-white py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <h2 class="display-4 fw-bold">{{ $nbRessourcesPubliees }}</h2>
                <p class="lead mb-0">Ressources publiées</p>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h2 class="display-4 fw-bold">5</h2>
                <p class="lead mb-0">Niveaux</p>
            </div>
            <div class="col-md-4">
                <h2 class="display-4 fw-bold">{{ $nbUtilisateurs }}</h2>
                <p class="lead mb-0">Utilisateurs inscrits</p>
            </div>
        </div>
    </div>
</section>
@endsection
