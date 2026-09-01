<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnneeAcademiqueRequest;
use App\Models\AnneeAcademique;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AnneeAcademiqueController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:gerer-referentiels'),
        ];
    }

    public function index(Request $request)
    {
        $anneesAcademiques = AnneeAcademique::all();
        if ($request->expectsJson()) {
            return response()->json($anneesAcademiques);
        }
        return view('admin.annees_academiques.index', compact('anneesAcademiques'));
    }

    public function create()
    {
        return view('admin.annees_academiques.create');
    }

    public function store(AnneeAcademiqueRequest $request)
    {
        AnneeAcademique::create($request->validated());
        session()->flash('success', 'Année académique créée avec succès.');
        return redirect()->route('admin.annees-academiques.index');
    }

    public function edit(AnneeAcademique $anneesAcademique)
    {
        return view('admin.annees_academiques.edit', compact('anneesAcademique'));
    }

    public function update(AnneeAcademiqueRequest $request, AnneeAcademique $anneesAcademique)
    {
        $anneesAcademique->update($request->validated());
        session()->flash('success', 'Année académique modifiée avec succès.');
        return redirect()->route('admin.annees-academiques.index');
    }

    public function destroy(AnneeAcademique $anneesAcademique)
    {
        $anneesAcademique->delete();
        session()->flash('success', 'Année académique supprimée avec succès.');
        return redirect()->route('admin.annees-academiques.index');
    }
}
