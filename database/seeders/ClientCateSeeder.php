<?php

namespace Database\Seeders;

use App\Models\ClientCate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientCateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['instansi pemerintah', 'lain-lain', 'swasta'];

        foreach ($name as $key => $value) {
            ClientCate::create([
                'name' => $value,
            ]);
        }
    }
}
