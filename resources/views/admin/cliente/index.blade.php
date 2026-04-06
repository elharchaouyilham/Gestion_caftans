@extends('admin.layouts.app')

@section('title', 'Clientes - IlhamCollection Admin')
@section('header_title', 'Base de données Clientes')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-white">
            <h3 class="text-lg font-bold text-gray-900">Liste des Clientes</h3>
            <form action="{{ route('admin.cliente.index') }}" method="GET" class="relative w-64">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Rechercher (Nom, Tel, Email)..."
                    class="w-full text-sm border-gray-300 rounded-md pl-8 pr-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] border">
                <svg class="w-4 h-4 text-gray-400 absolute left-2.5 top-2.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom
                            complet</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Réservations</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière
                            activité</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($clients as $client)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 flex-shrink-0 bg-[#fdfbf7] border border-[#d4af37] rounded-full flex items-center justify-center text-[#d4af37] font-bold font-serif text-sm">
                                        {{ strtoupper(substr($client->name, 0, 2)) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $client->name }}</div>
                                        <div class="text-xs text-gray-500">Inscrit(e) le
                                            {{ $client->created_at->format('d M Y') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $client->phone ?? 'N/A' }}</div>
                                <div class="text-xs text-gray-500">{{ $client->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $client->city ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-bold text-gray-900">
                                {{ $client->reservations()->count() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if ($client->reservations()->latest()->first())
                                    {{ $client->reservations()->latest()->first()->updated_at->diffForHumans() }}
                                @else
                                    Aucune
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <!-- No actions -->
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5lass="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2zm0 0h6v-2a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                                </svg>
                                <p>Aucun client enregistré</p>
        </div>
        </td>
        </tr>
        @endforelse
        </tbody>
        </table>
    </div>

    <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
        <div class="text-sm text-gray-700">Total de <span class="font-medium">{{ $clients->count() }}</span> client(s)
            enregistré(s)</div>
        @if ($clients->hasPages())
            <div class="flex space-x-2">
                @if ($clients->onFirstPage())
                    <span
                        class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-500 cursor-not-allowed">Précédent</span>
                @else
                    <a href="{{ $clients->previousPageUrl() }}"
                        class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Précédent</a>
                @endif
                <a href="{{ $clients->nextPageUrl() }}"
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">Suivant</a>
            </div>
        @endif
    </div>
    </div>
@endsection
