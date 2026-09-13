<?php

namespace App\Http\Controllers;

use App\Models\Actualite;

class ActualiteRechercheController extends Controller
{
    public function index()
    {
        $actualites = Actualite::with('auteur')
            ->where('statut', 'publie')
            ->orderByDesc('date_publication')
            ->paginate(9);

        return view('actualites.index', compact('actualites'));
    }

    public function show(Actualite $actualite)
    {
        if ($actualite->statut !== 'publie') {
            abort(404);
        }

        return view('actualites.show', compact('actualite'));
    }
}
