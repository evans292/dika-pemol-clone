<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Rd Devandhio Mega Gunawan',
            'username' => 'P1207376',
            'email' => 'devan@example.com',
            'password' => Hash::make('devan123'),
        ]);
    }
}
