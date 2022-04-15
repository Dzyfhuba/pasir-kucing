<?php

namespace Database\Factories;

use App\Models\ClientCate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $clientcate_ids = ClientCate::select('id')->get()->pluck('id')->toArray();
        // if 'public/clients' folder not exists, create it
        if (!Storage::exists('public/clients')) {
            Storage::makeDirectory('public/clients', 777, true, true);
        }
        return [
            'clientcate_id' => $this->faker->randomElement($clientcate_ids),
            'name' => $this->faker->name,
            'logo' => $this->faker->image(storage_path('app/public/clients'), 200, 200, 'people', false),
        ];
    }
}
