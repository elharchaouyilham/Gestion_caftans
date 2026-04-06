@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Mes Réservations</h1>
            <p class="text-gray-600">Suivi de vos réservations de caftans et accessoires</p>
        </div>

        @if ($reservations->count() > 0)
            <div class="space-y-4">
                @foreach ($reservations as $reservation)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition overflow-hidden">
                        <div class="p-6">
                            <!-- Header with Status -->
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Réservation #RES{{ str_pad($reservation->id, 4, '0', STR_PAD_LEFT) }}
                                    </h3>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ count($reservation->products) }} article(s) -
                                        {{ $reservation->getDurationInDays() }} jour(s)
                                    </p>
                                </div>
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-semibold {{ $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : ($reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $reservation->status === 'confirmed' ? 'Confirmée' : ($reservation->status === 'pending' ? 'En attente' : ucfirst($reservation->status)) }}
                                </span>
                            </div>

                            <!-- Dates and Type -->
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Date d'événement
                                    </p>
                                    <p class="text-gray-900 font-bold">
                                        {{ is_string($reservation->date_reservation) ? \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') : $reservation->date_reservation->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Date de retour
                                    </p>
                                    <p class="text-gray-900 font-bold">
                                        {{ is_string($reservation->date_retour) ? \Carbon\Carbon::parse($reservation->date_retour)->format('d/m/Y') : $reservation->date_retour->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Durée</p>
                                    <p class="text-gray-900 font-bold">{{ $reservation->getDurationInDays() }} jour(s)</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Type d'événement
                                    </p>
                                    <p class="text-gray-900 font-bold capitalize">{{ $reservation->event_type }}</p>
                                </div>
                            </div>

                            <!-- Products Grid -->
                            <div class="mb-6">
                                <h4 class="font-semibold text-gray-900 mb-3">Articles loués</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                    @forelse($reservation->products as $product)
                                        <div class="border border-gray-200 rounded-lg p-3 hover:shadow-md transition">
                                            <div class="flex items-start space-x-3">
                                                @if ($product->url)
                                                    <img src="{{ asset('storage/' . $product->url) }}"
                                                        alt="{{ $product->nom }}" class="w-12 h-12 rounded object-cover">
                                                @else
                                                    <div
                                                        class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center">
                                                        <svg class="w-6 h-6 text-gray-400" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-semibold text-gray-900 truncate">
                                                        {{ $product->nom }}</p>
                                                    <p class="text-xs text-gray-500">{{ $product->category->nom ?? 'N/A' }}
                                                    </p>
                                                    <p class="text-sm font-bold text-[#d4af37] mt-1">
                                                        {{ number_format($product->prix * $reservation->getDurationInDays(), 0, ',', ' ') }}
                                                        DH</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-gray-500 text-sm col-span-3">Aucun article</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Client Info -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 pb-6 border-b border-gray-200">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Nom</p>
                                    <p class="text-gray-900 font-medium">{{ $reservation->client_name }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Téléphone</p>
                                    <p class="text-gray-900 font-medium">{{ $reservation->client_phone }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Ville</p>
                                    <p class="text-gray-900 font-medium">{{ $reservation->client_city }}</p>
                                </div>
                            </div>

                            <!-- Special Requests & Total -->
                            @if ($reservation->special_requests)
                                <div class="mb-6 p-3 bg-blue-50 rounded border-l-4 border-blue-300">
                                    <p class="text-xs text-blue-600 uppercase tracking-wide font-semibold mb-1">Demandes
                                        spéciales</p>
                                    <p class="text-blue-900 text-sm">{{ $reservation->special_requests }}</p>
                                </div>
                            @endif

                            <!-- Total Amount -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <div>
                                    @if ($reservation->total_amount)
                                        <p class="text-sm text-gray-600 mb-1">Montant total</p>
                                        <p class="text-2xl font-bold text-[#d4af37]">
                                            {{ number_format($reservation->calculateTotal(), 0, ',', ' ') }} DH
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($reservations->hasPages())
                <div class="mt-8">
                    {{ $reservations->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucune réservation</h3>
                <p class="text-gray-600 mb-6">Vous n'avez pas encore de réservation. Commencez par explorer notre
                    collection.</p>
                <a href="{{ route('caftans') }}"
                    class="inline-block bg-[#d4af37] hover:bg-[#b8860b] transition text-white font-semibold py-2 px-6 rounded-lg">
                    Voir la Collection
                </a>
            </div>
        @endif
    </div>
@endsection
