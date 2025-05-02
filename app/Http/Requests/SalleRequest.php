<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'num_salle' => 'required|string|max:10',
            'type_salle' => 'nullable|string|max:30',
        ];
    }}
