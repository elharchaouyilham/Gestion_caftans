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
                                'https://as2.ftcdn.net/v2/jpg/10/42/29/63/1000_F_1042296320_DAAeiiKu0yD0yirwmM85lPVQHuXbx77h.jpg',
                            'title' => 'Caftan Royal Jawhara',
                            'category' => 'Caftans',
                        ],
                        [
                            'img' =>
                                'https://as2.ftcdn.net/v2/jpg/12/66/00/57/1000_F_1266005746_Xu9WfbdefsVkoTTlVcRNKYhmWcLBdJHu.jpg',
                            'title' => 'Caftan Traditionnel',
                            'category' => 'Caftans',
                        ],
                        [
                            'img' =>
                                'https://as1.ftcdn.net/v2/jpg/15/30/01/68/1000_F_1530016885_X4AGFwCkOFEWf1edFSoAOaqWuzeLuzqk.jpg',
                            'title' => 'Caftan Moderne',
                            'category' => 'Caftans',
                        ],
                        [
                            'img' =>
                                'https://as2.ftcdn.net/v2/jpg/12/66/01/61/1000_F_1266016191_Icgbt5vwfrMitot3lucCxzJy6ruqtfzQ.jpg',
                            'title' => 'Couronnes & Bijoux',
                            'category' => 'Accessoires',
                        ],
                        [
                            'img' =>
                                'https://as1.ftcdn.net/v2/jpg/10/20/64/20/1000_F_1020642041_5ySvj1XMvjUvbw7otk1Cy6xF4hu5HPiC.jpg',
                            'title' => 'Mdamma Or',
                            'category' => 'Accessoires',
                        ],
                        [
                            'img' =>
                                'https://as2.ftcdn.net/v2/jpg/03/21/29/51/1000_F_321295114_8PKQjB1ZrE7xStqAZxjj1RlpfnqMvKMt.jpg',
                            'title' => 'Ensemble Complet',
                            'category' => 'Forfaits',
                        ],
                        [
                            'img' =>
                                'https://as1.ftcdn.net/v2/jpg/03/66/27/64/1000_F_366276496_NcuxOVFEFDNUqA0Mc8azrtoOW8Wh29FF.jpg',
                            'title' => 'Mariage Traditionnel',
                            'category' => 'Forfaits',
                        ],
                        [
                            'img' =>
                                'https://as2.ftcdn.net/v2/jpg/10/20/63/09/1000_F_1020630982_lx8L0QUfzkwDxfj4ZGdCKxOYLgePvTYd.jpg',
                            'title' => 'Cérémonie Henné',
                            'category' => 'Forfaits',
                        ],
                        [
                            'img' =>
                                'https://as2.ftcdn.net/v2/jpg/12/66/01/61/1000_F_1266016191_Icgbt5vwfrMitot3lucCxzJy6ruqtfzQ.jpg',
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
