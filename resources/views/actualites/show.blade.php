@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="{{ route('actualites.index') }}" class="text-decoration-none mb-3 d-inline-block">
                <i class="bi bi-arrow-left"></i> Retour aux actualités
            </a>

            <div class="card border-0 shadow-sm">
                @if($actualite->image)
                    <img src="{{ asset('storage/' . $actualite->image) }}" class="card-img-top rounded-top" alt="{{ $actualite->titre }}">
                @endif
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        @php
                            $badgeClass = match($actualite->type) {
                                'communique' => 'bg-primary',
                                'annonce' => 'bg-warning text-dark',
                                'evenement' => 'bg-success',
                                default => 'bg-secondary',
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ ucfirst($actualite->type) }}</span>
                        <small class="text-muted">
                            Publié le {{ $actualite->date_publication ? $actualite->date_publication->format('d/m/Y') : $actualite->created_at->format('d/m/Y') }}
                        </small>
                    </div>
                    <h1 class="fw-bold mb-3">{{ $actualite->titre }}</h1>
                    <p class="text-muted small mb-4">
                        Par {{ $actualite->auteur->nom ?? '' }} {{ $actualite->auteur->prenom ?? '' }}
                    </p>
                    <div class="content">
                        {!! nl2br(e($actualite->contenu)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
