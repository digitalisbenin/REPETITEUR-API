<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parents>
 */
class ParentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::all();
        return [
            'fname' => $this->faker->word,
            'lname' => $this->faker->word,
            'adresse' => $this->faker->word,
            'phone' => $this->faker->word,
            'user_id' => $users->random()->id,
        ];
    }

}
