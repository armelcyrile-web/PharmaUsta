@extends('layouts.public')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-4">Actualités</h1>

    <div class="row g-4">
        @forelse($actualites as $actualite)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
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
                                {{ $actualite->date_publication ? $actualite->date_publication->format('d/m/Y') : $actualite->created_at->format('d/m/Y') }}
                            </small>
                        </div>
                        <h5 class="card-title fw-bold">{{ $actualite->titre }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit($actualite->contenu, 150) }}</p>
                        <a href="{{ route('actualites.show', $actualite) }}" class="btn btn-outline-primary btn-sm align-self-start mt-2">
                            Lire la suite <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Aucune actualité publiée pour le moment.</div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $actualites->links() }}
    </div>
</div>
@endsection
