<?php

namespace App\Http\Requests\RepetiteurMatiereClasse;

use Illuminate\Foundation\Http\FormRequest;

class StoreRepetiteurMatiereClasseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            //
            'classe_id' => 'required',
            'matiere_id' => 'required',
             'repetiteur_id' => 'required',
        ];
    }
}
