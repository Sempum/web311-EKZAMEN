<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sector::create(['name' => 'Бытовая техника']);
        Sector::create(['name' => 'Тв, консоли, аудио']);
        Sector::create(['name' => 'Пк, ноутбуки, периферия']);
    }
}
