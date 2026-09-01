<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ressource;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function index()
    {
        $nbUtilisateurs = User::count();
        $nbUtilisateursActifs = User::where('actif', true)->count();
        $nbRessourcesTotal = Ressource::count();

        $ressourcesParStatut = Ressource::select('statut', DB::raw('count(*) as total'))
            ->groupBy('statut')
            ->pluck('total', 'statut');

        $ressourcesParAnnee = Ressource::join('annees_academiques', 'ressources.annee_academique_id', '=', 'annees_academiques.id')
            ->select('annees_academiques.libelle', DB::raw('count(*) as total'))
            ->groupBy('annees_academiques.libelle')
            ->get();

        $topRessources = Ressource::where('telechargements', '>', 0)
            ->orderByDesc('telechargements')
            ->limit(5)
            ->get(['id', 'titre', 'telechargements']);

        return view('admin.dashboard', compact(
            'nbUtilisateurs',
            'nbUtilisateursActifs',
            'nbRessourcesTotal',
            'ressourcesParStatut',
            'ressourcesParAnnee',
            'topRessources'
        ));
    }
}
