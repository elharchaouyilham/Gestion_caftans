<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed client/user test accounts
     */
    public function run(): void
    {
        $testUsers = [
            [
                'name' => 'Fatima El Boukhali',
                'email' => 'fatima@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+212612345600',
                'city' => 'Casablanca',
                'role_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Keltoum Mellouki',
                'email' => 'keltoum@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+212698765400',
                'city' => 'Rabat',
                'role_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Amina Hassan',
                'email' => 'amina@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+212631234567',
                'city' => 'Fès',
                'role_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Zahra Bennani',
                'email' => 'zahra@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+212645678901',
                'city' => 'Marrakech',
                'role_id' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Noura Ahmed',
                'email' => 'noura@example.com',
                'password' => Hash::make('password123'),
                'phone' => '+212678901234',
                'city' => 'Tanger',
                'role_id' => 2,
                'status' => 'active',
            ],
        ];

        foreach ($testUsers as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                array_merge($user, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
        foreach ($testUsers as $user) {
            echo "\n    - {$user['name']} ({$user['email']})";
        }
    }
}
