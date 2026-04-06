<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $styles = ['Traditionnel', 'Moderne', 'Fusion'];
        $colors = ['Rouge', 'Vert', 'Bleu', 'Rose', 'Or', 'Argent', 'Noir', 'Blanc', 'Bordeaux', 'Violet'];
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'S-M', 'M-L', 'L-XL'];
        $ceremonyTypes = ['Mariage', 'Fiançailles', 'Henné', 'Soirée', 'Engagement'];

        return [
            'nom' => 'Caftan ' . $this->faker->word() . ' ' . $this->faker->word(),
            'description' => $this->faker->sentence(10),
            'quantite' => $this->faker->numberBetween(1, 10),
            'prix' => $this->faker->randomElement([1200, 1400, 1500, 1600, 1800, 2000, 2200, 2500, 3000]),
            'url' => $this->faker->imageUrl(600, 800, 'fashion'),
            'style' => $this->faker->randomElement($styles),
            'color' => $this->faker->randomElement($colors),
            'size' => $this->faker->randomElement($sizes),
            'ceremony_type' => $this->faker->randomElement($ceremonyTypes),
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1,
            'user_id' => User::where('role_id', 1)->inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
