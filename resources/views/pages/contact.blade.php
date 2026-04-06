@extends('layouts.app')

@section('title', 'Contact - IlhamCollection')

@section('content')
    <div class="bg-gradient-to-b from-white to-[#faf9f8] py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900 mb-4">Contactez-nous</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Des questions? Nous sommes là pour vous aider. N'hésitez
                    pas à nous contacter.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Contact Info Cards -->
                <div class="bg-white p-8 rounded-lg shadow-md border-t-4 border-[#d4af37] text-center">
                    <svg class="w-12 h-12 text-[#d4af37] mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <h3 class="font-semibold text-gray-900 mb-2">Email</h3>
                    <p class="text-gray-600">contact@ilhamcollection.com</p>
                    <p class="text-sm text-gray-500 mt-2">Réponse sous 24h</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md border-t-4 border-[#d4af37] text-center">
                    <svg class="w-12 h-12 text-[#d4af37] mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    <h3 class="font-semibold text-gray-900 mb-2">Téléphone</h3>
                    <p class="text-gray-600">+212 (0) 5 XX XX XX XX</p>
                    <p class="text-sm text-gray-500 mt-2">Lun-Sam: 10h-20h</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md border-t-4 border-[#d4af37] text-center">
                    <svg class="w-12 h-12 text-[#d4af37] mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <h3 class="font-semibold text-gray-900 mb-2">Adresse</h3>
                    <p class="text-gray-600">Casablanca, Maroc</p>
                    <p class="text-sm text-gray-500 mt-2">Visite sur RDV</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 border border-gray-100">
                <h2 class="text-2xl font-serif font-bold text-gray-900 mb-8">Envoyez-nous un message</h2>

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

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Nom Complet *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-transparent outline-none transition"
                            placeholder="Votre nom">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-transparent outline-none transition"
                            placeholder="votre@email.com">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-900 mb-2">Téléphone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-transparent outline-none transition"
                            placeholder="+212 ...">
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-900 mb-2">Sujet *</label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-transparent outline-none transition">
                            <option value="">Sélectionnez un sujet</option>
                            <option value="reservation" {{ old('subject') == 'reservation' ? 'selected' : '' }}>Question sur
                                réservation</option>
                            <option value="catallog" {{ old('subject') == 'catallog' ? 'selected' : '' }}>Question sur
                                catalogue</option>
                            <option value="availability" {{ old('subject') == 'availability' ? 'selected' : '' }}>
                                Disponibilité</option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-900 mb-2">Message *</label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-transparent outline-none transition resize-none"
                            placeholder="Votre message...">{{ old('message') }}</textarea>
                    </div>

                    <!-- Checkbox -->
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" name="terms" value="1" required class="mt-1">
                        <label for="terms" class="ml-3 text-sm text-gray-600">
                            J'accepte que mes données soient utilisées pour répondre à ma demande *
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-[#d4af37] hover:bg-[#b8860b] transition text-white font-bold py-3 px-4 rounded-lg text-lg">
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
