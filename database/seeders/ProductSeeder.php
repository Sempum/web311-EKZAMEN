<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'PlayStation 5 Digital Edition',
            'description' => '825 ГБ, Bluetooth 5.1, Wi-Fi 6 (802.11ax), HDMI 2.1, до 8K UltraHD, 7680x4320',
            'category_id' => 7
        ]);
        Product::create([
            'name' => 'DEXP Aquilon O298',
            'description' => 'Intel Pentium Gold G6405, 2 x 4.1 ГГц, 8 ГБ DDR4, SSD 256 ГБ, без ОС',
            'category_id' => 6
        ]);
        Product::create([
            'name' => 'DEXP EH-C2NSMA/B',
            'description' => 'независимая, конфорок - 2 шт, панель - стеклокерамика, 3300 Вт',
            'category_id' => 5
        ]);
        Product::create([
            'name' => 'DEXP Aquilon серебристый',
            'description' => 'Full HD (1920x1080), IPS, Intel Celeron N4020C, ядра: 2 х 1.1 ГГц, RAM 8 ГБ, SSD 256 ГБ, Intel UHD Graphics 600, Windows 11 Home',
            'category_id' => 4
        ]);
        Product::create([
            'name' => 'BQ 2406B черный',
            'description' => 'Direct LED, HD, 60 Гц, HDMI х 2, USB х 1 шт',
            'category_id' => 3
        ]);

        Product::create([
            'name' => 'DEXP M9C7PB',
            'description' => 'расход воды - 9 л, кол-во комплектов - 9, защита от протечек, 45 см х 82 см - 86.5 см х 58 см',
            'category_id' => 2
        ]);

        Product::create([
            'name' => 'DEXP BIS2-0140AHE',
            'description' => '138 л, дисплей, 59.5 см x 81.8 см x 54.5 см',
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Beko BU1100HCA',
            'description' => '128 л, 59.8 см x 82 см x 54.5 см',
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'DEXP M12C7PB',
            'description' => 'расход воды - 11 л, кол-во комплектов - 12, защита от протечек, 60 см х 82 см - 86.5 см х 58 см',
            'category_id' => 2
        ]);
        Product::create([
            'name' => 'DEXP INS-2000 черный',
            'description' => '2 кВт, конфорок - 1 шт, переключатели - сенсор, покрытие - стеклокерамика, индукция',
            'category_id' => 5
        ]);
    }
}
