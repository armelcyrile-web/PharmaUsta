<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EcueRequest;
use App\Models\Ecue;
use App\Models\Ue;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EcueController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:gerer-referentiels'),
        ];
    }

    public function index(Request $request)
    {
        $ecues = Ecue::with('ue')->get();
        if ($request->expectsJson()) {
            return response()->json($ecues);
        }
        return view('admin.ecues.index', compact('ecues'));
    }

    public function create()
    {
        $ues = Ue::all();
        return view('admin.ecues.create', compact('ues'));
    }

    public function store(EcueRequest $request)
    {
        Ecue::create($request->validated());
        session()->flash('success', 'ECUE créée avec succès.');
        return redirect()->route('admin.ecues.index');
    }

    public function edit(Ecue $ecue)
    {
        $ues = Ue::all();
        return view('admin.ecues.edit', compact('ecue', 'ues'));
    }

    public function update(EcueRequest $request, Ecue $ecue)
    {
        $ecue->update($request->validated());
        session()->flash('success', 'ECUE modifiée avec succès.');
        return redirect()->route('admin.ecues.index');
    }

    public function destroy(Ecue $ecue)
    {
        $ecue->delete();
        session()->flash('success', 'ECUE supprimée avec succès.');
        return redirect()->route('admin.ecues.index');
    }
}
