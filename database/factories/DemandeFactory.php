<?php

namespace Database\Factories;
use App\Models\Matiere;
use App\Models\Parents;
use App\Models\Repetiteur;
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
        $matiere = Matiere::all();
        $parents = Parents::all();
        $repetiteur = Repetiteur::all();
        $statues = ['En cours','Validé','Non Validé'];
        return [
            'fname' => $this->faker->word,
            'lname' => $this->faker->word,
            'classe' => $this->faker->word,
            'status' => $this->faker->randomElement($statues),
            'motif' => $this->faker->word,
            'parents_id' => $parents->random()->id,
            'matiere_id' => $matiere->random()->id,
            'repetiteur_id' => $repetiteur->random()->id,
        ];
    }
}
