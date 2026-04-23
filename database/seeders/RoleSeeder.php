<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role User dan Admin
        Role::firstOrCreate(['name' => 'User']);
        Role::firstOrCreate(['name' => 'Admin']);

        // Buat admin default + kasih role
        User::firstOrCreate([
            'email' => 'admin@riloka.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password123'),
        ])->assignRole('Admin');
    }
}
