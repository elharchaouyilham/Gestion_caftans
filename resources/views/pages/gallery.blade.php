@extends('layouts.app')

@section('title', 'Galerie - IlhamCollection')

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-4">Notre Galerie</h1>
                <div class="w-24 h-1 bg-[#d4af37] mx-auto"></div>
                <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">Explorez notre collection à travers les photos de nos
                    clients les plus satisfaits.</p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @php
                    $galleryImages = [
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Caftan Royal Jawhara',
                            'category' => 'Caftans',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Caftan Traditionnel',
                            'category' => 'Caftans',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1515562141207-6811bcb33eaf?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Caftan Moderne',
                            'category' => 'Caftans',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Couronnes & Bijoux',
                            'category' => 'Accessoires',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1541417904180-8175f6904f90?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Mdamma Or',
                            'category' => 'Accessoires',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Ensemble Complet',
                            'category' => 'Forfaits',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1600521605632-15f184e622b7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Mariage Traditionnel',
                            'category' => 'Forfaits',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1595777707502-221a2eaf822f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Cérémonie Henné',
                            'category' => 'Forfaits',
                        ],
                        [
                            'img' =>
                                'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Fiançailles Chic',
                            'category' => 'Caftans',
                        ],
                    ];
                @endphp

                @foreach ($galleryImages as $image)
                    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition">
                        <img src="{{ $image['img'] }}" alt="{{ $image['title'] }}"
                            class="w-full h-80 object-cover group-hover:scale-110 transition duration-300">

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition duration-300 flex items-end">
                            <div
                                class="w-full p-4 bg-gradient-to-t from-black to-transparent text-white opacity-0 group-hover:opacity-100 transition">
                                <p class="font-semibold">{{ $image['title'] }}</p>
                                <p class="text-sm text-gray-300">{{ $image['category'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Filter Info -->
            <div class="bg-[#faf9f8] rounded-xl p-8 text-center">
                <h3 class="text-2xl font-serif font-bold text-gray-900 mb-4">Inspirez-vous de nos créations</h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Chaque image raconte une histoire unique. Découvrez comment
                    IlhamCollection a contribué à rendre les jours spéciaux de nos clients encore plus magiques.</p>
                <a href="{{ route('caftans') }}"
                    class="inline-block bg-[#d4af37] text-white font-semibold px-8 py-3 rounded-lg hover:bg-[#b8860b] transition">
                    Voir le Catalogue Complet
                </a>
            </div>
        </div>
    </div>
@endsection
