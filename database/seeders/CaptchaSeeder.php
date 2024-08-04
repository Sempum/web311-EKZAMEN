<?php

namespace Database\Seeders;

use App\Models\Captcha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaptchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Captcha::create([
            'code' => 'W93BX',
            'image_path' => 'captcha\captcha1.jpg'
        ]);
        Captcha::create([
            'code' => '9Y548',
            'image_path' => 'captcha\captcha2.jpg'
        ]);
        Captcha::create([
            'code' => 'TSMS9',
            'image_path' => 'captcha\captcha3.jpg'
        ]);
        Captcha::create([
            'code' => 'HJ9PV',
            'image_path' => 'captcha\captcha4.jpg'
        ]);
        Captcha::create([
            'code' => 'D4TSH',
            'image_path' => 'captcha\captcha5.jpg'
        ]);
        Captcha::create([
            'code' => 'HWJRC',
            'image_path' => 'captcha\captcha6.jpg'
        ]);
        Captcha::create([
            'code' => 'JN6TS',
            'image_path' => 'captcha\captcha7.jpg'
        ]);
        Captcha::create([
            'code' => 'TK58P',
            'image_path' => 'captcha\captcha8.jpg'
        ]);
        Captcha::create([
            'code' => 'DT6JX',
            'image_path' => 'captcha\captcha9.jpg'
        ]);
        Captcha::create([
            'code' => 'WB3CX',
            'image_path' => 'captcha\captcha10.jpg'
        ]);
        Captcha::create([
            'code' => 'AUSKW',
            'image_path' => 'captcha\captcha11.jpg'
        ]);
        Captcha::create([
            'code' => 'R48EK',
            'image_path' => 'captcha\captcha12.jpg'
        ]);
        Captcha::create([
            'code' => 'SREMD',
            'image_path' => 'captcha\captcha13.jpg'
        ]);
        Captcha::create([
            'code' => 'VETRC',
            'image_path' => 'captcha\captcha14.jpg'
        ]);
        Captcha::create([
            'code' => 'TUTXJ',
            'image_path' => 'captcha\captcha15.jpg'
        ]);
    }
}
