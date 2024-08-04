<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('000000')
        ]);

        User::create([
            'name' => 'moderator',
            'email' => 'moderator@mail.ru',
            'password' => Hash::make('000000')
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@mail.ru',
            'password' => Hash::make('000000')
        ]);
    }
}
