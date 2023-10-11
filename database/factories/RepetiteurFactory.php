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
        $matiere = Matiere::all();
        $status= $this->faker->randomElement(['En cours','Terminer']);

        return [
            'fname' => $this->faker->word,
            'lname' => $this->faker->word,
            'classe' => $this->faker->word,
            'diplome_imageUrl' => $this->faker->word,
            'profil_imageUrl' => $this->faker->word,
            'phone' => $this->faker->word,
            'adresse' => $this->faker->word,

            'sexe' => $this->faker->word,
            'grade' => $this->faker->word,
            'ecole' => $this->faker->word,
            'experience' => $this->faker->word,
            'status' => $status,
            'user_id' => $users->random()->id,
            'matiere_id' => $matiere->random()->id,
        ];
    }
}
