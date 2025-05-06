<?php


// app/Http/Requests/StoreNoteRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'observation' => 'nullable|string',
            'id_evaluation' => 'required|exists:evaluations,id',
            'id_eleve' => 'required|exists:eleves,id',
            'valeur' => 'required|numeric|min:0|max:20',
        ];
    }
}

