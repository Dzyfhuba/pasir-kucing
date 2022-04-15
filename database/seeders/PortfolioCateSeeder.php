<?php

namespace Database\Seeders;

use App\Models\PortfolioCate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioCateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ["rumah kucing", "gedung kucing", "desain rancangan"];
        foreach ($category as $key => $value) {
            PortfolioCate::create([
                'name' => $value,
            ]);
        }
    }
}
