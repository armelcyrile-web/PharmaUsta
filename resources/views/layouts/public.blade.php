<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PharmaUSTA')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="PharmaUSTA" height="40" class="me-2">
                    PharmaUSTA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Présentation</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Actualités</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                            <li class="nav-item ms-lg-2">
                                <a class="btn btn-primary text-white px-3" href="{{ route('register') }}">Créer un compte</a>
                            </li>
                        @else
                            <li class="nav-item ms-lg-2">
                                <a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="text-white py-5" style="background-color: #1A1030;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <h5 class="fw-bold">Liens rapides</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50 text-decoration-none">Accueil</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Présentation</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Actualités</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5 class="fw-bold">Ressources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50 text-decoration-none">Cours</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Anciens sujets d'examens</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Exposés</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Documents complémentaires</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5 class="fw-bold">Contact</h5>
                    <address class="text-white-50">
                        CEPHARM USTA<br>
                        Université Saint Thomas d'Aquin<br>
                        Ouagadougou, Burkina Faso<br>
                        <i class="bi bi-envelope"></i> contact@pharmausta.bj
                    </address>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">CEPHARM USTA</h5>
                    <p class="text-white-50">Club des étudiants en Pharmacie de l'Université Saint Thomas d'Aquin.</p>
                </div>
            </div>
            <hr class="border-secondary">
            <p class="text-center mb-0 text-white-50">&copy; {{ date('Y') }} PharmaUSTA. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
