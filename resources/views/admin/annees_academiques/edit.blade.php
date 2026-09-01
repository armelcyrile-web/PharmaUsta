@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Modifier l'année académique</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.annees-academiques.update', $anneesAcademique) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="libelle" class="form-label">Libellé *</label>
                    <input type="text" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle', $anneesAcademique->libelle) }}" required>
                    @error('libelle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.annees-academiques.index') }}" class="btn btn-secondary me-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
