@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-circle bg-primary me-3">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h3 class="mb-0 fw-bold">{{ $nbUtilisateurs }}</h3>
                        <p class="text-muted mb-0">Utilisateurs inscrits</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-circle bg-success me-3">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <div>
                        <h3 class="mb-0 fw-bold">{{ $nbUtilisateursActifs }}</h3>
                        <p class="text-muted mb-0">Utilisateurs actifs</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="icon-circle bg-primary me-3">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div>
                        <h3 class="mb-0 fw-bold">{{ $nbRessourcesTotal }}</h3>
                        <p class="text-muted mb-0">Ressources totales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Ressources par statut</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ressourcesParStatut as $statut => $total)
                                <tr>
                                    <td>{{ ucfirst($statut) }}</td>
                                    <td>{{ $total }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">Aucune donnée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Ressources par année académique</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Année académique</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ressourcesParAnnee as $annee)
                                <tr>
                                    <td>{{ $annee->libelle }}</td>
                                    <td>{{ $annee->total }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">Aucune donnée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Top 5 des ressources les plus téléchargées</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Téléchargements</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topRessources as $ressource)
                                <tr>
                                    <td>{{ $ressource->titre }}</td>
                                    <td>{{ $ressource->telechargements }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted">Aucune donnée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
