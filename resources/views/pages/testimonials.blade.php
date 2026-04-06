@extends('layouts.app')

@section('title', 'Témoignages - IlhamCollection')

@section('content')
    <div class="bg-gradient-to-b from-[#faf9f8] to-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-4">Témoignages de nos Clientes</h1>
                <div class="w-24 h-1 bg-[#d4af37] mx-auto"></div>
                <p class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto">Découvrez les expériences et les moments magiques de
                    nos clientes qui ont fait confiance à IlhamCollection pour leurs plus beaux jours.</p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @php
                    $testimonials = [
                        [
                            'name' => 'Fatima El Mansouri',
                            'event' => 'Mariage Traditionnel',
                            'content' =>
                                'IlhamCollection m\'a proposé des caftans magnifiques! Le service était impeccable et j\'ai reçu mon ensemble à temps. Je recommande vivement!',
                            'rating' => 5,
                            'image' =>
                                'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'name' => 'Amina Bennani',
                            'event' => 'Fiançailles',
                            'content' =>
                                'Le caftan que j\'ai choisi était absolutement parfait pour mes fiançailles. Les retouches ont été faites rapidement et avec soin.',
                            'rating' => 5,
                            'image' =>
                                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'name' => 'Layla Alaoui',
                            'event' => 'Henné',
                            'content' =>
                                'Excellente qualité de tissus, design raffiné et équipe très professionnelle. C\'est devenu ma marque de référence pour les événements!',
                            'rating' => 5,
                            'image' =>
                                'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'name' => 'Nadia Belhaj',
                            'event' => 'Mariage Moderne',
                            'content' =>
                                'J\'ai adoré la collection et les options de personnalisation. Le forfait complet m\'a permis d\'avoir une tenue cohérente pour toutes les cérémonies.',
                            'rating' => 5,
                            'image' =>
                                'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'name' => 'Yasmine Idrissi',
                            'event' => 'Cérémonie Mixte',
                            'content' =>
                                'Service clientèle extraordinaire! Elles ont compris exactement ce que je voulais et m\'ont conseillée avec bienveillance. Merci infiniment!',
                            'rating' => 5,
                            'image' =>
                                'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80',
                        ],
                        [
                            'name' => 'Safira Tahiri',
                            'event' => 'Mariage Chiite',
                            'content' =>
                                'Les caftans sont de qualité supérieure et les détails sont soignés. Je suis tellement satisfaite! Je recommande à toutes mes amies.',
                            'rating' => 5,
                            'image' =>
                                'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80',
                        ],
                    ];
                @endphp

                @foreach ($testimonials as $testimonial)
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 hover:shadow-lg transition">
                        <!-- Rating Stars -->
                        <div class="flex items-center mb-4">
                            <div class="flex space-x-1">
                                @for ($i = 0; $i < $testimonial['rating']; $i++)
                                    <svg class="w-5 h-5 text-[#d4af37]" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                @endfor
                            </div>
                        </div>

                        <!-- Quote -->
                        <p class="text-gray-700 mb-6 leading-relaxed italic">{{ $testimonial['content'] }}</p>

                        <!-- Author Info -->
                        <div class="flex items-center pt-6 border-t border-gray-200">
                            <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}"
                                class="w-12 h-12 rounded-full object-cover mr-4">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $testimonial['name'] }}</p>
                                <p class="text-sm text-[#d4af37]">{{ $testimonial['event'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- CTA Section -->
            <div class="bg-gradient-to-r from-[#d4af37] to-[#b8860b] rounded-2xl p-12 text-center text-white">
                <h2 class="text-3xl font-serif font-bold mb-4">Prêtes pour votre propre histoire?</h2>
                <p class="text-lg mb-8 opacity-90">Réservez dès maintenant et vivez une expérience IlhamCollection
                    inoubliable!</p>
                <a href="{{ route('reservation.create') }}"
                    class="inline-block bg-white text-[#d4af37] font-bold px-8 py-3 rounded-full hover:bg-gray-100 transition">
                    Réserver Maintenant
                </a>
            </div>
        </div>
    </div>
@endsection
