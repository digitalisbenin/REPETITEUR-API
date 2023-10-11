<?php

namespace Database\Factories;
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
        return [
            //
            'name' => $this->faker->word,
            'epreuve' => $this->faker->word,
            'classe' => $this->faker->word,
            'corrige' => $this->faker->word,
            'matiere_id' => $matiere->random()->id,
        ];
    }
}
