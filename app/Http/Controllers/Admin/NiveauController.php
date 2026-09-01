<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NiveauRequest;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class NiveauController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:gerer-referentiels'),
        ];
    }

    public function index(Request $request)
    {
        $niveaux = Niveau::all();
        if ($request->expectsJson()) {
            return response()->json($niveaux);
        }
        return view('admin.niveaux.index', compact('niveaux'));
    }

    public function create()
    {
        return view('admin.niveaux.create');
    }

    public function store(NiveauRequest $request)
    {
        Niveau::create($request->validated());
        session()->flash('success', 'Niveau créé avec succès.');
        return redirect()->route('admin.niveaux.index');
    }

    public function edit(Niveau $niveau)
    {
        return view('admin.niveaux.edit', compact('niveau'));
    }

    public function update(NiveauRequest $request, Niveau $niveau)
    {
        $niveau->update($request->validated());
        session()->flash('success', 'Niveau modifié avec succès.');
        return redirect()->route('admin.niveaux.index');
    }

    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        session()->flash('success', 'Niveau supprimé avec succès.');
        return redirect()->route('admin.niveaux.index');
    }
}
