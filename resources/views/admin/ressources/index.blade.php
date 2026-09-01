@extends('layouts.user')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Ressources pédagogiques</h1>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('ressources.index') }}" class="row g-3">
                <div class="col-md-6">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="{{ request('titre') }}" placeholder="Rechercher par titre...">
                </div>
                <div class="col-md-6">
                    <label for="mot_cle" class="form-label">Mot-clé</label>
                    <input type="text" name="mot_cle" id="mot_cle" class="form-control" value="{{ request('mot_cle') }}" placeholder="Rechercher dans le titre ou la description...">
                </div>
                <div class="col-md-4">
                    <label for="annee_academique_id" class="form-label">Année académique</label>
                    <select name="annee_academique_id" id="annee_academique_id" class="form-select">
                        <option value="">Toutes</option>
                        @foreach(\App\Models\AnneeAcademique::all() as $annee)
                            <option value="{{ $annee->id }}" {{ request('annee_academique_id') == $annee->id ? 'selected' : '' }}>{{ $annee->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="niveau_id" class="form-label">Niveau</label>
                    <select name="niveau_id" id="niveau_id" class="form-select">
                        <option value="">Tous</option>
                        @foreach(\App\Models\Niveau::all() as $niveau)
                            <option value="{{ $niveau->id }}" {{ request('niveau_id') == $niveau->id ? 'selected' : '' }}>{{ $niveau->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="ue_id" class="form-label">UE</label>
                    <select name="ue_id" id="ue_id" class="form-select">
                        <option value="">Toutes</option>
                        @foreach(\App\Models\Ue::all() as $ue)
                            <option value="{{ $ue->id }}" {{ request('ue_id') == $ue->id ? 'selected' : '' }}>{{ $ue->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="ecue_id" class="form-label">ECUE</label>
                    <select name="ecue_id" id="ecue_id" class="form-select">
                        <option value="">Toutes</option>
                        @foreach(\App\Models\Ecue::all() as $ecue)
                            <option value="{{ $ecue->id }}" {{ request('ecue_id') == $ecue->id ? 'selected' : '' }}>{{ $ecue->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="type_ressource_id" class="form-label">Type de ressource</label>
                    <select name="type_ressource_id" id="type_ressource_id" class="form-select">
                        <option value="">Tous</option>
                        @foreach(\App\Models\TypeRessource::all() as $type)
                            <option value="{{ $type->id }}" {{ request('type_ressource_id') == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filtrer</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-4">
        @forelse($ressources as $ressource)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $ressource->typeRessource->nom ?? 'Type inconnu' }}</span>
                            <small class="text-muted">{{ $ressource->anneeAcademique->libelle ?? '' }}</small>
                        </div>
                        <h5 class="card-title fw-bold">{{ $ressource->titre }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit($ressource->description, 120) }}</p>
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <div class="small text-muted">
                                {{ $ressource->niveau->nom ?? '' }} · {{ $ressource->ue->nom ?? '' }}
                                @if($ressource->ecue)
                                    · {{ $ressource->ecue->nom }}
                                @endif
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('ressources.show', $ressource) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> Voir
                                </a>
                                <a href="{{ route('ressources.download', $ressource) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Aucune ressource publiée ne correspond à vos critères.</div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $ressources->links() }}
    </div>
</div>
@endsection
