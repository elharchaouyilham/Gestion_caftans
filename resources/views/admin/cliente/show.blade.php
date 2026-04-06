@extends('admin.layouts.app')

@section('title', $client->name . ' - IlhamCollection Admin')
@section('header_title', 'Profil Client: ' . $client->name)

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column: Client Info -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-[#d4af37] to-[#b8860b] px-6 py-8 text-white">
                    <div class="flex items-center space-x-4">
                        <div
                            class="h-16 w-16 flex-shrink-0 bg-white rounded-full flex items-center justify-center text-[#d4af37] font-bold font-serif text-2xl">
                            {{ strtoupper(substr($client->name, 0, 2)) }}
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">{{ $client->name }}</h1>
                            <p class="text-sm opacity-90">Inscrit(e) le {{ $client->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Client Details -->
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Email</label>
                            <p class="text-lg text-gray-900 font-medium">{{ $client->email }}</p>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Téléphone</label>
                            <p class="text-lg text-gray-900 font-medium">{{ $client->phone ?? 'Non renseigné' }}</p>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Ville</label>
                            <p class="text-lg text-gray-900 font-medium">{{ $client->city ?? 'Non renseignée' }}</p>
                        </div>
                        <div>
                            <label
                                class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Statut</label>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="inline-block h-3 w-3 rounded-full {{ $client->status === 'active' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                <p class="text-lg text-gray-900 font-medium">
                                    {{ $client->status === 'active' ? 'Actif' : 'Inactif' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <!-- Statistics -->
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg border border-blue-200">
                            <p class="text-sm text-blue-600 font-medium">Total Réservations</p>
                            <p class="text-2xl font-bold text-blue-900 mt-1">{{ $client->reservations()->count() }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-lg border border-green-200">
                            <p class="text-sm text-green-600 font-medium">Confirmées</p>
                            <p class="text-2xl font-bold text-green-900 mt-1">
                                {{ $client->reservations()->where('status', 'confirmed')->count() }}</p>
                        </div>
                        <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-4 rounded-lg border border-yellow-200">
                            <p class="text-sm text-yellow-600 font-medium">En Attente</p>
                            <p class="text-2xl font-bold text-yellow-900 mt-1">
                                {{ $client->reservations()->where('status', 'pending')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservations -->
            <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-bold text-gray-900">Réservations ({{ $client->reservations()->count() }})</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Articles</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dates</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Montant</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Statut</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($reservations as $reservation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">
                                        #{{ $reservation->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <div class="flex flex-wrap gap-1">
                                            @forelse($reservation->products as $product)
                                                <span
                                                    class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">{{ $product->nom }}</span>
                                            @empty
                                                <span class="text-gray-400">N/A</span>
                                            @endforelse
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ is_string($reservation->date_reservation) ? \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') : $reservation->date_reservation->format('d/m/Y') }}
                                        -
                                        {{ is_string($reservation->date_retour) ? \Carbon\Carbon::parse($reservation->date_retour)->format('d/m/Y') : $reservation->date_retour->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                        {{ number_format($reservation->calculateTotal(), 0, ',', ' ') }} MAD
                                    </td>
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
                                                <option value="pending"
                                                    {{ $reservation->status === 'pending' ? 'selected' : '' }}>En attente
                                                </option>
                                                <option value="confirmed"
                                                    {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmée
                                                </option>
                                                <option value="completed"
                                                    {{ $reservation->status === 'completed' ? 'selected' : '' }}>Terminée
                                                </option>
                                                <option value="cancelled"
                                                    {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Annulée
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.reservations.show', $reservation->id) }}"
                                            class="text-[#d4af37] hover:text-[#b5952f]">Détails</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        Ce client n'a pas de réservations
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Column: Status Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <!-- Status Badge -->
                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-xs font-semibold text-gray-500 uppercase mb-2">Informations Supplémentaires</p>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Inscrit(e) depuis :</span>
                            <span class="font-semibold text-gray-900">{{ $client->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dernière mise à jour :</span>
                            <span class="font-semibold text-gray-900">{{ $client->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dépense Totale :</span>
                            <span class="font-semibold text-[#d4af37]">
                                {{ number_format($client->reservations()->sum(function ($r) {return $r->calculateTotal();}),0,',',' ') }}
                                MAD
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
