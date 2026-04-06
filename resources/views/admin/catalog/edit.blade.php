@extends('admin.layouts.app')

@section('title', 'Éditer un Produit - Admin')
@section('header_title', 'Éditer Produit')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Éditer le Produit</h1>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.catalog.update', $product) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom du Produit *</label>
                    <input type="text" name="nom" value="{{ $product->nom }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
                    <select name="category_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prix (MAD) *</label>
                    <input type="number" name="prix" value="{{ $product->prix }}" step="0.01" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Quantité en Stock *</label>
                    <input type="number" name="quantite" value="{{ $product->quantite }}" min="0" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">URL Image</label>
                <input type="url" name="url" value="{{ $product->url }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">{{ $product->description }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Style</label>
                    <select name="style"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
                        <option value="">--</option>
                        <option value="Traditionnel" {{ $product->style == 'Traditionnel' ? 'selected' : '' }}>Traditionnel
                        </option>
                        <option value="Moderne" {{ $product->style == 'Moderne' ? 'selected' : '' }}>Moderne</option>
                        <option value="Fusion" {{ $product->style == 'Fusion' ? 'selected' : '' }}>Fusion</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Couleur</label>
                    <input type="text" name="color" value="{{ $product->color }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Taille</label>
                    <input type="text" name="size" value="{{ $product->size }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37]">
                </div>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="submit"
                    class="flex-1 bg-[#d4af37] text-white px-6 py-2 rounded-lg hover:bg-[#b5952f] transition font-medium">
                    Mettre à Jour
                </button>
                <a href="{{ route('admin.catalog.index') }}"
                    class="flex-1 border border-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-50 transition font-medium text-center">
                    Annuler
                </a>
            </div>
        </form>
    </div>
@endsection
