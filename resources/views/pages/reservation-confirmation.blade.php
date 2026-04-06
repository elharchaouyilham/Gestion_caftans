@extends('layouts.app')

@section('title', 'Confirmation de Réservation - IlhamCollection')

@section('content')
    <div class="min-h-[70vh] flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-[#faf9f8]">
        <div class="text-center max-w-2xl">
            <!-- Success Icon -->
            <div class="mb-6 flex justify-center">
                <div class="flex items-center justify-center w-20 h-20 rounded-full bg-green-100">
                    <svg class="w-12 h-12 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-gray-900 mb-4">
                Réservation Confirmée!
            </h1>

            <p class="text-gray-600 text-base sm:text-lg mb-8 leading-relaxed">
                Merci pour votre confiance! Nous avons enregistré votre réservation avec succès. <br>
                <strong class="text-gray-900">Notre équipe vous contactera bientôt</strong> pour finaliser les
                détails et confirmer la disponibilité.
            </p>

            <!-- What to expect -->
            <div class="bg-white rounded-lg p-6 sm:p-8 border border-gray-200 shadow-sm mb-8">
                <h2 class="text-xl font-serif font-bold text-gray-900 mb-6">Ce qui se passe ensuite</h2>

                <div class="space-y-4 text-left">
                    <div class="flex items-start">
                        <div
                            class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-[#d4af37] text-white font-bold">
                            1
                        </div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-900">Confirmation</h3>
                            <p class="text-gray-600 text-sm mt-1">Nous vous enverrons un message pour confirmer les
                                détails de votre réservation.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-[#d4af37] text-white font-bold">
                            2
                        </div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-900">Vérification de disponibilité</h3>
                            <p class="text-gray-600 text-sm mt-1">Nous vérifierons la disponibilité de vos articles pour les
                                dates sélectionnées.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div
                            class="flex-shrink-0 flex items-center justify-center h-8 w-8 rounded-full bg-[#d4af37] text-white font-bold">
                            3
                        </div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-900">Arrangements finaux</h3>
                            <p class="text-gray-600 text-sm mt-1">Nous discuterons des détails de paiement et de la
                                livraison
                                avec vous.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="{{ route('home') }}"
                    class="px-8 py-3 bg-[#d4af37] text-white rounded-full font-semibold hover:bg-[#b5952f] transition text-center">
                    Retour à l'accueil
                </a>
                <a href="{{ route('reservations.my') }}"
                    class="px-8 py-3 border-2 border-[#d4af37] text-[#d4af37] rounded-full font-semibold hover:bg-[#faf9f8] transition text-center">
                    Mes réservations
                </a>
            </div>

            <!-- Contact Info -->
            <div class="bg-blue-50 rounded-lg p-4 sm:p-6 border border-blue-200">
                <h3 class="font-semibold text-blue-900 mb-3">Besoin d'aide?</h3>
                <p class="text-blue-700 text-sm mb-3">Si vous n'avez pas reçu de message dans les 24 heures,
                    veuillez nous contacter:</p>
                <p class="text-blue-900 font-semibold">+212 (0) 5 XX XX XX XX</p>
                <p class="text-blue-600 text-sm mt-2">Lun-Sam: 10h-20h</p>
            </div>
        </div>
    </div>
@endsection
