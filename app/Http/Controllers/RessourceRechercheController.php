<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RessourceRechercheController extends Controller
{
    public function index(Request $request)
    {
        $query = Ressource::with(['anneeAcademique', 'niveau', 'ue', 'ecue', 'typeRessource'])
            ->where('statut', 'publie');

        if ($request->filled('titre')) {
            $query->where('titre', 'like', '%' . $request->titre . '%');
        }
        if ($request->filled('annee_academique_id')) {
            $query->where('annee_academique_id', $request->annee_academique_id);
        }
        if ($request->filled('niveau_id')) {
            $query->where('niveau_id', $request->niveau_id);
        }
        if ($request->filled('ue_id')) {
            $query->where('ue_id', $request->ue_id);
        }
        if ($request->filled('ecue_id')) {
            $query->where('ecue_id', $request->ecue_id);
        }
        if ($request->filled('type_ressource_id')) {
            $query->where('type_ressource_id', $request->type_ressource_id);
        }
        if ($request->filled('mot_cle')) {
            $keyword = $request->mot_cle;
            $query->where(function ($q) use ($keyword) {
                $q->where('titre', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        $ressources = $query->paginate(12);
        return view('ressources.index', compact('ressources'));
    }

    public function show(Ressource $ressource)
    {
        abort_if($ressource->statut !== 'publie', 404);
        $ressource->load(['anneeAcademique', 'niveau', 'ue', 'ecue', 'typeRessource']);
        return view('ressources.show', compact('ressource'));
    }

    public function preview(Ressource $ressource)
    {
        abort_if($ressource->statut !== 'publie', 404);
        return Storage::disk('local')->response($ressource->fichier);
    }

    public function download(Ressource $ressource)
    {
        abort_if($ressource->statut !== 'publie', 404);

        $ressource->increment('telechargements');

        return Storage::disk('local')->download($ressource->fichier);
    }
}
