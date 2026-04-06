@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#d4af37] to-[#b8860b] px-6 py-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Modifier Mon Profil</h1>
                <p class="text-opacity-90">Mettez à jour vos informations personnelles</p>
            </div>

            <!-- Content -->
            <div class="p-6 md:p-12">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded">
                        <h3 class="text-red-800 font-semibold mb-2">Erreurs lors de la modification :</h3>
                        <ul class="text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded">
                        <p class="text-green-700 font-semibold">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Nom Complet -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nom Complet</label>
                        <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}"
                            required
                            class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-[#d4af37] outline-none transition"
                            placeholder="Votre nom complet">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email (non modifiable pour la sécurité) -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" value="{{ Auth::user()->email }}" disabled
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed outline-none"
                            placeholder="Votre email">
                        <p class="mt-1 text-xs text-gray-500">L'email ne peut être modifié que par l'administrateur pour des
                            raisons de sécurité.</p>
                    </div>

                    <!-- Téléphone -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Téléphone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                            class="w-full px-4 py-2 border @error('phone') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-[#d4af37] outline-none transition"
                            placeholder="+212 6 XX XX XX XX">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Ville -->
                    <div>
                        <label for="city" class="block text-sm font-semibold text-gray-700 mb-2">Ville</label>
                        <select id="city" name="city"
                            class="w-full px-4 py-2 border @error('city') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-[#d4af37] focus:border-[#d4af37] outline-none transition">
                            <option value="">-- Sélectionner une ville --</option>
                            <option value="Casablanca"
                                {{ old('city', Auth::user()->city) === 'Casablanca' ? 'selected' : '' }}>Casablanca</option>
                            <option value="Rabat" {{ old('city', Auth::user()->city) === 'Rabat' ? 'selected' : '' }}>Rabat
                            </option>
                            <option value="Fès" {{ old('city', Auth::user()->city) === 'Fès' ? 'selected' : '' }}>Fès
                            </option>
                            <option value="Tanger" {{ old('city', Auth::user()->city) === 'Tanger' ? 'selected' : '' }}>
                                Tanger</option>
                            <option value="Marrakech"
                                {{ old('city', Auth::user()->city) === 'Marrakech' ? 'selected' : '' }}>Marrakech</option>
                            <option value="Agadir" {{ old('city', Auth::user()->city) === 'Agadir' ? 'selected' : '' }}>
                                Agadir</option>
                            <option value="Meknès" {{ old('city', Auth::user()->city) === 'Meknès' ? 'selected' : '' }}>
                                Meknès</option>
                            <option value="Salé" {{ old('city', Auth::user()->city) === 'Salé' ? 'selected' : '' }}>Salé
                            </option>
                            <option value="Fès el Bali"
                                {{ old('city', Auth::user()->city) === 'Fès el Bali' ? 'selected' : '' }}>Fès el Bali
                            </option>
                            <option value="Oujda" {{ old('city', Auth::user()->city) === 'Oujda' ? 'selected' : '' }}>
                                Oujda</option>
                            <option value="Autre" {{ old('city', Auth::user()->city) === 'Autre' ? 'selected' : '' }}>
                                Autre</option>
                        </select>
                        @error('city')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Division avec deux colonnes pour les boutons -->
                    <hr class="my-8">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('profile') }}"
                            class="text-center bg-gray-500 hover:bg-gray-600 transition text-white font-semibold py-3 px-4 rounded-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Annuler
                        </a>
                        <button type="submit"
                            class="bg-[#d4af37] hover:bg-[#b8860b] transition text-white font-semibold py-3 px-4 rounded-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Enregistrer les Modifications
                        </button>
                    </div>

                    <!-- Information supplémentaire -->
                    <div class="mt-8 p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                        <p class="text-blue-700 text-sm">
                            <strong>Note :</strong> Les modifications apportées à votre profil prendront effet
                            immédiatement.
                            Pour des raisons de sécurité, vous ne pouvez pas modifier votre adresse email. Contactez
                            l'administrateur si vous avez besoin de changer votre email.
                        </p>
                    </div>
                </form>

                <!-- Retour au Profil -->
                <div class="mt-12 text-center">
                    <a href="{{ route('profile') }}"
                        class="text-[#d4af37] hover:text-[#b8860b] font-semibold inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Retour au Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
