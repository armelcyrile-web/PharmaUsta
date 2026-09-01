<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EcueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'ue_id' => ['nullable', 'exists:ues,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'ue_id.exists' => 'L\'UE sélectionnée n\'existe pas.',
        ];
    }
}
