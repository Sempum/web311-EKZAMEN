<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage permissions']);
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage sectors']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage documents']);
        Permission::create(['name' => 'post report']);
    }
}
