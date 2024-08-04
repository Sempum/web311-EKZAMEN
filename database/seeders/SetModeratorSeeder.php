<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'moderator')->first();

        $user->assignRole('moderator');
        $user->givePermissionTo([
            'manage products',
            'manage sectors',
            'manage categories',
            'manage documents'
        ]);
    }
}
