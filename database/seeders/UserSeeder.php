<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
        ];

        $users = User::all();

        if(empty($users))
        {
            User::create($userData);
        }
    }
}
