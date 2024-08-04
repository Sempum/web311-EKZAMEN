<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'admin')->first();

        $user->assignRole('admin');
        $user->givePermissionTo([
            'manage roles',
            'manage users',
            'manage permissions',
            'manage products',
            'manage sectors',
            'manage categories',
            'manage documents'
        ]);
    }
}
