<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => 'Caftan '.$this->faker->word(),
            'quantite' => rand(1,10),
            'prix' => $this->faker->randomFloat(2,500,3000),
            'category_id' => rand(1,3),
            'user_id' => 1
        ];
    }
}