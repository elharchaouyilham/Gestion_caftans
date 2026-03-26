@extends('admin.layouts.app')

@section('title', 'Réservations - IlhamCollection Admin')
@section('header_title', 'Gestion des Réservations')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4 bg-white">
        <div class="flex space-x-2 overflow-x-auto w-full sm:w-auto pb-2 sm:pb-0">
            <button class="px-4 py-1.5 text-sm font-bold text-white bg-gray-900 rounded-full whitespace-nowrap">Toutes</button>
            <button class="px-4 py-1.5 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full whitespace-nowrap hover:bg-yellow-200">En attente (3)</button>
            <button class="px-4 py-1.5 text-sm font-medium text-green-800 bg-green-100 rounded-full whitespace-nowrap hover:bg-green-200">Confirmées</button>
            <button class="px-4 py-1.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-full whitespace-nowrap hover:bg-gray-200">Terminées</button>
        </div>
        <div class="relative w-full sm:w-64">
            <input type="text" placeholder="Rechercher une réservation..." class="w-full text-sm border-gray-300 rounded-md pl-8 pr-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] border">
            <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Articles/Forfaits</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#RES-0142</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">Fatima E. Boukhali</div>
                        <div class="text-xs text-gray-500">+212 6 12 34 56 78</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">Forfait Fiançailles</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div>Du : 15/05/2026</div>
                        <div>Au : 17/05/2026</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1 200 MAD</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-[#d4af37] hover:text-[#b5952f] bg-[#fdfbf7] px-3 py-1 rounded border border-[#d4af37]">Détails</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#RES-0141</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">Keltoum Mellouki</div>
                        <div class="text-xs text-gray-500">keltoum@email.com</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">Caftan Royal Jawhara + Couronne</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div>Du : 20/04/2026</div>
                        <div>Au : 22/04/2026</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1 750 MAD</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Confirmée</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-gray-600 hover:text-gray-900 px-3 py-1 rounded border border-gray-300">Gérer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection