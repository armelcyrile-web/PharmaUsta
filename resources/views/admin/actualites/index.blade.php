@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Actualités</h4>
        <a href="{{ route('admin.actualites.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nouvelle actualité
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.actualites.index') }}" class="row g-2 mb-3">
                <div class="col-auto">
                    <select name="statut" class="form-select">
                        <option value="">Tous les statuts</option>
                        <option value="brouillon" {{ request('statut') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                        <option value="publie" {{ request('statut') == 'publie' ? 'selected' : '' }}>Publié</option>
                        <option value="retire" {{ request('statut') == 'retire' ? 'selected' : '' }}>Retiré</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-primary">Filtrer</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Date publication</th>
                            <th>Statut</th>
                            <th>Auteur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($actualites as $actualite)
                            <tr>
                                <td>
                                    @if($actualite->image)
                                        <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->titre }}" style="width: 60px; height: 60px; object-fit: cover;" class="rounded">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>{{ $actualite->titre }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($actualite->type) {
                                            'communique' => 'bg-primary',
                                            'annonce' => 'bg-warning text-dark',
                                            'evenement' => 'bg-success',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($actualite->type) }}</span>
                                </td>
                                <td>{{ $actualite->date_publication ? $actualite->date_publication->format('d/m/Y') : '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $actualite->statut == 'publie' ? 'success' : ($actualite->statut == 'brouillon' ? 'secondary' : 'danger') }}">
                                        {{ ucfirst($actualite->statut) }}
                                    </span>
                                </td>
                                <td>{{ $actualite->auteur->nom ?? '-' }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.actualites.edit', $actualite) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if($actualite->statut !== 'publie')
                                        <form action="{{ route('admin.actualites.publish', $actualite) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                <i class="bi bi-eye"></i> Publier
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.actualites.retract', $actualite) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-eye-slash"></i> Retirer
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.actualites.destroy', $actualite) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Aucune actualité trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $actualites->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
