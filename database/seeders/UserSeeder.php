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

        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('mambaur123')
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('mambaur123')
        ]);

        $garudafiber->assignRole('superadmin');
        $superadmin->assignRole('superadmin');
        $admin->assignRole('admin');
    }
}
