<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['H Series', 'V Series', 'Z Series', 'Aksesoris'];

        foreach ($categories as $item) {
            ProductCategory::create([
                'name' => $item,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
