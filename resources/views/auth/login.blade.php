@extends('layouts.app')

@section('title', 'Connexion - IlhamCollection')

@section('content')
<div class="min-h-[70vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-[#faf9f8]">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-serif font-bold text-gray-900">
            Bon retour
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Pas encore de compte? 
            <a href="{{ route('register') }}" class="font-medium text-[#d4af37] hover:text-[#b5952f]">Inscrivez-vous</a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
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

            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input id="email" name="email" type="email" placeholder="votre@email.com"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('email') border-red-500 @enderror">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                    <input id="password" name="password" type="password" placeholder="••••••••"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-[#d4af37] focus:border-[#d4af37] transition @error('password') border-red-500 @enderror">

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-[#d4af37] rounded focus:ring-[#d4af37]">
                        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>
                    <a href="#" class="text-sm text-[#d4af37] hover:text-[#b5952f]">Mot de passe oublié?</a>
                </div>

                <button type="submit"
                    class="w-full bg-[#d4af37] text-white font-semibold py-2 rounded-lg hover:bg-[#b5952f] transition">
                    Se connecter
                </button>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Ou</span>
                    </div>
                </div>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Nouveau chez IlhamCollection?
                    <a href="{{ route('register') }}" class="font-medium text-[#d4af37] hover:text-[#b5952f]">Créer un compte</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
