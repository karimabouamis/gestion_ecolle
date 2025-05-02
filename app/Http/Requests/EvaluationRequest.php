<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  // السماح للجميع بإجراء الطلب
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'date_evaluation' => 'required|date',
        'heure_evaluation' => 'nullable|date_format:H:i',
        'type_evaluation' => 'nullable|string|max:50',
        'id_matiere' => 'nullable|exists:matieres,id',
        'id_classe' => 'nullable|exists:classes,id',
        'id_enseignant' => 'nullable|exists:enseignants,id',
    ];
}
}
