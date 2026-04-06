<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;

class CheckReservationDuplicates extends Command
{
    protected $signature = 'check:dupes';
    protected $description = 'Check for duplicate reservations';

    public function handle()
    {
        $this->line('=== RESERVATIONS IN DATABASE ===');

        $reservations = Reservation::all();
        $this->line('Total reservations: ' . $reservations->count());

        foreach ($reservations as $res) {
            $this->line("\nReservation #{$res->id}:");
            $this->line("  User ID: {$res->user_id}");
            $this->line("  Product ID: {$res->product_id}");
            $this->line("  Date: {$res->date_reservation}");
            $this->line("  Products via pivot: " . $res->products()->count());
            $this->line("  Product IDs: " . $res->products()->pluck('id')->implode(', '));
        }

        $this->line("\n=== CHECKING DUPLICATES ===");
        $grouped = Reservation::selectRaw('user_id, date_reservation, date_retour, COUNT(*) as cnt')
            ->groupBy('user_id', 'date_reservation', 'date_retour')
            ->having('cnt', '>', 1)
            ->get();

        if ($grouped->count() > 0) {
            $this->error('FOUND DUPLICATES:');
            foreach ($grouped as $group) {
                $this->error("User {$group->user_id} has {$group->cnt} reservations for {$group->date_reservation} - {$group->date_retour}");
            }
        } else {
            $this->info('No duplicate reservations found!');
        }
    }
}
