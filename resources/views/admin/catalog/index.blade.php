@extends('admin.layouts.app')

@section('title', 'Gestion du Catalogue - IlhamCollection Admin')
@section('header_title', 'Catalogue & Forfaits')

@section('content')
    <div class="flex flex-col xl:flex-row gap-8">

        <div class="flex-1 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 xl:flex-col gap-4">
                <!-- Filter Tabs -->
                <div class="flex space-x-4 overflow-x-auto mb-4">
                    <a href="{{ route('admin.catalog.index') }}"
                        class="text-sm font-bold @if (!$selectedCategory) text-[#d4af37] border-b-2 border-[#d4af37] @else text-gray-500 hover:text-gray-900 @endif pb-1 whitespace-nowrap transition">
                        Tous ({{ $categories->count() }})
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('admin.catalog.index', ['category' => $category->id]) }}"
                            class="text-sm font-medium @if ($selectedCategory == $category->id) text-[#d4af37] border-b-2 border-[#d4af37] @else text-gray-500 hover:text-gray-900 @endif pb-1 whitespace-nowrap transition">
                            {{ $category->name }}</a>
                    @endforeach
                </div>

                <!-- Search -->
                <form method="GET" action="{{ route('admin.catalog.index') }}" class="flex items-center">
                    <div class="relative flex-1">
                        <input type="text" name="search" placeholder="Rechercher..." value="{{ $searchQuery }}"
                            class="text-sm border-gray-300 rounded-md pl-8 pr-4 py-1.5 focus:ring-[#d4af37] focus:border-[#d4af37] border w-full sm:w-auto">
                        <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    @if ($selectedCategory)
                        <input type="hidden" name="category" value="{{ $selectedCategory }}">
                    @endif
                    <button type="submit"
                        class="ml-2 px-4 py-1.5 bg-[#d4af37] text-white rounded-md hover:bg-[#b5952f] transition text-sm font-medium">
                        Chercher
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Article</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix
                                (MAD)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantité</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if ($product->url)
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded object-cover" src="{{ $product->url }}"
                                                    alt="{{ $product->nom }}">
                                            </div>
                                        @else
                                            <div
                                                class="h-10 w-10 flex-shrink-0 bg-gray-100 rounded flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $product->nom }}</div>
                                            @if ($product->size)
                                                <div class="text-sm text-gray-500">Taille : {{ $product->size }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $product->category->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ number_format($product->prix, 0) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->quantite }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.catalog.edit', $product->id) }}"
                                        class="text-[#d4af37] hover:text-[#b5952f] mr-3">Modifier</a>
                                    <form method="POST" action="{{ route('admin.catalog.destroy', $product->id) }}"
                                        style="display:inline;" onsubmit="return confirm('Êtes-vous sûr?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    <p>Aucun produit enregistré</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
                <div class="text-sm text-gray-700">Affichage de <span
                        class="font-medium">{{ $products->firstItem() ?? 0 }}</span> à <span
                        class="font-medium">{{ $products->lastItem() ?? 0 }}</span> sur <span
                        class="font-medium">{{ $products->total() }}</span> résultats</div>
                <div class="flex space-x-2">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

        <div class="w-full xl:w-96 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-6">Ajouter un élément</h3>

            <form action="{{ route('admin.catalog.store') }}" method="POST" class="space-y-5"
                enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                    <select name="category_id"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3"
                        required>
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom de l'article</label>
                    <input type="text" name="nom" placeholder="Ex: Takchita Vert Émeraude"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Prix (MAD)</label>
                        <input type="number" name="prix" min="0" step="10"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Quantité</label>
                        <input type="number" name="quantite" min="1" step="1"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Taille</label>
                    <select name="size"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3">
                        <option value="">Sélectionnez une taille</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        <option value="Unique">Unique / Ajustable</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Couleur</label>
                    <input type="text" name="color" placeholder="Ex: Vert, Blanc, Doré"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Style</label>
                    <input type="text" name="style" placeholder="Ex: Traditionnel, Moderne, Fusion"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lien image (URL)</label>
                    <input type="url" name="url" placeholder="https://example.com/image.jpg"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3">
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-[#d4af37] hover:bg-[#b5952f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#d4af37] transition duration-300">
                        Enregistrer dans le catalogue
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
