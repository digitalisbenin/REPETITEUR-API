<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarification>
 */
class TarificationFactory extends Factory
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
            'classe_id' => $classe->random()->id,
            'prix' => $this->faker->word,
            'matiere_id' => $matiere->random()->id,
        ];
    }
}
