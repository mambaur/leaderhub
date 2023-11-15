<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'key' => 'about',
            'title' => 'About',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Company::create([
            'key' => 'contact',
            'title' => 'Contact',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Company::create([
            'key' => 'address',
            'title' => 'Address',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Company::create([
            'key' => 'map',
            'title' => 'Map',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        Company::create([
            'key' => 'sliders',
            'title' => 'Sliders',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
