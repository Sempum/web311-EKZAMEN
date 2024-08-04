<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Холодильники',
            'sector_id' => 1
        ]);
        Category::create([
            'name' => 'Посудомоечные машины',
            'sector_id' => 1
        ]);
        Category::create([
            'name' => 'Телевизоры',
            'sector_id' => 2
        ]);
        Category::create([
            'name' => 'Ноутбуки',
            'sector_id' => 3
        ]);
        Category::create([
            'name' => 'Варочные панели',
            'sector_id' => 1
        ]);

        Category::create([
            'name' => 'Персональные компьютеры',
            'sector_id' => 3
        ]);

        Category::create([
            'name' => 'Консоли',
            'sector_id' => 2
        ]);
    }
}
