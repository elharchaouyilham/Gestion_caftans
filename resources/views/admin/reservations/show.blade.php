@extends('admin.layouts.app')

@section('title', 'Réservation #' . $reservation->id . ' - IlhamCollection Admin')
@section('header_title', 'Détail Réservation #RES-' . str_pad($reservation->id, 4, '0', STR_PAD_LEFT))

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Reservation Overview -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Header with Status -->
                <div
                    class="bg-gradient-to-r from-[#d4af37] to-[#b8860b] px-6 py-6 text-white flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold">#RES-{{ str_pad($reservation->id, 4, '0', STR_PAD_LEFT) }}</h1>
                        <p class="text-sm opacity-90">Créée le {{ $reservation->created_at->format('d/m/Y à H:i') }}</p>
                    </div>
                    <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST"
                        class="inline">
                        @csrf
                        <select name="status" onchange="this.form.submit()"
                            class="text-sm font-semibold rounded-full px-4 py-2 border-0 focus:ring-2 focus:ring-offset-0 cursor-pointer
                        @if ($reservation->status === 'pending') bg-yellow-100 text-yellow-800 focus:ring-yellow-300
                        @elseif($reservation->status === 'confirmed') bg-green-100 text-green-800 focus:ring-green-300
                        @elseif($reservation->status === 'completed') bg-blue-100 text-blue-800 focus:ring-blue-300
                        @else bg-red-100 text-red-800 focus:ring-red-300 @endif">
                            <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>En attente
                            </option>
                            <option value="confirmed" {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmée
                            </option>
                            <option value="completed" {{ $reservation->status === 'completed' ? 'selected' : '' }}>Terminée
                            </option>
                            <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Annulée
                            </option>
                        </select>
                    </form>
                </div>

                <!-- Client Info -->
                <div class="px-6 py-6 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Informations Client</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-1">Nom Complet</p>
                            <p class="text-lg text-gray-900 font-medium">{{ $reservation->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-1">Email</p>
                            <a href="mailto:{{ $reservation->user->email }}"
                                class="text-lg text-[#d4af37] hover:text-[#b5952f] font-medium">{{ $reservation->user->email }}</a>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-1">Téléphone</p>
                            <a href="tel:{{ $reservation->user->phone }}"
                                class="text-lg text-gray-900 font-medium">{{ $reservation->user->phone ?? 'N/A' }}</a>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-1">Ville</p>
                            <p class="text-lg text-gray-900 font-medium">{{ $reservation->user->city ?? 'N/A' }}</p>
                        </div>
                    </div>
                    @if ($reservation->user->phone)
                        <a href="tel:{{ str_replace([' ', '-', '.'], '', $reservation->user->phone) }}"
                            class="mt-4 inline-flex items-center bg-blue-100 text-blue-700 hover:bg-blue-200 transition px-4 py-2 rounded font-semibold">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            Appeler Client
                        </a>
                    @endif
                </div>

                <!-- Reservation Details -->
                <div class="px-6 py-6 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Dates et Durée</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Date de Réservation
                            </p>
                            <p class="text-xl text-gray-900 font-bold">
                                {{ is_string($reservation->date_reservation) ? \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') : $reservation->date_reservation->format('d/m/Y') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Date de Retour</p>
                            <p class="text-xl text-gray-900 font-bold">
                                {{ is_string($reservation->date_retour) ? \Carbon\Carbon::parse($reservation->date_retour)->format('d/m/Y') : $reservation->date_retour->format('d/m/Y') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Durée</p>
                            <p class="text-xl text-[#d4af37] font-bold">{{ $reservation->getDurationInDays() }} jours</p>
                        </div>
                    </div>
                </div>

                <!-- Articles/Products -->
                <div class="px-6 py-6 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Articles Loués</h2>
                    @if ($reservation->products->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th class="text-left px-4 py-3 font-semibold text-gray-700">Produit</th>
                                        <th class="text-right px-4 py-3 font-semibold text-gray-700">Prix Unitaire</th>
                                        <th class="text-right px-4 py-3 font-semibold text-gray-700">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reservation->products as $product)
                                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                                            <td class="px-4 py-3 text-gray-900">
                                                <div class="font-medium">{{ $product->nom }}</div>
                                                <div class="text-xs text-gray-500">Catégorie:
                                                    {{ $product->category->nom ?? 'N/A' }}</div>
                                            </td>
                                            <td class="px-4 py-3 text-right text-gray-900 font-medium">
                                                {{ number_format($product->prix, 0, ',', ' ') }} MAD</td>
                                            <td class="px-4 py-3 text-right text-[#d4af37] font-bold">
                                                {{ number_format($product->prix * $reservation->getDurationInDays(), 0, ',', ' ') }}
                                                MAD</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-3 text-center text-gray-500">Aucun produit
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg text-gray-500">
                            Aucun article pour cette réservation
                        </div>
                    @endif
                </div>

                <!-- Additional Info -->
                <div class="px-6 py-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Informations Supplémentaires</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Type d'Événement
                            </p>
                            <p class="text-gray-900 font-medium capitalize">
                                {{ $reservation->event_type ?? 'Non spécifié' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Notes/Champs
                                spéciaux</p>
                            <p class="text-gray-900 font-medium">{{ $reservation->notes ?? 'Aucune' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar: Payment & Actions -->
        <div class="lg:col-span-1">
            <!-- Total Amount -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <p class="text-sm text-gray-600 font-semibold uppercase">Récapitulatif Financier</p>
                </div>
                <div class="p-6">
                    <div class="mb-4">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-gray-600">Nombre d'articles :</span>
                            <span class="font-semibold text-gray-900">{{ $reservation->products->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-gray-600">Durée :</span>
                            <span class="font-semibold text-gray-900">{{ $reservation->getDurationInDays() }} jours</span>
                        </div>
                        <hr class="my-3">
                        <div class="flex justify-between items-center text-lg">
                            <span class="font-bold text-gray-900">Montant Total :</span>
                            <span
                                class="font-bold text-[#d4af37] text-2xl">{{ number_format($reservation->calculateTotal(), 0, ',', ' ') }}
                                MAD</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <p class="text-sm text-gray-600 font-semibold uppercase">Actions Rapides</p>
                </div>
                <div class="p-6 space-y-3">
                    <a href="mailto:{{ $reservation->user->email }}"
                        class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-center transition">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Email au Client
                    </a>

                    @if ($reservation->user->phone)
                        <a href="tel:{{ str_replace([' ', '-', '.'], '', $reservation->user->phone) }}"
                            class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-center transition">
                            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            Appeler Client
                        </a>
                    @endif

                    <a href="{{ route('admin.reservations.index') }}"
                        class="block w-full bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg text-center transition">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Retour à la List
                    </a>
                </div>
            </div>

            <!-- Timeline -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <p class="text-sm text-gray-600 font-semibold uppercase">Historique</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0">
                                <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">Créée</p>
                                <p class="text-sm text-gray-500">{{ $reservation->created_at->format('d/m/Y \à H:i') }}
                                </p>
                            </div>
                        </div>
                        @if ($reservation->updated_at && $reservation->updated_at->ne($reservation->created_at))
                            <div class="flex gap-4">
                                <div class="flex-shrink-0">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 12a2 2 0 100-4 2 2 0 000 4zM0 12c0 1.657.895 3.11 2.226 3.9.25.149.518.26.8.28V20a2 2 0 100-4m0 0h6.996m-6.996 0a3.001 3.001 0 003-3v-4m-6.996 12h-4a2 2 0 01-2-2v-4a2 2 0 012-2h.99M0 12h15.993m-9.997 0a3 3 0 01-3-3v-4a3 3 0 013-3h6.008a3 3 0 013 3v4a3 3 0 01-3 3z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Dernière modification</p>
                                    <p class="text-sm text-gray-500">
                                        {{ $reservation->updated_at->format('d/m/Y \à H:i') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
