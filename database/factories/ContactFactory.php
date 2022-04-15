<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->email,
            'twitter' => $this->faker->url,
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'youtube' => $this->faker->url,
        ];
    }
}
