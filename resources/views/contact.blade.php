@extends('layouts.public')

@section('content')
<section class="hero-gradient text-white py-5">
    <div class="container py-4">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold text-uppercase mb-3">Contactez-nous</h1>
                <p class="lead mb-0">N'hésitez pas à nous contacter pour toute question concernant PharmaUSTA.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="icon-circle mx-auto mb-3 bg-primary">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h5 class="fw-bold">Téléphone</h5>
                    <p class="text-muted mb-0">
                        <a href="tel:+22654724434" class="text-decoration-none text-muted">+226 54 72 44 34</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="icon-circle mx-auto mb-3 bg-primary">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h5 class="fw-bold">E-mail</h5>
                    <p class="text-muted mb-0">
                        <a href="mailto:cepharmusta@gmail.com" class="text-decoration-none text-muted">cepharmusta@gmail.com</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="icon-circle mx-auto mb-3 bg-primary">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h5 class="fw-bold">Adresse</h5>
                    <p class="text-muted mb-0">03 BP 7021 Ouagadougou 03, Burkina Faso</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
