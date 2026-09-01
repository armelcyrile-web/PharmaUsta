@extends('layouts.user')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-primary">{{ $ressource->typeRessource->nom ?? 'Type inconnu' }}</span>
                        <small class="text-muted">{{ $ressource->anneeAcademique->libelle ?? '' }}</small>
                    </div>
                    <h1 class="fw-bold mb-3">{{ $ressource->titre }}</h1>
                    <p class="text-muted">{{ $ressource->description }}</p>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <strong>Niveau :</strong><br>
                            {{ $ressource->niveau->nom ?? '-' }}
                        </div>
                        <div class="col-md-4">
                            <strong>UE :</strong><br>
                            {{ $ressource->ue->nom ?? '-' }}
                        </div>
                        <div class="col-md-4">
                            <strong>ECUE :</strong><br>
                            {{ $ressource->ecue->nom ?? 'Aucune' }}
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('ressources.preview', $ressource) }}" class="btn btn-outline-primary" target="_blank">
                            <i class="bi bi-eye me-1"></i> Prévisualiser
                        </a>
                        <a href="{{ route('ressources.download', $ressource) }}" class="btn btn-success">
                            <i class="bi bi-download me-1"></i> Télécharger
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
