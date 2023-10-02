<?php

namespace Database\Factories;
use App\Models\Matiere;
use App\Models\Parents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enfants>
 */
class EnfantsFactory extends Factory
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
        return [
            'fname' => $this->faker->word,
            'lname' => $this->faker->word,
            'classe' => $this->faker->word,
            'parents_id' => $parents->random()->id,
            'matiere_id' => $matiere->random()->id,
        ];

    }
}
