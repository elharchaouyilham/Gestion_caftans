<?php

namespace Database\Factories;

use App\Models\Forfait;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForfaitFactory extends Factory
{
    protected $model = Forfait::class;

    public function definition()
    {
        $forfaitTypes = [
            [
                'nom' => 'Forfait Fiançailles',
                'description' => 'Un forfait complet pour célébrer vos fiançailles avec élégance',
                'prix' => 2200,
                'inclusions' => ['1 Caftan de fiançailles', 'Accessoires de base', 'Chaussures', 'Retouches incluses']
            ],
            [
                'nom' => 'Forfait Henné',
                'description' => 'Soirée du henné traditionnelle et festive',
                'prix' => 2800,
                'inclusions' => ['1 Caftan traditionnel', 'Mdamma', 'Parure bijoux', 'Chaussures et sac']
            ],
            [
                'nom' => 'Forfait Mariage Traditionnel',
                'description' => 'Le forfait mariage complet pour votre grand jour',
                'prix' => 4500,
                'inclusions' => ['2 Caftans de mariage', 'Mdamma de luxe', 'Parure bijoux', 'Couronne/tiara', 'Chaussures', 'Retouches']
            ],
            [
                'nom' => 'Forfait Mariée Deluxe',
                'description' => 'Notre offre premium avec tous les services haut de gamme',
                'prix' => 6000,
                'inclusions' => ['3 Caftans de luxe', '2 Mdamma', 'Parure exclusive', 'Consultations stylisme', 'Livraison', 'Nettoyage gratuit']
            ],
            [
                'nom' => 'Forfait Soirée Gala',
                'description' => 'Pour vos soirées et événements spéciaux',
                'prix' => 1800,
                'inclusions' => ['1 Caftan de soirée', 'Accessoires assortis', 'Chaussures', 'Livraison']
            ]
        ];

        $forfait = $this->faker->randomElement($forfaitTypes);

        return [
            'nom' => $forfait['nom'],
            'description' => $forfait['description'],
            'prix' => $forfait['prix'],
            'quantite' => $this->faker->numberBetween(3, 15),
            'url' => $this->faker->imageUrl(800, 600, 'fashion'),
            'duration' => $this->faker->randomElement([24, 48, 72, 96]),
            'inclusions' => json_encode($forfait['inclusions']),
            'user_id' => User::where('role_id', 1)->inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
