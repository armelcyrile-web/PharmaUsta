<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualiteRequest;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ActualiteController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:gerer-actualites'),
        ];
    }

    public function index(Request $request)
    {
        $query = Actualite::with('auteur');

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $actualites = $query->orderByDesc('created_at')->paginate(15);
        return view('admin.actualites.index', compact('actualites'));
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(ActualiteRequest $request)
    {
        $data = $request->validated();
        $data['auteur_id'] = auth()->id();
        $data['statut'] = 'brouillon';

        Actualite::create($data);
        session()->flash('success', 'Actualité créée avec succès.');
        return redirect()->route('admin.actualites.index');
    }

    public function edit(Actualite $actualite)
    {
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(ActualiteRequest $request, Actualite $actualite)
    {
        $actualite->update($request->validated());
        session()->flash('success', 'Actualité modifiée avec succès.');
        return redirect()->route('admin.actualites.index');
    }

    public function publish(Actualite $actualite)
    {
        $actualite->update([
            'statut' => 'publie',
            'date_publication' => $actualite->date_publication ?? now()->toDateString(),
        ]);
        session()->flash('success', 'Actualité publiée avec succès.');
        return redirect()->route('admin.actualites.index');
    }

    public function retract(Actualite $actualite)
    {
        $actualite->update(['statut' => 'retire']);
        session()->flash('success', 'Actualité retirée avec succès.');
        return redirect()->route('admin.actualites.index');
    }

    public function destroy(Actualite $actualite)
    {
        $actualite->delete();
        session()->flash('success', 'Actualité supprimée avec succès.');
        return redirect()->route('admin.actualites.index');
    }
}
