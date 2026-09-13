@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Modifier l'actualité</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.actualites.update', $actualite) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre *</label>
                    <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre', $actualite->titre) }}" required>
                    @error('titre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="contenu" class="form-label">Contenu *</label>
                    <textarea name="contenu" id="contenu" rows="8" class="form-control @error('contenu') is-invalid @enderror" required>{{ old('contenu', $actualite->contenu) }}</textarea>
                    @error('contenu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image (optionnel)</label>
                    @if($actualite->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->titre }}" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Laisser vide pour conserver l'image actuelle.</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="type" class="form-label">Type *</label>
                        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                            <option value="communique" {{ old('type', $actualite->type) == 'communique' ? 'selected' : '' }}>Communiqué</option>
                            <option value="annonce" {{ old('type', $actualite->type) == 'annonce' ? 'selected' : '' }}>Annonce</option>
                            <option value="evenement" {{ old('type', $actualite->type) == 'evenement' ? 'selected' : '' }}>Événement</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="date_publication" class="form-label">Date de publication</label>
                        <input type="date" name="date_publication" id="date_publication" class="form-control @error('date_publication') is-invalid @enderror" value="{{ old('date_publication', $actualite->date_publication ? $actualite->date_publication->format('Y-m-d') : '') }}">
                        @error('date_publication')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary me-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
