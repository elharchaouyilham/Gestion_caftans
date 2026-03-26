<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Forfait;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        $clients = User::factory(10)->create([
            'role_id' => 2
        ]);

        $categories = Category::factory(5)->create();

        $products = Product::factory(10)->create([
            'user_id' => $admin->id
        ]);

        Forfait::factory(5)->create([
            'user_id' => $admin->id
        ]);

        Reservation::factory(15)->create([
            'user_id' => $clients->random()->id,
            'product_id' => $products->random()->id
        ]);
    }
}