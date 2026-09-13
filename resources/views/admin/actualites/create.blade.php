@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Nouvelle actualité</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.actualites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre *</label>
                    <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre') }}" required>
                    @error('titre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="contenu" class="form-label">Contenu *</label>
                    <textarea name="contenu" id="contenu" rows="8" class="form-control @error('contenu') is-invalid @enderror" required>{{ old('contenu') }}</textarea>
                    @error('contenu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image (optionnel)</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="type" class="form-label">Type *</label>
                        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                            <option value="communique" {{ old('type') == 'communique' ? 'selected' : '' }}>Communiqué</option>
                            <option value="annonce" {{ old('type') == 'annonce' ? 'selected' : '' }}>Annonce</option>
                            <option value="evenement" {{ old('type') == 'evenement' ? 'selected' : '' }}>Événement</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="date_publication" class="form-label">Date de publication</label>
                        <input type="date" name="date_publication" id="date_publication" class="form-control @error('date_publication') is-invalid @enderror" value="{{ old('date_publication') }}">
                        @error('date_publication')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary me-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
