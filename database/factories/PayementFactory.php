<?php

namespace Database\Factories;
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
        $parents = Parents::all();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'reference' => $this->faker->word,
            'parents_id' => $parents->random()->id,
        ];
    }
}
