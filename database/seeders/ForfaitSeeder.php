<?php

namespace Database\Seeders;

use App\Models\Forfait;
use Illuminate\Database\Seeder;

class ForfaitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forfaits = [
            [
                'nom' => 'Forfait Fiançailles',
                'description' => 'Le forfait parfait pour célébrer vos fiançailles',
                'prix' => 2200,
                'quantite' => 10,
                'url' => 'https://images.unsplash.com/photo-1600521605632-15f184e622b7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'duration' => 48,
                'inclusions' => json_encode([
                    '1 Caftan de fiançailles au choix',
                    'Accessoires de base (collier + boucles)',
                    'Chaussures de mariée',
                    'Retouches et ajustements inclus'
                ]),
                'user_id' => 1,
            ],
            [
                'nom' => 'Forfait Henné',
                'description' => 'La soirée du henné, riche en couleurs et en émotions',
                'prix' => 2800,
                'quantite' => 10,
                'url' => 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'duration' => 24,
                'inclusions' => json_encode([
                    '1 Caftan traditionnel',
                    'Mdamma (ceinture) traditionnelle',
                    'Parure bijoux complète',
                    'Chaussures et sac assortis'
                ]),
                'user_id' => 1,
            ],
            [
                'nom' => 'Forfait Mariage Traditionnel',
                'description' => 'Le forfait complet pour votre mariage traditionnel',
                'prix' => 4500,
                'quantite' => 8,
                'url' => 'https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'duration' => 72,
                'inclusions' => json_encode([
                    '2 Caftans de mariage au choix',
                    'Mdamma de luxe',
                    'Parure bijoux complète',
                    'Couronne ou tiara',
                    'Chaussures et accessoires assortis',
                    'Retouches et ajustements inclus'
                ]),
                'user_id' => 1,
            ],
            [
                'nom' => 'Forfait Mariée Deluxe',
                'description' => 'Notre forfait premium avec services haut de gamme',
                'prix' => 6000,
                'quantite' => 5,
                'url' => 'https://images.unsplash.com/photo-1595777707502-221a2eaf822f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'duration' => 96,
                'inclusions' => json_encode([
                    '3 Caftans de luxe au choix',
                    '2 Mdamma de prestige',
                    'Parure bijoux exclusive',
                    'Plusieurs couronnes et tiares',
                    'Service de stylisme consultatif',
                    'Livraison et retrait à domicile',
                    'Nettoyage et retouches gratuites'
                ]),
                'user_id' => 1,
            ],
        ];

        foreach ($forfaits as $forfait) {
            Forfait::create($forfait);
        }
    }
}
