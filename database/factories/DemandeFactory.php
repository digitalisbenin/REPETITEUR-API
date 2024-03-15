<?php

namespace Database\Factories;

use App\Models\Enfants;
use App\Models\Matiere;
use App\Models\Parents;
use App\Models\Repetiteur;
use App\Models\Tarification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tarification = Tarification::all();
        $enfants = Enfants::all();
        $repetiteur = Repetiteur::all();
        $statues = ['En cours','Validé','Non Validé'];
        return [
            'status' => $this->faker->randomElement($statues),
            'motif' => $this->faker->word,
            'adresse' => $this->faker->word,
            'enfants_id' => $enfants->random()->id,
            'tarification_id' => $tarification->random()->id,
            'repetiteur_id' => $repetiteur->random()->id,
        ];
    }
}
