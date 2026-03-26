@extends('layouts.app')

@section('title', 'Réservation - IlhamCollection')

@section('content')
    <div class="bg-white py-12 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-serif font-bold text-gray-900 sm:text-4xl">Finaliser votre réservation</h1>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Plus que quelques détails avant de valider votre sélection. Notre équipe vous contactera rapidement par WhatsApp pour confirmer la disponibilité.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <form action="#" method="POST" class="flex flex-col lg:flex-row gap-12">
            
            <div class="lg:w-2/3 space-y-10">
                
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#d4af37] text-white font-bold text-sm mr-4">1</span>
                        <h2 class="text-xl font-serif font-bold text-gray-900">Dates de location</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Date de l'événement</label>
                            <input type="date" id="start_date" name="start_date" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] text-gray-600 px-4 py-2 border">
                        </div>
                        <div>
                            <label for="return_date" class="block text-sm font-medium text-gray-700 mb-2">Date de retour prévue</label>
                            <input type="date" id="return_date" name="return_date" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] text-gray-600 px-4 py-2 border">
                        </div>
                    </div>
                    <p class="mt-4 text-xs text-gray-500 flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        La location standard est calculée sur une base de 48h.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#d4af37] text-white font-bold text-sm mr-4">2</span>
                        <h2 class="text-xl font-serif font-bold text-gray-900">Vos informations</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Ex: Fatima" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 border">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Ex: Zahra" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 border">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Numéro WhatsApp <span class="text-red-500">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="+212 6 XX XX XX XX" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 border" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Adresse Email</label>
                            <input type="email" id="email" name="email" placeholder="votre@email.com" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 border">
                        </div>
                        <div class="md:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Ville de l'événement</label>
                            <select id="city" name="city" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 border text-gray-600">
                                <option value="">Sélectionnez une ville</option>
                                <option value="casablanca">Casablanca</option>
                                <option value="rabat">Rabat</option>
                                <option value="marrakech">Marrakech</option>
                                <option value="agadir">Agadir</option>
                                <option value="tanger">Tanger</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Demande particulière ou précision (Tailles, ajustements...)</label>
                            <textarea id="notes" name="notes" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 border"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/3">
                <div class="bg-[#faf9f8] p-8 rounded-2xl border-2 border-[#d4af37] shadow-lg sticky top-36">
                    <h2 class="text-xl font-serif font-bold text-gray-900 mb-6 border-b border-gray-200 pb-4">Résumé de votre sélection</h2>
                    
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0 w-20 h-24 rounded-lg overflow-hidden border border-gray-200">
                            <img src="https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Caftan" class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-sm font-bold text-gray-900">Caftan Royal Jawhara</h3>
                            <p class="text-xs text-gray-500 mt-1">Taille : M</p>
                            <p class="text-sm font-semibold text-[#d4af37] mt-2">1 500 MAD</p>
                        </div>
                    </div>

                    <div class="flex items-center mb-6 border-b border-gray-200 pb-6">
                        <div class="flex-shrink-0 w-20 h-24 rounded-lg overflow-hidden border border-gray-200">
                            <img src="https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Couronne" class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-sm font-bold text-gray-900">Couronne Royale</h3>
                            <p class="text-xs text-gray-500 mt-1">Doré</p>
                            <p class="text-sm font-semibold text-[#d4af37] mt-2">250 MAD</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-8">
                        <span class="text-gray-600 font-medium">Total estimé</span>
                        <span class="text-2xl font-bold text-gray-900">1 750 MAD</span>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="w-full flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-white bg-[#d4af37] hover:bg-[#b5952f] transition shadow-md">
                            Envoyer la demande
                        </button>
                        <p class="mt-4 text-xs text-center text-gray-500">
                            En cliquant sur ce bouton, votre demande sera transmise à notre équipe. Aucun paiement n'est requis à cette étape.
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection