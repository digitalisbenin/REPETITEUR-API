<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Repetiteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RepetiteurMatiereClasse>
 */
class RepetiteurMatiereClasseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $repetiteur = Repetiteur::all();
        $matiere = Matiere::all();
        $classe = Classe::all();
        return [
            //
            'repetiteur_id' => $repetiteur->random()->id,
            'classe_id' => $classe->random()->id,

            'matiere_id' => $matiere->random()->id,
        ];
    }
}
