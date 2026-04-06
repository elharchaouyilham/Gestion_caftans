@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#d4af37] to-[#b8860b] px-6 py-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Mon Profil</h1>
                <p class="text-opacity-90">Gérez vos informations personnelles et vos préférences</p>
            </div>

            <!-- Content -->
            <div class="p-6 md:p-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column: User Info -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-[#d4af37] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informations Personnelles
                        </h2>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nom Complet</label>
                                <p class="text-gray-900 font-medium">{{ Auth::user()->name }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <p class="text-gray-900 font-medium">{{ Auth::user()->email }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                                <p class="text-gray-900 font-medium">{{ Auth::user()->phone ?? 'Non renseigné' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                                <p class="text-gray-900 font-medium">{{ Auth::user()->city ?? 'Non renseignée' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="inline-block h-2 w-2 rounded-full {{ Auth::user()->status === 'active' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    <p class="text-gray-900 font-medium">
                                        {{ Auth::user()->status === 'active' ? 'Actif' : 'Inactif' }}</p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Membre depuis</label>
                                <p class="text-gray-900 font-medium">{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>

                        <button onclick="window.location.href='{{ route('profile.edit') }}'"
                            class="mt-8 w-full bg-[#d4af37] hover:bg-[#b8860b] transition text-white font-semibold py-2 px-4 rounded-lg cursor-pointer">
                            Modifier le Profil
                        </button>
                    </div>

                    <!-- Right Column: Statistics -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 text-[#d4af37] mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            Statistiques
                        </h2>

                        <div class="space-y-4">
                            <!-- Total Reservations -->
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-500 p-4 rounded">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-blue-600 font-medium">Réservations Totales</p>
                                        <p class="text-2xl font-bold text-blue-900">
                                            {{ Auth::user()->reservations()->count() }}</p>
                                    </div>
                                    <svg class="w-10 h-10 text-blue-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Active Reservations -->
                            <div
                                class="bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-500 p-4 rounded">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-green-600 font-medium">Réservations Actives</p>
                                        <p class="text-2xl font-bold text-green-900">
                                            {{ Auth::user()->reservations()->where('status', 'confirmed')->count() }}</p>
                                    </div>
                                    <svg class="w-10 h-10 text-green-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Pending Reservations -->
                            <div
                                class="bg-gradient-to-br from-yellow-50 to-yellow-100 border-l-4 border-yellow-500 p-4 rounded">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-yellow-600 font-medium">Réservations en Attente</p>
                                        <p class="text-2xl font-bold text-yellow-900">
                                            {{ Auth::user()->reservations()->where('status', 'pending')->count() }}</p>
                                    </div>
                                    <svg class="w-10 h-10 text-yellow-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <a href="{{ route('reservations.my') }}"
                                class="block mt-6 bg-gray-900 hover:bg-gray-800 transition text-white text-center font-semibold py-2 px-4 rounded-lg">
                                Voir Toutes les Réservations
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
