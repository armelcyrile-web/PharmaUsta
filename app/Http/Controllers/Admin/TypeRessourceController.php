<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRessourceRequest;
use App\Models\TypeRessource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TypeRessourceController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:gerer-referentiels'),
        ];
    }

    public function index(Request $request)
    {
        $typesRessources = TypeRessource::all();
        if ($request->expectsJson()) {
            return response()->json($typesRessources);
        }
        return view('admin.types_ressources.index', compact('typesRessources'));
    }

    public function create()
    {
        return view('admin.types_ressources.create');
    }

    public function store(TypeRessourceRequest $request)
    {
        TypeRessource::create($request->validated());
        session()->flash('success', 'Type de ressource créé avec succès.');
        return redirect()->route('admin.types-ressources.index');
    }

    public function edit(TypeRessource $typeRessource)
    {
        return view('admin.types_ressources.edit', compact('typeRessource'));
    }

    public function update(TypeRessourceRequest $request, TypeRessource $typeRessource)
    {
        $typeRessource->update($request->validated());
        session()->flash('success', 'Type de ressource modifié avec succès.');
        return redirect()->route('admin.types-ressources.index');
    }

    public function destroy(TypeRessource $typeRessource)
    {
        $typeRessource->delete();
        session()->flash('success', 'Type de ressource supprimé avec succès.');
        return redirect()->route('admin.types-ressources.index');
    }
}
