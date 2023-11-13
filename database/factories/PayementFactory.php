<?php

namespace Database\Factories;

use App\Models\Demande;
use App\Models\Parents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payement>
 */
class PayementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $demande = Demande::all();
        $statues = ['Impayer','Payer'];
        $mois = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet', 'Aout','Septembre','Octobre','Novembre','Decembre'];
        return [
            'name' => $this->faker->word,
            'mois' => $this->faker->unique()->randomElement($mois),
            'phone' => $this->faker->word,
            'reference' => $this->faker->word,
            'annee' => $this->faker->word,
            'status' => $this->faker->randomElement($statues),
            'date' => $this->faker->dateTimeThisDecade(),
            'demande_id' => $demande->random()->id,
        ];
    }
}
