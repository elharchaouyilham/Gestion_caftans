@extends('layouts.app')

@section('title', 'Accueil - IlhamCollection')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div
                class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-16 lg:pt-24">
                <div class="sm:text-center lg:text-left px-4 sm:px-6 lg:px-8 mt-10">
                    <h1 class="text-4xl tracking-tight font-serif font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">L'élégance pour votre</span>
                        <span class="block text-[#d4af37] mt-2">jour inoubliable</span>
                    </h1>
                    <p
                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Découvrez notre collection exclusive de caftans et accessoires de mariage. Louez la tenue parfaite
                        pour vos cérémonies avec sérénité et raffinement.
                    </p>
                    <div class="mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-full shadow">
                            <a href="/reservation"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-[#d4af37] hover:bg-[#b5952f] transition">Réserver
                                maintenant</a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="/caftans"
                                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-[#d4af37] bg-[#fdfbf7] hover:bg-gray-50 transition">Voir
                                le catalogue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                alt="Mariée élégante">
        </div>
    </div>

    <!-- Why IlhamCollection -->
    <div class="py-16 bg-[#faf9f8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-4">Pourquoi IlhamCollection?</h2>
                <div class="w-24 h-1 bg-[#d4af37] mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-[#d4af37] rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-3">Collections Exclusives</h3>
                    <p class="text-gray-600">Une sélection raffinée de caftans et accessoires pour tous les styles et toutes
                        les occasions.</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-[#d4af37] rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-3">Forfaits Avantageux</h3>
                    <p class="text-gray-600">Des packages complets à des prix compétitifs pour tous les budgets et tous les
                        besoins.</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-[#d4af37] rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-3">Service Premium</h3>
                    <p class="text-gray-600">Consultation stylisme, retouches incluses et support exceptionnel tout au long
                        de votre mariage.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-4">Sélection à la Une</h2>
                <div class="w-24 h-1 bg-[#d4af37] mx-auto"></div>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Découvrez nos pièces les plus populaires du moment</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([['name' => 'Caftan Royal Jawhara', 'price' => 1500, 'img' => 'https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80', 'badge' => 'Populaire'], ['name' => 'Caftan Elegance Moderne', 'price' => 1800, 'img' => 'https://images.unsplash.com/photo-1515562141207-6811bcb33eaf?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80', 'badge' => 'Nouveau'], ['name' => 'Mdamma Or Impérial', 'price' => 1200, 'img' => 'https://images.unsplash.com/photo-1541417904180-8175f6904f90?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80', 'badge' => 'Premium'], ['name' => 'Couronne Royale', 'price' => 450, 'img' => 'https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80', 'badge' => 'Favori']] as $item)
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition group">
                        <div class="relative h-64 overflow-hidden bg-gray-100">
                            <img class="h-full w-full object-cover group-hover:scale-105 transition duration-300"
                                src="{{ $item['img'] }}" alt="{{ $item['name'] }}">
                            <div
                                class="absolute top-3 right-3 bg-[#d4af37] text-white px-3 py-1 rounded-full text-xs font-bold">
                                {{ $item['badge'] }}</div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-serif font-semibold text-gray-900">{{ $item['name'] }}</h3>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="font-bold text-gray-900">{{ $item['price'] }} MAD</span>
                                <a href="/reservation"
                                    class="text-[#d4af37] hover:text-[#b5952f] font-semibold text-sm">Réserver →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="/caftans"
                    class="inline-block bg-gray-900 text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition">Voir
                    toute la collection</a>
            </div>
        </div>
    </div>

    <!-- Collections by Category -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-4">Nos Collections</h2>
                <div class="w-24 h-1 bg-[#d4af37] mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Caftans -->
                <div class="relative group overflow-hidden rounded-2xl h-80">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                        src="https://images.unsplash.com/photo-1595777707502-221a2eaf822f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Caftans">
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <h3 class="text-3xl font-serif font-bold text-white mb-4">Caftans de Mariée</h3>
                        <a href="/caftans"
                            class="bg-[#d4af37] text-gray-900 px-6 py-2 rounded-full font-semibold hover:bg-white transition">Découvrir</a>
                    </div>
                </div>

                <!-- Accessories -->
                <div class="relative group overflow-hidden rounded-2xl h-80">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                        src="https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Accessoires">
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <h3 class="text-3xl font-serif font-bold text-white mb-4">Accessoires</h3>
                        <a href="/accessoires"
                            class="bg-[#d4af37] text-gray-900 px-6 py-2 rounded-full font-semibold hover:bg-white transition">Découvrir</a>
                    </div>
                </div>

                <!-- Forfaits -->
                <div class="relative group overflow-hidden rounded-2xl h-80">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                        src="https://images.unsplash.com/photo-1600521605632-15f184e622b7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Forfaits">
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-30 transition"></div>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <h3 class="text-3xl font-serif font-bold text-white mb-4">Forfaits Mariage</h3>
                        <a href="/forfaits"
                            class="bg-[#d4af37] text-gray-900 px-6 py-2 rounded-full font-semibold hover:bg-white transition">Découvrir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Packages Highlight -->
    <div class="py-16 bg-[#faf9f8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-4">Forfaits Adaptés à Vos Besoins
                </h2>
                <div class="w-24 h-1 bg-[#d4af37] mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition">
                    <div class="text-4xl font-bold text-[#d4af37] mb-2">2,2k</div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-2">Fiançailles</h3>
                    <p class="text-sm text-gray-600 mb-4">1 caftan + accessoires</p>
                    <a href="/forfaits" class="text-[#d4af37] hover:text-[#b5952f] font-semibold text-sm">Détails →</a>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition">
                    <div class="text-4xl font-bold text-[#d4af37] mb-2">2,8k</div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-2">Henné</h3>
                    <p class="text-sm text-gray-600 mb-4">1 caftan traditionnel complet</p>
                    <a href="/forfaits" class="text-[#d4af37] hover:text-[#b5952f] font-semibold text-sm">Détails →</a>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition">
                    <div class="text-4xl font-bold text-[#d4af37] mb-2">5,5k</div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-2">Mariage</h3>
                    <p class="text-sm text-gray-600 mb-4">2 caftans premium + accessoires</p>
                    <a href="/forfaits" class="text-[#d4af37] hover:text-[#b5952f] font-semibold text-sm">Détails →</a>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center hover:shadow-lg transition border-2 border-[#d4af37]">
                    <div class="text-4xl font-bold text-[#d4af37] mb-2">9,5k</div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 mb-2">Premium</h3>
                    <p class="text-sm text-gray-600 mb-4">4 caftans + service VIP</p>
                    <a href="/forfaits" class="text-[#d4af37] hover:text-[#b5952f] font-semibold text-sm">Détails →</a>
                </div>
            </div>

            <div class="text-center mt-8">
                <a href="/forfaits"
                    class="inline-block bg-[#d4af37] text-white px-8 py-3 rounded-full font-semibold hover:bg-[#b5952f] transition">Voir
                    tous les forfaits</a>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-4">Comment ça marche?</h2>
                <div class="w-24 h-1 bg-[#d4af37] mx-auto"></div>
                <p class="text-gray-500 mt-4">En 3 étapes simples, réservez la tenue de vos rêves</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Step 1 -->
                <div class="relative">
                    <div
                        class="flex items-center justify-center w-16 h-16 rounded-full bg-[#d4af37] text-white font-bold text-2xl mx-auto mb-4">
                        1</div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 text-center mb-2">Parcourez & Sélectionnez</h3>
                    <p class="text-center text-gray-600">Explorez notre catalogue et choisissez les pièces qui vous
                        plaisent.</p>
                </div>

                <!-- Arrow 1 -->
                <div class="hidden md:flex absolute top-8 left-1/3 w-1/3 items-center justify-center">
                    <div class="flex-1 h-1 bg-[#d4af37]"></div>
                    <svg class="w-6 h-6 text-[#d4af37] -mx-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>

                <!-- Step 2 -->
                <div class="relative md:col-start-2">
                    <div
                        class="flex items-center justify-center w-16 h-16 rounded-full bg-[#d4af37] text-white font-bold text-2xl mx-auto mb-4">
                        2</div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 text-center mb-2">Complétez Vos Infos</h3>
                    <p class="text-center text-gray-600">Remplissez les dates et vos informations personnelles.</p>
                </div>

                <!-- Arrow 2 -->
                <div class="hidden md:flex absolute top-8 right-1/3 w-1/3 items-center justify-center">
                    <svg class="w-6 h-6 text-[#d4af37] -mx-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="flex-1 h-1 bg-[#d4af37]"></div>
                </div>

                <!-- Step 3 -->
                <div class="relative md:col-start-3">
                    <div
                        class="flex items-center justify-center w-16 h-16 rounded-full bg-[#d4af37] text-white font-bold text-2xl mx-auto mb-4">
                        3</div>
                    <h3 class="text-xl font-serif font-bold text-gray-900 text-center mb-2">Confirmation</h3>
                    <p class="text-center text-gray-600">Notre équipe vous contacte pour finaliser votre réservation.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Banner -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 py-16">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-white mb-6">Prête pour votre grand jour?</h2>
            <p class="text-xl text-gray-300 mb-10">Réservez dès maintenant et obtenez une consultation stylisme gratuite
            </p>
            <a href="/reservation"
                class="inline-block bg-[#d4af37] text-gray-900 px-10 py-4 rounded-full font-bold text-lg hover:bg-white transition">
                Commencer ma réservation
            </a>
        </div>
    </div>
@endsection
