<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Caftans
            [
                'nom' => 'Caftan Royal Jawhara',
                'description' => 'Caftan traditionnel avec broderie dorée',
                'quantite' => 5,
                'prix' => 1500,
                'url' => 'https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => 'Traditionnel',
                'color' => 'Rouge',
                'size' => 'M',
                'ceremony_type' => 'Mariage',
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'nom' => 'Caftan Elegance Moderne',
                'description' => 'Design épuré et sophistiqué',
                'quantite' => 3,
                'prix' => 1800,
                'url' => 'https://images.unsplash.com/photo-1515562141207-6811bcb33eaf?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => 'Moderne',
                'color' => 'Vert',
                'size' => 'S-L',
                'ceremony_type' => 'Fiançailles',
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'nom' => 'Caftan Royale Deluxe',
                'description' => 'Collection Premium avec perles',
                'quantite' => 2,
                'prix' => 2500,
                'url' => 'https://images.unsplash.com/photo-1597517214624-e27a91423b67?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => 'Fusion',
                'color' => 'Bleu',
                'size' => 'XS-L',
                'ceremony_type' => 'Mariage',
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'nom' => 'Caftan Féminin Rose',
                'description' => 'Tendre et romantique',
                'quantite' => 4,
                'prix' => 1600,
                'url' => 'https://images.unsplash.com/photo-1595777707502-221a2eaf822f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => 'Moderne',
                'color' => 'Rose',
                'size' => 'XS-M',
                'ceremony_type' => 'Henné',
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'nom' => 'Caftan Or Impérial',
                'description' => 'Majestueux et éclatant',
                'quantite' => 3,
                'prix' => 2200,
                'url' => 'https://images.unsplash.com/photo-1583391733003-8ca62a7f0263?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => 'Traditionnel',
                'color' => 'Or',
                'size' => 'S-XL',
                'ceremony_type' => 'Mariage',
                'category_id' => 1,
                'user_id' => 1,
            ],
            [
                'nom' => 'Caftan Blanc Élégance',
                'description' => 'Pur et intemporel',
                'quantite' => 4,
                'prix' => 1400,
                'url' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => 'Moderne',
                'color' => 'Blanc',
                'size' => 'XS-L',
                'ceremony_type' => 'Fiançailles',
                'category_id' => 1,
                'user_id' => 1,
            ],
            // Accessories
            [
                'nom' => 'Parure Diamants',
                'description' => 'Collier et boucles d\'oreilles',
                'quantite' => 6,
                'prix' => 800,
                'url' => 'https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => NULL,
                'color' => 'Blanc',
                'size' => NULL,
                'ceremony_type' => 'Mariage',
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'nom' => 'Collier Or Gold',
                'description' => 'Avec motifs floraux délicats',
                'quantite' => 5,
                'prix' => 650,
                'url' => 'https://images.unsplash.com/photo-1515562141207-6811bcb33eaf?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => NULL,
                'color' => 'Or',
                'size' => NULL,
                'ceremony_type' => NULL,
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'nom' => 'Mdamma Or Impérial',
                'description' => 'Ceinture dorée avec motifs',
                'quantite' => 4,
                'prix' => 1200,
                'url' => 'https://images.unsplash.com/photo-1541417904180-8175f6904f90?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => NULL,
                'color' => 'Or',
                'size' => 'S-L',
                'ceremony_type' => NULL,
                'category_id' => 2,
                'user_id' => 1,
            ],
            [
                'nom' => 'Couronne Royale',
                'description' => 'Avec cristaux brillants',
                'quantite' => 3,
                'prix' => 450,
                'url' => 'https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                'style' => NULL,
                'color' => 'Multicolore',
                'size' => NULL,
                'ceremony_type' => 'Mariage',
                'category_id' => 2,
                'user_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
