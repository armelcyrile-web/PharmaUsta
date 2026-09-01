@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Détails de l'utilisateur</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Nom</dt>
                        <dd class="col-sm-8">{{ $user->nom }} {{ $user->prenom }}</dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4">Matricule</dt>
                        <dd class="col-sm-8">{{ $user->matricule }}</dd>

                        <dt class="col-sm-4">Niveau</dt>
                        <dd class="col-sm-8">{{ $user->niveau->nom ?? '-' }}</dd>

                        <dt class="col-sm-4">Statut</dt>
                        <dd class="col-sm-8">
                            @if($user->actif)
                                <span class="badge bg-success">Actif</span>
                            @else
                                <span class="badge bg-danger">Inactif</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Rôles assignés</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.assign-role', $user) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Sélectionner les rôles</label>
                            <select name="role_ids[]" class="form-select" multiple size="6">
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour les rôles</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
