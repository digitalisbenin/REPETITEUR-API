<?php

namespace Database\Factories;
use App\Models\Repetiteur;
use App\Models\Demande;
use App\Models\Parents;
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
       // $repetiteur = Repetiteur::all();
        $demande = Demande::all();
       // $parents = Parents::all();
        return [
            'content' => $this->faker->word,

            'demande_id' => $demande->random()->id,

        ];
    }
}
