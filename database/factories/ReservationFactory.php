<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        $eventDate = $this->faker->dateTimeBetween('+1 day', '+6 months');
        $returnDate = (clone $eventDate)->modify('+2 days');

        return [
            'date_reservation' => $eventDate,
            'date_retour' => $returnDate,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'completed', 'cancelled']),
            'event_type' => $this->faker->randomElement(['wedding', 'engagement', 'henna', 'evening']),
            'client_name' => $this->faker->name('female'),
            'client_phone' => $this->faker->phoneNumber(),
            'client_email' => $this->faker->email(),
            'client_city' => $this->faker->city(),
            'special_requests' => $this->faker->optional()->sentence(),
            'product_id' => Product::inRandomOrder()->first()?->id ?? 1,
            'user_id' => User::where('role_id', 2)->inRandomOrder()->first()?->id,
            'total_amount' => $this->faker->randomElement([2400, 3600, 4800, 6000, 7200])
        ];
    }
}
