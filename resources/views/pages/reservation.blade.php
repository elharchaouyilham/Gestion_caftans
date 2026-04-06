@extends('layouts.app')

@section('title', 'Réservation - IlhamCollection')

@section('content')
    <div class="bg-white py-8 sm:py-12 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-serif font-bold text-gray-900">Finaliser votre réservation</h1>
            <p class="mt-2 sm:mt-4 text-gray-500 max-w-2xl mx-auto text-sm sm:text-base">Plus que quelques détails avant de
                valider votre sélection. Notre équipe vous contactera rapidement pour confirmer la
                disponibilité.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <p class="text-red-700 font-semibold mb-2">Des erreurs ont été détectées :</p>
                <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-green-700 font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('reservation.store') }}" method="POST" class="flex flex-col lg:flex-row gap-6 lg:gap-12">
            @csrf

            <div class="lg:w-2/3 space-y-6 lg:space-y-10">

                <!-- Step 1: Dates de location -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center mb-4 sm:mb-6">
                        <span
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-[#d4af37] text-white font-bold text-sm mr-4 flex-shrink-0">1</span>
                        <h2 class="text-lg sm:text-xl font-serif font-bold text-gray-900">Dates de location</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label for="event_date" class="block text-sm font-medium text-gray-700 mb-2">Date de l'événement
                                <span class="text-red-500">*</span></label>
                            <input type="date" id="event_date" name="event_date"
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] text-gray-600 px-4 py-2 text-base"
                                required>
                        </div>
                        <div>
                            <label for="return_date" class="block text-sm font-medium text-gray-700 mb-2">Date de retour
                                prévue <span class="text-red-500">*</span></label>
                            <input type="date" id="return_date" name="return_date"
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] text-gray-600 px-4 py-2 text-base"
                                required>
                        </div>
                    </div>

                    <div class="mt-4 p-3 sm:p-4 bg-blue-50 rounded-lg flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-xs sm:text-sm text-blue-700"><strong>Durée standard:</strong> La location standard
                            est calculée sur une base de 48h. Des forfaits de durée différente sont disponibles.</p>
                    </div>

                    <div class="mt-4 sm:mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Type d'événement <span
                                class="text-red-500">*</span></label>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="event_type" value="wedding"
                                    class="w-4 h-4 text-[#d4af37] focus:ring-[#d4af37]" required>
                                <span class="ml-2 text-gray-700 text-sm">Mariage</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="event_type" value="engagement"
                                    class="w-4 h-4 text-[#d4af37] focus:ring-[#d4af37]">
                                <span class="ml-2 text-gray-700 text-sm">Fiançailles</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="event_type" value="henna"
                                    class="w-4 h-4 text-[#d4af37] focus:ring-[#d4af37]">
                                <span class="ml-2 text-gray-700 text-sm">Henné</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="event_type" value="evening"
                                    class="w-4 h-4 text-[#d4af37] focus:ring-[#d4af37]">
                                <span class="ml-2 text-gray-700 text-sm">Soirée</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Articles sélectionnés -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center mb-4 sm:mb-6">
                        <span
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-[#d4af37] text-white font-bold text-sm mr-4 flex-shrink-0">2</span>
                        <h2 class="text-lg sm:text-xl font-serif font-bold text-gray-900">Articles sélectionnés</h2>
                    </div>

                    <div class="space-y-3">
                        @forelse($products as $product)
                            <label
                                class="flex items-start p-3 sm:p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                    class="w-5 h-5 text-[#d4af37] mt-1 flex-shrink-0"
                                    @if ($preSelectedProductId && $preSelectedProductId == $product->id) checked @elseif (!$preSelectedProductId && count($products) <= 3) checked @endif>
                                <div class="ml-3 sm:ml-4">
                                    <p class="font-semibold text-gray-900 text-sm">{{ $product->nom }}</p>
                                    <p class="text-xs text-gray-500">{{ $product->description ?? 'Produit haut de gamme' }}
                                        -
                                        {{ number_format($product->prix, 0) }} MAD</p>
                                </div>
                            </label>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <p class="text-gray-500 text-sm">Aucun produit disponible actuellement</p>
                            </div>
                        @endforelse
                    </div>

                    <button type="button" class="mt-4 sm:mt-6 text-[#d4af37] hover:text-[#b5952f] font-semibold text-sm"
                        onclick="document.getElementById('products-modal').style.display='flex'">+
                        Ajouter un article</button>
                </div>

                <!-- Step 3: Informations personnelles -->
                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-gray-100">
                    <div class="flex items-center mb-4 sm:mb-6">
                        <span
                            class="flex items-center justify-center w-8 h-8 rounded-full bg-[#d4af37] text-white font-bold text-sm mr-4 flex-shrink-0">3</span>
                        <h2 class="text-lg sm:text-xl font-serif font-bold text-gray-900">Vos informations</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">Prénom <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="first_name" name="first_name" placeholder="Ex: Fatima"
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 text-base"
                                required>
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Nom <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="last_name" name="last_name" placeholder="Ex: Zahra"
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 text-base"
                                required>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Numéro Téléphone
                                <span class="text-red-500">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="+212 6 XX XX XX XX"
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 text-base"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Adresse
                                Email</label>
                            <input type="email" id="email" name="email" placeholder="votre@email.com"
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 text-base">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Ville de
                                l'événement <span class="text-red-500">*</span></label>
                            <select id="city" name="city"
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 text-gray-600 text-base"
                                required>
                                <option value="">Sélectionnez une ville</option>
                                <option value="casablanca">Casablanca</option>
                                <option value="rabat">Rabat</option>
                                <option value="marrakech">Marrakech</option>
                                <option value="fes">Fès</option>
                                <option value="tangier">Tanger</option>
                                <option value="agadir">Agadir</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Demande
                                particulière ou précisions</label>
                            <textarea id="notes" name="notes" rows="4"
                                placeholder="Tailles spéciales, ajustements, préférences, observations..."
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-[#d4af37] focus:border-[#d4af37] px-4 py-2 text-base"></textarea>
                        </div>
                    </div>

                    <div class="mt-4 sm:mt-6 flex items-start gap-3">
                        <input type="checkbox" id="terms" name="terms"
                            class="w-5 h-5 text-[#d4af37] mt-0.5 flex-shrink-0" required>
                        <label for="terms" class="text-xs sm:text-sm text-gray-600">
                            J'accepte les <a href="#" class="text-[#d4af37] hover:underline">conditions
                                générales</a> et la <a href="#" class="text-[#d4af37] hover:underline">politique de
                                confidentialité</a> <span class="text-red-500">*</span>
                        </label>
                    </div>

                    <button type="submit"
                        class="mt-6 sm:mt-8 w-full bg-[#d4af37] text-white px-8 py-3 sm:py-4 rounded-full font-semibold hover:bg-[#b5952f] transition text-base sm:text-lg">
                        Confirmer ma réservation
                    </button>
                    <p class="text-center text-xs sm:text-sm text-gray-500 mt-3 sm:mt-4">Vous recevrez une confirmation par
                        email</p>
                </div>
            </div>

            <!-- Sidebar: Order Summary -->
            <div class="lg:w-1/3">
                <div
                    class="bg-[#faf9f8] p-6 sm:p-8 rounded-2xl border-2 border-[#d4af37] shadow-lg sticky top-24 lg:top-36">
                    <h2
                        class="text-lg sm:text-xl font-serif font-bold text-gray-900 mb-4 sm:mb-6 border-b border-gray-200 pb-4">
                        Résumé de votre sélection</h2>

                    <!-- Dynamic Items Container -->
                    <div id="selected-items-container">
                        @forelse($products as $product)
                            <div class="product-item flex gap-3 mb-4 sm:mb-6 pb-4 sm:pb-6 border-b border-gray-200"
                                data-product-id="{{ $product->id }}" data-product-price="{{ $product->prix }}"
                                data-product-name="{{ $product->nom }}" style="display: none;">
                                <div
                                    class="flex-shrink-0 w-20 sm:w-24 h-24 sm:h-32 rounded-lg overflow-hidden border border-gray-200">
                                    @if ($product->url)
                                        <img src="{{ $product->url }}" alt="{{ $product->nom }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-xs sm:text-sm font-bold text-gray-900 truncate">{{ $product->nom }}
                                    </h3>
                                    @if ($product->color)
                                        <p class="text-xs text-gray-500 mt-1">{{ $product->color }}</p>
                                    @endif
                                    <p class="text-xs sm:text-sm font-semibold text-[#d4af37] mt-2">
                                        {{ number_format($product->prix, 0) }} MAD</p>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                    <!-- Empty State -->
                    <div id="empty-state" class="text-center py-6">
                        <p class="text-sm text-gray-500">Sélectionnez des articles pour voir le résumé</p>
                    </div>

                    <!-- Price Breakdown -->
                    <div class="space-y-2 sm:space-y-3 border-t border-gray-200 pt-3 sm:pt-4 mt-3 sm:mt-4">
                        <div class="flex justify-between text-xs sm:text-sm">
                            <span class="text-gray-600">Sous-total</span>
                            <span class="font-semibold text-gray-900" id="subtotal">0 MAD</span>
                        </div>
                        <div class="flex justify-between text-xs sm:text-sm">
                            <span class="text-gray-600">Durée (48h)</span>
                            <span class="font-semibold text-gray-900">Incluse</span>
                        </div>
                        <div class="flex justify-between text-xs sm:text-sm">
                            <span class="text-gray-600">Retouches</span>
                            <span class="font-semibold text-gray-900">Incluses</span>
                        </div>
                        <div class="flex justify-between text-xs sm:text-sm">
                            <span class="text-gray-600">Frais de service</span>
                            <span class="font-semibold text-gray-900">0 MAD</span>
                        </div>
                        <div
                            class="flex justify-between text-base sm:text-lg font-bold border-t border-gray-200 pt-2 sm:pt-3 mt-2 sm:mt-3">
                            <span>Total</span>
                            <span class="text-[#d4af37]" id="total">0 MAD</span>
                        </div>
                    </div>

                    <!-- Security & Trust -->
                    <div class="mt-6 p-3 sm:p-4 bg-green-50 rounded-lg">
                        <div class="flex items-start gap-2 sm:gap-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 111.414 1.414L7.414 9l3.293 3.293a1 1 0 01-1.414 1.414l-4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-xs text-green-700"><strong>Sécurisé:</strong> Aucun paiement en ligne requis.
                                Confirmez après accord sur les détails.</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[name="products[]"]');
        const itemsContainer = document.getElementById('selected-items-container');
        const emptyState = document.getElementById('empty-state');
        const subtotalElement = document.getElementById('subtotal');
        const totalElement = document.getElementById('total');

        function updateSummary() {
            let total = 0;
            let hasItems = false;

            // Hide all items first
            document.querySelectorAll('.product-item').forEach(item => {
                item.style.display = 'none';
            });

            // Show selected items and calculate total
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const productId = checkbox.value;
                    const item = document.querySelector(
                        `.product-item[data-product-id="${productId}"]`);
                    if (item) {
                        item.style.display = 'flex';
                        const price = parseFloat(item.getAttribute('data-product-price'));
                        total += price;
                        hasItems = true;
                    }
                }
            });

            // Update display
            if (hasItems) {
                emptyState.style.display = 'none';
                subtotalElement.textContent = total.toLocaleString('fr-FR', {
                    style: 'decimal',
                    minimumFractionDigits: 0
                }) + ' MAD';
                totalElement.textContent = total.toLocaleString('fr-FR', {
                    style: 'decimal',
                    minimumFractionDigits: 0
                }) + ' MAD';
            } else {
                emptyState.style.display = 'block';
                subtotalElement.textContent = '0 MAD';
                totalElement.textContent = '0 MAD';
            }
        }

        // Add event listeners to all checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSummary);
        });

        // Initial update
        updateSummary();
    });
</script>
