<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        $reservations = DB::table('reservations')->get();

        foreach ($reservations as $reservation) {
            if ($reservation->product_id) {
                $exists = DB::table('product_reservation')
                    ->where('product_id', $reservation->product_id)
                    ->where('reservation_id', $reservation->id)
                    ->exists();

                if (!$exists) {
                 
                    DB::table('product_reservation')->insert([
                        'product_id' => $reservation->product_id,
                        'reservation_id' => $reservation->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};

