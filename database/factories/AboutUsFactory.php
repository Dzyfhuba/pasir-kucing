<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutUs>
 */
class AboutUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'history' => $this->faker->paragraphs(2, true),
            'vision' => $this->faker->paragraphs(2, true),
            'mission' => $this->faker->paragraphs(2, true),
            'certificate' => $this->faker->paragraphs(2, true),
        ];
    }
}
