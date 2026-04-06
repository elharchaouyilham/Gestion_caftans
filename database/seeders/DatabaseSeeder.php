<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Forfait;
use App\Models\Reservation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $roles = [
            ['name' => 'Admin', 'description' => 'Administrator of the platform'],
            ['name' => 'Client', 'description' => 'Customer/Client'],
        ];
        DB::table('roles')->insert($roles);
        $categories = [
            ['name' => 'Caftans', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accessoires', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('categories')->insert($categories);
     
        User::factory()->admin()->create([
            'name' => 'Ilham Admin',
            'email' => 'admin@ilhamcollection.com',
            'phone' => '+212612345678',
            'city' => 'Casablanca',
        ]);
        User::factory()->admin()->create([
            'name' => 'Test Admin',
            'email' => 'testadmin@ilhamcollection.com',
            'phone' => '+212698765432',
            'city' => 'Rabat',
        ]);
    
        $clients = User::factory()->count(20)->create();
        $categoryIds = [1, 2]; 
        $adminId = 1;

        for ($i = 0; $i < 40; $i++) {
            Product::factory()->create([
                'category_id' => $categoryIds[floor($i / 20)], 
                'user_id' => $adminId
            ]);
        }
    
        Forfait::factory()->count(10)->create([
            'user_id' => $adminId
        ]);
       
        $products = Product::all();
        $resCount = 0;

        for ($i = 0; $i < 30; $i++) {
            $reservation = Reservation::factory()->create();

            
            $productCount = rand(1, 4);
            $randomProducts = $products->random($productCount);
            $reservation->products()->sync($randomProducts->pluck('id')->toArray());

            $resCount++;
        }
        
    }
}
