<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // if 'public/services' folder not exists, create it
        if (!Storage::exists('public/products')) {
            Storage::makeDirectory('public/products', 777, true, true);
        }
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraphs(5, true),
            'cover' => $this->faker->image(storage_path('app/public/products'), 640, 480, null, false),
        ];
    }
}
