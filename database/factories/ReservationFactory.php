<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    public function definition()
    {
        return [
            'date_reservation' => $this->faker->date(),
            'date_retour' => $this->faker->date(),
            'status' => $this->faker->randomElement([
                'en attente',
                'confirmée',
                'annulée'
            ]),
            'product_id' => rand(1,10),
            'client_id' => rand(2,10)
        ];
    }
}