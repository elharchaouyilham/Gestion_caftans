<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ForfaitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => 'Forfait '.$this->faker->word(),
            'quantite' => $this->faker->numberBetween(1,10),
            'prix' => $this->faker->randomFloat(2,500,3000),
            'url' => $this->faker->imageUrl(640,480,'fashion'),
            'user_id' => 1
        ];
    }
}