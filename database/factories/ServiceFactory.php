<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // if 'public/services' folder not exists, create it
        if (!Storage::exists('public/services')) {
            Storage::makeDirectory('public/services', 777, true, true);
        }
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'cover' => $this->faker->image(storage_path('app/public/services'), 640, 480, null, false),
        ];
    }
}
