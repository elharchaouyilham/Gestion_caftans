@extends('layouts.app')

@section('title', 'Inscription - IlhamCollection')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-[#faf9f8]">
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <h2 class="mt-6 text-center text-3xl font-serif font-bold text-gray-900">
            Créer un compte
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Déjà inscrit? 
            <a href="{{ route('login') }}" class="font-medium text-[#d4af37] hover:text-[#b5952f]">Se connecter</a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="bg-white py-8 px-4 shadow-sm border border-gray-100 sm:rounded-2xl sm:px-10">
            
            @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <ul class="text-sm text-red-700">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="space-y-6" action="{{ route('register.post') }}" method="POST">
                @csrf
                
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                        <input id="first_name" name="first_name" type="text" placeholder="Fatima"
                        value="{{ old('first_name') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('first_name') border-red-500 @enderror">
                        @error('first_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                        <input id="last_name" name="last_name" type="text" placeholder="Zahra"
                        value="{{ old('last_name') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('last_name') border-red-500 @enderror">
                        @error('last_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input id="email" name="email" type="email" placeholder="votre@email.com"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('email') border-red-500 @enderror">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                    <input id="phone" name="phone" type="tel" placeholder="+212 6 XX XX XX XX"
                    value="{{ old('phone') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('phone') border-red-500 @enderror">
                    @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                        <input id="password" name="password" type="password" placeholder="••••••••"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('password') border-red-500 @enderror">
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmer MDP</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition">
                    </div>
                </div>

                <div class="flex items-start">
                    <input type="checkbox" id="terms" name="terms" class="w-4 h-4 text-[#d4af37] rounded focus:ring-[#d4af37] mt-1" required>
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        J'accepte les <a href="#" class="text-[#d4af37] hover:underline">conditions d'utilisation</a> et la <a href="#" class="text-[#d4af37] hover:underline">politique de confidentialité</a>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-[#d4af37] text-white font-semibold py-2 rounded-lg hover:bg-[#b5952f] transition">
                    Créer mon compte
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Déjà inscrit? 
                <a href="{{ route('login') }}" class="font-medium text-[#d4af37] hover:text-[#b5952f]">Se connecter ici</a>
            </p>
        </div>
    </div>
</div>
@endsection
