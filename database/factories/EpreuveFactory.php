<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Epreuve>
 */
class EpreuveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $matiere = Matiere::all();
        $classe = Classe::all();
        return [
            //
            'name' => $this->faker->word,
            'epreuve' => $this->faker->word,
            'classe_id' => $classe->random()->id,
            'corrige' => $this->faker->word,
            'matiere_id' => $matiere->random()->id,
        ];
    }
}
