<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnneeScolaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, 
     */
    public function rules(): array
    {
        return [
            'libelle'=>'required',
            'date_debut' => 'required|date',
           'date_fin' => 'required|date|after_or_equal:date_debut',
             'statut' => 'required|string|in:active,inactive',
        ];
    }
    public function messages()
    {
        return [
            'libelle.required' => 'Le libellé est requis.',
            'date_debut.required' => 'La date de début est requise.',
            'date_fin.required' => 'La date de fin est requise.',
            'date_fin.after_or_equal' => 'La date de fin doit être égale ou après la date de début.',
            'statut.required' => 'Le statut est requis.',
            'statut.in' => 'Le statut doit être "active" ou "inactive".',
        ];
    }
}
