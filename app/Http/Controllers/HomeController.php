<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $nbRessourcesPubliees = Ressource::where('statut', 'publie')->count();
        $nbUtilisateurs = User::count();

        return view('home', compact('nbRessourcesPubliees', 'nbUtilisateurs'));
    }
}
