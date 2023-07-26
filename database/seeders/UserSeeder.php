<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'nama' => 'User ' . $i,
                'username' => 'user-' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('user'),
            ]);
        }
    }
}
