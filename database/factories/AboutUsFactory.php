<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        // recreate /certificates/ folder
        Storage::deleteDirectory('public/certificates');
        Storage::makeDirectory('public/certificates', 777, true, true);
        // faker generate some random image in array
        $certs = [];
        for ($i = 0; $i < 3; $i++) {
            $certs[] = $this->faker->image('public/storage/certificates', 480, 640, 'cats');
        }

        // array to string
        $certs = implode(',', $certs);
        return [
            'history' => $this->faker->paragraphs(2, true),
            'vision' => $this->faker->paragraphs(2, true),
            'mission' => $this->faker->paragraphs(2, true),
            'certificate' => $certs,
        ];
    }
}
