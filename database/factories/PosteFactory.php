<?php

namespace Database\Factories;
use App\Models\Repetiteur;
use App\Models\Enfants;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poste>
 */
class PosteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $repetiteur = Repetiteur::all();
        $enfants = Enfants::all();
        $user = User::all();
        return [
            'content' => $this->faker->word,
            'repetiteur_id' => $repetiteur->random()->id,
            'enfants_id' => $enfants->random()->id,
            'user_id' => $user->random()->id,
        ];
    }
}
