@extends('layouts.app')

@section('title', 'Catalogue Caftans - IlhamCollection')

@section('content')
    <div class="bg-white py-16 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900">Notre Collection de Caftans</h1>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto text-lg">Trouvez la tenue parfaite pour chacune de vos cérémonies.
                Disponible en plusieurs styles, couleurs et tailles.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-8" x-data="{ filtersOpen: false }">
            <!-- Mobile Filters Toggle Button -->
            <div class="lg:hidden mb-4">
                <button @click="filtersOpen = !filtersOpen"
                    class="w-full bg-[#d4af37] text-white px-4 py-3 rounded-lg font-semibold flex items-center justify-between hover:bg-[#b5952f] transition">
                    <span>Filtres ({{ count($currentFilters) ? count($currentFilters) : 'Aucun' }})</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Filters Sidebar -->
            <aside class="w-full lg:w-64 flex-shrink-0" :class="{ 'hidden': !filtersOpen, 'lg:block': true }"
                @click.outside="filtersOpen = false">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-32">
                    <h3 class="text-lg font-serif font-bold text-gray-900 mb-6 border-b pb-3">Filtres</h3>

                    <form method="GET" class="space-y-6" id="filterForm">
                        <!-- Search -->
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">Rechercher</h4>
                            <input type="text" name="search" placeholder="Nom ou description..."
                                value="{{ request('search', '') }}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-[#d4af37] focus:border-[#d4af37]">
                        </div>

                        <!-- Style Filter -->
                        @if (isset($filterOptions['styles']) && count($filterOptions['styles']) > 0)
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">Style</h4>
                                <div class="space-y-2">
                                    @foreach ($filterOptions['styles'] as $style)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="style[]" value="{{ $style }}"
                                                {{ in_array($style, (array) request('style', [])) ? 'checked' : '' }}
                                                class="w-4 h-4 border-gray-300 rounded focus:ring-[#d4af37]">
                                            <span class="ml-2 text-sm text-gray-600">{{ $style }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Ceremony Type Filter -->
                        @if (isset($filterOptions['ceremonyTypes']) && count($filterOptions['ceremonyTypes']) > 0)
                            <div class="pb-6 border-b">
                                <h4 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">Type de Cérémonie
                                </h4>
                                <div class="space-y-2">
                                    @foreach ($filterOptions['ceremonyTypes'] as $type)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="ceremony_type[]" value="{{ $type }}"
                                                {{ in_array($type, (array) request('ceremony_type', [])) ? 'checked' : '' }}
                                                class="w-4 h-4 border-gray-300 rounded focus:ring-[#d4af37]">
                                            <span class="ml-2 text-sm text-gray-600">{{ $type }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Color Filter -->
                        @if (isset($filterOptions['colors']) && count($filterOptions['colors']) > 0)
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">Couleur</h4>
                                <div class="space-y-2">
                                    @foreach ($filterOptions['colors'] as $color)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="color[]" value="{{ $color }}"
                                                {{ in_array($color, (array) request('color', [])) ? 'checked' : '' }}
                                                class="w-4 h-4 border-gray-300 rounded focus:ring-[#d4af37]">
                                            <span class="ml-2 text-sm text-gray-600">{{ $color }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Size Filter -->
                        @if (isset($filterOptions['sizes']) && count($filterOptions['sizes']) > 0)
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">Taille</h4>
                                <div class="space-y-2">
                                    @foreach ($filterOptions['sizes'] as $size)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="size[]" value="{{ $size }}"
                                                {{ in_array($size, (array) request('size', [])) ? 'checked' : '' }}
                                                class="w-4 h-4 border-gray-300 rounded focus:ring-[#d4af37]">
                                            <span class="ml-2 text-sm text-gray-600">{{ $size }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Price Range -->
                        <div class="pb-6 border-b">
                            <h4 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">Prix</h4>
                            <div class="space-y-3">
                                <div>
                                    <label for="min_price" class="text-xs text-gray-600">Min: <span
                                            id="minPriceDisplay">{{ request('min_price', $filterOptions['priceRange']['min']) }}</span>
                                        MAD</label>
                                    <input type="range" id="min_price" name="min_price"
                                        min="{{ $filterOptions['priceRange']['min'] }}"
                                        max="{{ $filterOptions['priceRange']['max'] }}"
                                        value="{{ request('min_price', $filterOptions['priceRange']['min']) }}"
                                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-[#d4af37]">
                                </div>
                                <div>
                                    <label for="max_price" class="text-xs text-gray-600">Max: <span
                                            id="maxPriceDisplay">{{ request('max_price', $filterOptions['priceRange']['max']) }}</span>
                                        MAD</label>
                                    <input type="range" id="max_price" name="max_price"
                                        min="{{ $filterOptions['priceRange']['min'] }}"
                                        max="{{ $filterOptions['priceRange']['max'] }}"
                                        value="{{ request('max_price', $filterOptions['priceRange']['max']) }}"
                                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-[#d4af37]">
                                </div>
                            </div>
                        </div>

                        <!-- Sort -->
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-3 uppercase tracking-wide">Trier par</h4>
                            <select name="sort"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-[#d4af37] focus:border-[#d4af37]">
                                <option value="newest" {{ request('sort', 'newest') === 'newest' ? 'selected' : '' }}>Plus
                                    récents</option>
                                <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Prix
                                    croissant</option>
                                <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Prix
                                    décroissant</option>
                                <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Plus
                                    populaires</option>
                                <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Nom A-Z
                                </option>
                                <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>Nom Z-A
                                </option>
                            </select>
                        </div>

                        <!-- Submit and Reset Buttons -->
                        <div class="flex gap-2 pt-4">
                            <button type="submit"
                                class="flex-1 bg-[#d4af37] hover:bg-[#b5952f] text-white font-semibold py-2 rounded-lg transition">
                                Filtrer
                            </button>
                            <a href="{{ route('caftans') }}"
                                class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-900 font-semibold py-2 rounded-lg transition text-center">
                                Réinitialiser
                            </a>
                        </div>
                    </form>
                </div>
            </aside>

            <!-- Products Grid -->
            <div class="flex-1">
                <!-- Active Filters Display -->
                @if (count($currentFilters) > 0)
                    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-semibold text-blue-900">Filtres actifs:</p>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach ($currentFilters as $key => $value)
                                        @if ($key !== 'page')
                                            @if (is_array($value))
                                                @foreach ($value as $v)
                                                    <span
                                                        class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">
                                                        {{ ucfirst($key) }}: {{ $v }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span
                                                    class="inline-flex items-center gap-1 bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">
                                                    {{ ucfirst($key) }}: {{ $value }}
                                                </span>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Results Info -->
                <div class="mb-6 flex items-center justify-between">
                    <p class="text-gray-600">
                        <span class="font-semibold text-gray-900">{{ $products->total() }}</span>
                        résultats trouvés
                    </p>
                </div>

                <!-- Product Cards Grid -->
                @if ($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        @foreach ($products as $product)
                            <div
                                class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition group">
                                <div class="relative overflow-hidden h-64">
                                    <img src="{{ $product->url ?? 'https://via.placeholder.com/300x400?text=Product' }}"
                                        alt="{{ $product->nom }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    @if ($product->quantite > 0)
                                        <div
                                            class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                            En stock
                                        </div>
                                    @else
                                        <div
                                            class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                            Rupture
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="font-serif font-bold text-gray-900 mb-2 line-clamp-2">{{ $product->nom }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $product->description }}</p>

                                    <div class="flex justify-between items-center mb-3">
                                        <div class="flex gap-2 flex-wrap">
                                            @if ($product->style)
                                                <span
                                                    class="inline-block text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">{{ $product->style }}</span>
                                            @endif
                                            @if ($product->color)
                                                <span
                                                    class="inline-block text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">{{ $product->color }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div class="text-2xl font-bold text-[#d4af37]">
                                            {{ number_format($product->prix, 0) }} <span
                                                class="text-sm text-gray-500">MAD</span>
                                        </div>
                                        <a href="{{ route('product.show', $product->id) }}"
                                            class="bg-[#d4af37] hover:bg-[#b5952f] text-white px-3 py-2 rounded-lg transition text-sm font-medium">
                                            Voir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="flex justify-center mt-8">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                        <p class="text-gray-600 text-lg">Aucun produit ne correspond à vos critères.</p>
                        <a href="{{ route('caftans') }}"
                            class="inline-block mt-4 bg-[#d4af37] hover:bg-[#b5952f] text-white px-6 py-2 rounded-lg transition">
                            Réinitialiser les filtres
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Update price range display
        document.getElementById('min_price').addEventListener('input', function() {
            document.getElementById('minPriceDisplay').textContent = this.value;
        });
        document.getElementById('max_price').addEventListener('input', function() {
            document.getElementById('maxPriceDisplay').textContent = this.value;
        });
    </script>
@endsection
