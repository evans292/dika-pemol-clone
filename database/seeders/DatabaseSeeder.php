<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Petugas']);

        User::create([
            'name' => 'Admin',
            'role_id' => 1,
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Rd Devandhio Mega Gunawan',
            'role_id' => 2,
            'username' => 'P1207376',
            'email' => 'devan@example.com',
            'password' => Hash::make('devan123'),
        ]);


    }
}
