@extends('admin.layouts.app')

@section('title', 'Gestion des Catégories - IlhamCollection Admin')
@section('header_title', 'Gestion des Catégories')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Categories List -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-900">Catégories ({{ $categories->total() }})</h2>
            </div>

            @if ($categories->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Articles</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-medium text-gray-900">{{ $category->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-600">{{ $category->products_count }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST"
                                            action="{{ route('admin.catalog.destroyCategory', $category) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Êtes-vous sûr?')"
                                                class="text-red-600 hover:text-red-900">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
                    <div class="text-sm text-gray-700">
                        Affichage de <span class="font-medium">{{ $categories->from() }}</span> à <span
                            class="font-medium">{{ $categories->to() }}</span> sur <span
                            class="font-medium">{{ $categories->total() }}</span> résultats
                    </div>
                    <div class="flex space-x-2">
                        @if ($categories->onFirstPage())
                            <button disabled
                                class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-400 cursor-not-allowed">Précédent</button>
                        @else
                            <a href="{{ $categories->previousPageUrl() }}"
                                class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Précédent</a>
                        @endif

                        @if ($categories->hasMorePages())
                            <a href="{{ $categories->nextPageUrl() }}"
                                class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Suivant</a>
                        @else
                            <button disabled
                                class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-400 cursor-not-allowed">Suivant</button>
                        @endif
                    </div>
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <p class="text-gray-500">Aucune catégorie trouvée.</p>
                </div>
            @endif
        </div>

        <!-- Add Category Form -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-fit">
            <h3 class="text-lg font-bold text-gray-900 mb-6">Ajouter une Catégorie</h3>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                    <ul class="text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.catalog.storeCategory') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie</label>
                    <input type="text" name="name" placeholder="Ex: Caftans, Accessoires..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-[#d4af37] hover:bg-[#b5952f] text-white font-semibold py-2 rounded-lg transition">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
@endsection
