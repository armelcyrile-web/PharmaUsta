<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->save();

        session()->flash('success', 'Profil mis à jour avec succès.');
        return redirect()->route('profile.edit');
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        session()->flash('success', 'Mot de passe modifié avec succès.');
        return redirect()->route('profile.edit');
    }
}
