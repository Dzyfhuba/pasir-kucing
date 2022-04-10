<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'hafidz21ub@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'username' => 'User',
            'email' => 'uba21id@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        $user->assignRole('user');
    }
}
