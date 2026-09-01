@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Nouvelle ressource</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ressources.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="titre" class="form-label">Titre *</label>
                        <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="type_ressource_id" class="form-label">Type de ressource *</label>
                        <select name="type_ressource_id" id="type_ressource_id" class="form-select @error('type_ressource_id') is-invalid @enderror" required>
                            <option value="">Choisir...</option>
                            @foreach($typesRessources as $type)
                                <option value="{{ $type->id }}" {{ old('type_ressource_id') == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                            @endforeach
                        </select>
                        @error('type_ressource_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="annee_academique_id" class="form-label">Année académique *</label>
                        <select name="annee_academique_id" id="annee_academique_id" class="form-select @error('annee_academique_id') is-invalid @enderror" required>
                            <option value="">Choisir...</option>
                            @foreach($anneesAcademiques as $annee)
                                <option value="{{ $annee->id }}" {{ old('annee_academique_id') == $annee->id ? 'selected' : '' }}>{{ $annee->libelle }}</option>
                            @endforeach
                        </select>
                        @error('annee_academique_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="niveau_id" class="form-label">Niveau *</label>
                        <select name="niveau_id" id="niveau_id" class="form-select @error('niveau_id') is-invalid @enderror" required>
                            <option value="">Choisir...</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" {{ old('niveau_id') == $niveau->id ? 'selected' : '' }}>{{ $niveau->nom }}</option>
                            @endforeach
                        </select>
                        @error('niveau_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ue_id" class="form-label">UE *</label>
                        <select name="ue_id" id="ue_id" class="form-select @error('ue_id') is-invalid @enderror" required>
                            <option value="">Choisir...</option>
                            @foreach($ues as $ue)
                                <option value="{{ $ue->id }}" {{ old('ue_id') == $ue->id ? 'selected' : '' }}>{{ $ue->nom }}</option>
                            @endforeach
                        </select>
                        @error('ue_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ecue_id" class="form-label">ECUE (optionnel)</label>
                        <select name="ecue_id" id="ecue_id" class="form-select @error('ecue_id') is-invalid @enderror">
                            <option value="">Aucune</option>
                            @foreach($ecues as $ecue)
                                <option value="{{ $ecue->id }}" {{ old('ecue_id') == $ecue->id ? 'selected' : '' }}>{{ $ecue->nom }}</option>
                            @endforeach
                        </select>
                        @error('ecue_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="fichier" class="form-label">Fichier PDF *</label>
                    <input type="file" name="fichier" id="fichier" class="form-control @error('fichier') is-invalid @enderror" accept=".pdf" required>
                    @error('fichier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.ressources.index') }}" class="btn btn-secondary me-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
