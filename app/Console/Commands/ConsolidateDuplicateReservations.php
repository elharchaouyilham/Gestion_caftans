<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ConsolidateDuplicateReservations extends Command
{
    protected $signature = 'fix:consolidate-reservations';
    protected $description = 'Consolidate duplicate reservations from the same date range into one';

    public function handle()
    {
        $this->line('=== CONSOLIDATING DUPLICATE RESERVATIONS ===');

        // Find reservations with the same user, dates, and event type
        $duplicates = DB::table('reservations')
            ->selectRaw('user_id, date_reservation, date_retour, event_type, COUNT(*) as cnt')
            ->groupBy('user_id', 'date_reservation', 'date_retour', 'event_type')
            ->having('cnt', '>', 1)
            ->get();

        $consolidated = 0;

        foreach ($duplicates as $dup) {
            $this->line("\nProcessing duplicates: User {$dup->user_id}, dates {$dup->date_reservation} - {$dup->date_retour}");

            // Get all reservation IDs for this group
            $resIds = DB::table('reservations')
                ->where('user_id', $dup->user_id)
                ->where('date_reservation', $dup->date_reservation)
                ->where('date_retour', $dup->date_retour)
                ->where('event_type', $dup->event_type)
                ->pluck('id');

            // Keep the first one, delete the others
            $keepId = $resIds->first();
            $deleteIds = $resIds->slice(1);

            $this->line("  Keeping reservation #{$keepId}, deleting: " . implode(', ', $deleteIds->toArray()));

            // Copy all products from duplicate reservations to the main one
            foreach ($deleteIds as $delId) {
                $products = DB::table('product_reservation')
                    ->where('reservation_id', $delId)
                    ->pluck('product_id');

                foreach ($products as $productId) {
                    // Check if not already assigned
                    $exists = DB::table('product_reservation')
                        ->where('reservation_id', $keepId)
                        ->where('product_id', $productId)
                        ->exists();

                    if (!$exists) {
                        DB::table('product_reservation')->insert([
                            'reservation_id' => $keepId,
                            'product_id' => $productId,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }

            // Delete the duplicate reservations
            DB::table('reservations')->whereIn('id', $deleteIds)->delete();
            $consolidated += $deleteIds->count();
        }

        $this->info("\n✓ Successfully consolidated $consolidated duplicate reservations!");
    }
}
