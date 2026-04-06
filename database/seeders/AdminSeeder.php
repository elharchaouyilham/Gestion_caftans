<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@ilhamcollection.com'],
            [
                'name' => 'Ilham Admin',
                'email' => 'admin@ilhamcollection.com',
                'password' => Hash::make('password123'),
                'phone' => '+212612345678',
                'city' => 'Casablanca',
                'role_id' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table('users')->updateOrInsert(
            ['email' => 'testadmin@ilhamcollection.com'],
            [
                'name' => 'Test Admin User',
                'email' => 'testadmin@ilhamcollection.com',
                'password' => Hash::make('password123'),
                'phone' => '+212698765432',
                'city' => 'Rabat',
                'role_id' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
