<?php

namespace App\Http\Requests;

use App\Models\AnneeAcademique;
use App\Models\MatriculeValide;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'matricule' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $anneeCourante = AnneeAcademique::orderBy('libelle', 'desc')->first();
                    if (!$anneeCourante) {
                        $fail("Aucune année académique en cours.");
                        return;
                    }

                    $matriculeValide = MatriculeValide::where('matricule', $value)
                        ->where('annee_academique_id', $anneeCourante->id)
                        ->first();

                    if (!$matriculeValide) {
                        $fail("matricule inexistant");
                        return;
                    }

                    $existingUser = User::where('matricule', $value)->first();
                    if ($existingUser) {
                        $fail("matricule déjà utilisé par un autre compte");
                    }
                },
            ],
            'niveau_id' => ['required', 'exists:niveaux,id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'matricule.required' => 'Le matricule est obligatoire.',
            'niveau_id.required' => 'Le niveau est obligatoire.',
            'niveau_id.exists' => 'Le niveau sélectionné n\'existe pas.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}
