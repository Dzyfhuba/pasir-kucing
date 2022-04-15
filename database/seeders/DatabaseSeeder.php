<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // call RoleSeeder
        $this->call(RoleSeeder::class);
        // call UserSeeder
        $this->call(UserSeeder::class);

        // call factory
        AboutUs::factory(1)->create();
        Contact::factory(1)->create();
        Service::factory(30)->create();
        $this->call(ClientCateSeeder::class);
    }
}
