@extends('admin.layouts.app')

@section('title', 'Gestion du Catalogue - IlhamCollection Admin')
@section('header_title', 'Catalogue & Forfaits')

@section('content')
<div class="flex flex-col xl:flex-row gap-8">

    <div class="flex-1 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-white">
            <div class="flex space-x-4 overflow-x-auto">
                <button class="text-sm font-bold text-[#d4af37] border-b-2 border-[#d4af37] pb-1 whitespace-nowrap">Tous</button>
                <button class="text-sm font-medium text-gray-500 hover:text-gray-900 pb-1 whitespace-nowrap">Caftans</button>
                <button class="text-sm font-medium text-gray-500 hover:text-gray-900 pb-1 whitespace-nowrap">Accessoires</button>
                <button class="text-sm font-medium text-gray-500 hover:text-gray-900 pb-1 whitespace-nowrap">Forfaits</button>
            </div>
            <div class="relative ml-4">
                <input type="text" placeholder="Rechercher..." class="text-sm border-gray-300 rounded-md pl-8 pr-4 py-1.5 focus:ring-[#d4af37] focus:border-[#d4af37] border w-full sm:w-auto">
                <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Article</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix (MAD)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0">
                                    <img class="h-10 w-10 rounded object-cover" src="https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Caftan Royal">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Caftan Royal Jawhara</div>
                                    <div class="text-sm text-gray-500">Taille : M</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Caftan</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1 500</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disponible</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-[#d4af37] hover:text-[#b5952f] mr-3">Modifier</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Supprimer</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 bg-gray-100 rounded flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Forfait Fiançailles</div>
                                    <div class="text-sm text-gray-500">Caftan + Bijoux</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Forfait</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1 200</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Actif</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-[#d4af37] hover:text-[#b5952f] mr-3">Modifier</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
            <div class="text-sm text-gray-700">Affichage de <span class="font-medium">1</span> à <span class="font-medium">2</span> sur <span class="font-medium">24</span> résultats</div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Précédent</button>
                <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Suivant</button>
            </div>
        </div>
    </div>

    <div class="w-full xl:w-96 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6">Ajouter un élément</h3>

        <form action="#" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3">
                    <option value="caftan">Caftan de mariée</option>
                    <option value="accessory">Accessoire</option>
                    <option value="package">Forfait complet</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom de l'article</label>
                <input type="text" name="name" placeholder="Ex: Takchita Vert Émeraude" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Prix (MAD)</label>
                    <input type="number" name="price" min="0" step="10" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Taille</label>
                    <select name="size" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm border py-2 px-3">
                        <option value="standard">Standard / Ajustable</option>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="na">N/A (Accessoire)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Photo principale</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-[#d4af37] transition cursor-pointer bg-gray-50">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="file-upload" class="relative cursor-pointer rounded-md font-medium text-[#d4af37] hover:text-[#b5952f]">
                                <span>Télécharger un fichier</span>
                                <input id="file-upload" name="image" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG jusqu'à 2MB</p>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-[#d4af37] hover:bg-[#b5952f] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#d4af37] transition duration-300">
                    Enregistrer dans le catalogue
                </button>
            </div>
        </form>
    </div>
</div>
@endsection