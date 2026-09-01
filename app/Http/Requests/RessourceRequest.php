<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RessourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'annee_academique_id' => ['required', 'exists:annees_academiques,id'],
            'niveau_id' => ['required', 'exists:niveaux,id'],
            'ue_id' => ['required', 'exists:ues,id'],
            'ecue_id' => ['nullable', 'exists:ecues,id'],
            'type_ressource_id' => ['required', 'exists:types_ressources,id'],
            'fichier' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ];

        if ($this->isMethod('post')) {
            $rules['fichier'][] = 'required';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'titre.required' => 'Le titre est obligatoire.',
            'annee_academique_id.required' => 'L\'année académique est obligatoire.',
            'annee_academique_id.exists' => 'L\'année académique sélectionnée n\'existe pas.',
            'niveau_id.required' => 'Le niveau est obligatoire.',
            'niveau_id.exists' => 'Le niveau sélectionné n\'existe pas.',
            'ue_id.required' => 'L\'UE est obligatoire.',
            'ue_id.exists' => 'L\'UE sélectionnée n\'existe pas.',
            'ecue_id.exists' => 'L\'ECUE sélectionnée n\'existe pas.',
            'type_ressource_id.required' => 'Le type de ressource est obligatoire.',
            'type_ressource_id.exists' => 'Le type de ressource sélectionné n\'existe pas.',
            'fichier.required' => 'Le fichier PDF est obligatoire.',
            'fichier.mimes' => 'Le fichier doit être un PDF.',
            'fichier.max' => 'Le fichier ne doit pas dépasser 10 Mo.',
        ];
    }
}
