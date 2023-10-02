<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Enfants;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repetiteur>
 */
class RepetiteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all();
        $enfants = Enfants::all();
        $matiere = Matiere::all();
        return [
            'fname' => $this->faker->word,
            'lname' => $this->faker->word,
            'diplome_photo_path' => $this->faker->word,
            'phone' => $this->faker->word,
            'adresse' => $this->faker->word,
            'statut' => $this->faker->word,
            'user_id' => $users->random()->id,
            'enfants_id' => $enfants->random()->id,
            'matiere_id' => $matiere->random()->id,
        ];
    }
}
