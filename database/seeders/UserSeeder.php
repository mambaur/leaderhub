<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $garudafiber = User::create([
            'name' => 'Garuda Fiber',
            'email' => 'garudafiberapp@gmail.com',
            'password' => bcrypt('HpwZy2X9')
        ]);

        $garudafiber->assignRole('superadmin');
    }
}
