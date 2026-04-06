@extends('admin.layouts.app')

@section('title', 'Réservations - IlhamCollection Admin')
@section('header_title', 'Gestion des Réservations')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div
            class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4 bg-white">
            <div class="flex space-x-2 overflow-x-auto w-full sm:w-auto pb-2 sm:pb-0">
                <a href="{{ route('admin.reservations.index') }}"
                    class="px-4 py-1.5 text-sm font-bold text-white bg-gray-900 rounded-full whitespace-nowrap hover:bg-gray-800 transition">Toutes</a>
                <a href="{{ route('admin.reservations.index', ['status' => 'pending']) }}"
                    class="px-4 py-1.5 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full whitespace-nowrap hover:bg-yellow-200 transition">En
                    attente ({{ $stats['pending'] }})</a>
                <a href="{{ route('admin.reservations.index', ['status' => 'confirmed']) }}"
                    class="px-4 py-1.5 text-sm font-medium text-green-800 bg-green-100 rounded-full whitespace-nowrap hover:bg-green-200 transition">Confirmées
                    ({{ $stats['confirmed'] }})</a>
                <a href="{{ route('admin.reservations.index', ['status' => 'completed']) }}"
                    class="px-4 py-1.5 text-sm font-medium text-blue-800 bg-blue-100 rounded-full whitespace-nowrap hover:bg-blue-200 transition">Terminées
                    ({{ $stats['completed'] }})</a>
            </div>
            <form action="{{ route('admin.reservations.index') }}" method="GET" class="relative w-full sm:w-64">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Rechercher une réservation..."
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Articles/Forfaits</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($reservations as $reservation)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">
                                #RES-{{ str_pad($reservation->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $reservation->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $reservation->user->phone ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <div class="flex flex-wrap gap-1">
                                    @forelse($reservation->products as $product)
                                        <span
                                            class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">{{ $product->nom }}</span>
                                    @empty
                                        <span class="text-gray-400">Aucun produit</span>
                                    @endforelse
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div>Du :
                                    {{ is_string($reservation->date_reservation) ? \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') : $reservation->date_reservation->format('d/m/Y') }}
                                </div>
                                <div>Au :
                                    {{ is_string($reservation->date_retour) ? \Carbon\Carbon::parse($reservation->date_retour)->format('d/m/Y') : $reservation->date_retour->format('d/m/Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                {{ number_format($reservation->calculateTotal(), 0, ',', ' ') }} MAD</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()"
                                        class="text-xs font-semibold rounded-full px-3 py-1 border-0 focus:ring-2 focus:ring-offset-0
                                @if ($reservation->status === 'pending') bg-yellow-100 text-yellow-800 focus:ring-yellow-300
                                @elseif($reservation->status === 'confirmed') bg-green-100 text-green-800 focus:ring-green-300
                                @elseif($reservation->status === 'completed') bg-blue-100 text-blue-800 focus:ring-blue-300
                                @else bg-red-100 text-red-800 focus:ring-red-300 @endif">
                                        <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>
                                            En attente</option>
                                        <option value="confirmed"
                                            {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                                        <option value="completed"
                                            {{ $reservation->status === 'completed' ? 'selected' : '' }}>Terminée</option>
                                        <option value="cancelled"
                                            {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Annulée</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.reservations.show', $reservation->id) }}"
                                    class="text-[#d4af37] hover:text-[#b5952f] bg-[#fdfbf7] px-3 py-1 rounded border border-[#d4af37]">Détails</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                    <p>Aucune réservation trouvée</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white px-4 py-3 border-t border-gray-200 flex items-center justify-between sm:px-6">
            <div class="text-sm text-gray-700">Affichage de <span
                    class="font-medium">{{ $reservations->firstItem() ?? 0 }}</span> à <span
                    class="font-medium">{{ $reservations->lastItem() ?? 0 }}</span> sur <span
                    class="font-medium">{{ $reservations->total() }}</span> réservations</div>
            <div>
                {{ $reservations->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
