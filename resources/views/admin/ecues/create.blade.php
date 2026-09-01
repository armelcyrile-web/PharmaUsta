@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Nouvelle ECUE</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ecues.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom *</label>
                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ue_id" class="form-label">UE (optionnel)</label>
                    <select name="ue_id" id="ue_id" class="form-select @error('ue_id') is-invalid @enderror">
                        <option value="">Aucune</option>
                        @foreach($ues as $ue)
                            <option value="{{ $ue->id }}" {{ old('ue_id') == $ue->id ? 'selected' : '' }}>{{ $ue->nom }}</option>
                        @endforeach
                    </select>
                    @error('ue_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.ecues.index') }}" class="btn btn-secondary me-2">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
