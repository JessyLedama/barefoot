<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use App\Models\User;
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> 2107d1dac4dc6ae133eb91018a87e3945d5fca50

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

<<<<<<< HEAD
        User::factory()->create([
            'name' => 'Jayliste',
            'email' => 'jayliste@gmail.com',
            'password' => Hash::make('password'),
        ]);
=======
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
>>>>>>> 2107d1dac4dc6ae133eb91018a87e3945d5fca50
    }
}
