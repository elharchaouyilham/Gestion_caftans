@extends('layouts.app')

@section('title', $product->nom . ' - IlhamCollection')

@section('content')
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <div class="flex items-center space-x-2 mb-8 text-sm text-gray-600">
                <a href="/" class="hover:text-[#d4af37] transition">Accueil</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                @if ($product->category_id == 1)
                    <a href="{{ route('caftans') }}" class="hover:text-[#d4af37] transition">Caftans</a>
                @else
                    <a href="{{ route('accessoires') }}" class="hover:text-[#d4af37] transition">Accessoires</a>
                @endif
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-semibold">{{ $product->nom }}</span>
            </div>

            <!-- Product Detail -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                <!-- Image -->
                <div>
                    @if ($product->url)
                        <img src="{{ $product->url }}" alt="{{ $product->nom }}"
                            class="w-full rounded-lg shadow-lg object-cover h-96 md:h-full">
                    @else
                        <div class="w-full h-96 md:h-full bg-gray-200 rounded-lg flex items-center justify-center">
                            <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Details -->
                <div>
                    <h1 class="text-4xl font-serif font-bold text-gray-900 mb-4">{{ $product->nom }}</h1>

                    <!-- Price -->
                    <div class="mb-6">
                        <p class="text-sm text-gray-500 uppercase tracking-wide mb-2">Prix de location</p>
                        <div class="flex items-baseline space-x-3">
                            <span class="text-4xl font-bold text-[#d4af37]">{{ number_format($product->prix, 0, ',', ' ') }}
                                <span class="text-xl text-gray-600">MAD</span></span>
                            @if ($product->quantite > 0)
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">En
                                    Stock</span>
                            @else
                                <span
                                    class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-semibold">Indisponible</span>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <p class="text-lg text-gray-700 leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <!-- Specifications -->
                    <div class="mb-8 p-6 bg-[#faf9f8] rounded-lg">
                        <h3 class="font-serif font-bold text-gray-900 mb-4">Caractéristiques</h3>
                        <div class="grid grid-cols-2 gap-4">
                            @if ($product->style)
                                <div>
                                    <p class="text-sm text-gray-500">Style</p>
                                    <p class="font-semibold text-gray-900">{{ ucfirst($product->style) }}</p>
                                </div>
                            @endif
                            @if ($product->color)
                                <div>
                                    <p class="text-sm text-gray-500">Couleur</p>
                                    <p class="font-semibold text-gray-900">{{ ucfirst($product->color) }}</p>
                                </div>
                            @endif
                            @if ($product->size)
                                <div>
                                    <p class="text-sm text-gray-500">Taille</p>
                                    <p class="font-semibold text-gray-900">{{ $product->size }}</p>
                                </div>
                            @endif
                            @if ($product->ceremony_type)
                                <div>
                                    <p class="text-sm text-gray-500">Type de céré</p>
                                    <p class="font-semibold text-gray-900">{{ ucfirst($product->ceremony_type) }}</p>
                                </div>
                            @endif
                            <div>
                                <p class="text-sm text-gray-500">Catégorie</p>
                                <p class="font-semibold text-gray-900">{{ $product->category->nom ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Quantité en stock</p>
                                <p class="font-semibold text-gray-900">{{ $product->quantite }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        @if ($product->quantite > 0)
                            <form action="{{ route('reservation.create') }}" method="GET" class="w-full">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit"
                                    class="w-full text-center bg-[#d4af37] hover:bg-[#b5952f] transition text-white font-bold py-3 px-6 rounded-lg text-lg">
                                    Réserver Maintenant
                                </button>
                            </form>
                        @else
                            <button disabled
                                class="w-full bg-gray-300 text-gray-600 font-bold py-3 px-6 rounded-lg text-lg cursor-not-allowed">
                                Indisponible
                            </button>
                        @endif

                        <button
                            class="w-full border-2 border-[#d4af37] text-[#d4af37] hover:bg-[#d4af37] hover:text-white transition font-bold py-3 px-6 rounded-lg text-lg">
                            Ajouter aux Favoris
                        </button>
                    </div>

                    <!-- Contact -->
                    <div class="mt-8 p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                        <p class="text-blue-800 text-sm">
                            <strong>Besoin d'aide?</strong> <br>
                            Contactez-nous pour des questions ou pour une consultation stylisme.
                        </p>
                        <a href="{{ route('contact.create') }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold text-sm mt-2 inline-block">
                            Nous Contacter →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Reserved Dates Info -->
            @if ($reservedDates->count() > 0)
                <div class="mb-12 p-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-lg">
                    <h3 class="font-serif font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Dates Réservées
                    </h3>
                    <div class="space-y-2">
                        @foreach ($reservedDates as $reservation)
                            <p class="text-sm text-gray-700">
                                <strong>Du
                                    {{ \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') }}</strong>
                                au
                                <strong>{{ \Carbon\Carbon::parse($reservation->date_retour)->format('d/m/Y') }}</strong>
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Related Products -->
            @if ($relatedProducts->count() > 0)
                <div class="border-t border-gray-200 pt-16">
                    <h2 class="text-3xl font-serif font-bold text-gray-900 mb-8">Produits Similaires</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($relatedProducts as $related)
                            <div
                                class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition group">
                                <div class="relative h-64 overflow-hidden bg-gray-100">
                                    @if ($related->url)
                                        <img src="{{ $related->url }}" alt="{{ $related->nom }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    @else
                                        <svg class="w-full h-full text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-serif font-semibold text-gray-900 truncate">{{ $related->nom }}</h3>
                                    <div class="mt-3 flex items-center justify-between">
                                        <span
                                            class="font-bold text-[#d4af37]">{{ number_format($related->prix, 0, ',', ' ') }}
                                            MAD</span>
                                        <a href="{{ route('product.show', $related->id) }}"
                                            class="text-[#d4af37] hover:text-[#b5952f] font-semibold text-sm">Voir →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
