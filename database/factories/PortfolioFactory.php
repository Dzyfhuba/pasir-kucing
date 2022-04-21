<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\PortfolioCate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // generate some image url
        $images = [];
        for ($i = 0; $i < 3; $i++) {
            $images[] = 'https://picsum.photos/id/' . rand(5, 10) . '/200/300';
        }
        return [
            'category_id' => PortfolioCate::all()->random()->id,
            'name' => $this->faker->word,
            'date' => $this->faker->date,
            'client_id' => Client::all()->random()->id,
            'description' => $this->faker->text,
            'images' => json_encode($images),
            'video' => '<iframe width="100%" height="auto" src="https://www.youtube.com/embed/gsxHhfvmPDc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ];
    }
}
