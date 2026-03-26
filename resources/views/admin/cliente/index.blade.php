@extends('admin.layouts.app')

@section('title', 'Clientes - IlhamCollection Admin')
@section('header_title', 'Base de données Clientes')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-white">
        <h3 class="text-lg font-bold text-gray-900">Liste des Clientes</h3>
        <div class="relative w-64">
            <input type="text" placeholder="Rechercher (Nom, Tel, Email)..." class="w-full text-sm border-gray-300 rounded-md pl-8 pr-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] border">
            <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom complet</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Réservations</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière activité</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0 bg-[#fdfbf7] border border-[#d4af37] rounded-full flex items-center justify-center text-[#d4af37] font-bold font-serif">
                                FE
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Fatima E. Boukhali</div>
                                <div class="text-xs text-gray-500">Inscrite le 10 Mars 2026</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">+212 6 12 34 56 78</div>
                        <div class="text-xs text-gray-500">fatima@example.com</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Casablanca</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-bold text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Hier</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="inline-flex items-center text-green-600 hover:text-green-900 mr-3" title="Contacter sur WhatsApp">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.383 0 0 5.383 0 12.031c0 2.622.84 5.067 2.298 7.085L.5 24l5.073-1.687A11.96 11.96 0 0012.031 24c6.648 0 12.031-5.383 12.031-12.031S18.679 0 12.031 0zm5.122 17.203c-.22.613-1.284 1.164-1.77 1.236-.445.064-1.026.136-3.328-.813-2.784-1.149-4.604-4.01-4.743-4.194-.14-.184-1.134-1.503-1.134-2.864 0-1.36.702-2.033.95-2.308.248-.275.54-.344.718-.344.18 0 .358.006.516.012.164.006.386-.062.603.46.226.54.773 1.884.843 2.022.07.138.118.3.024.484-.094.184-.14.298-.282.466-.14.168-.298.358-.42.506-.134.156-.276.33-.11.616.166.286.74 1.222 1.59 1.982 1.096.98 2.016 1.286 2.302 1.424.286.138.452.116.62-.074.168-.184.724-.842.918-1.132.194-.29.388-.242.648-.146.26.096 1.648.776 1.93 916.28.14.44.218.51.344.78.126.27.126 1.042-.094 1.655z"/></svg>
                        </a>
                        <a href="#" class="text-[#d4af37] hover:text-[#b5952f]">Profil</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
        <div class="text-sm text-gray-700">Affichage de <span class="font-medium">1</span> à <span class="font-medium">10</span> sur <span class="font-medium">142</span> clientes</div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Précédent</button>
            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Suivant</button>
        </div>
    </div>
</div>
@endsection