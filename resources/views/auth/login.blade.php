@extends('layouts.app')

@section('title', 'Connexion - IlhamCollection')

@section('content')
<div class="min-h-[70vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-[#faf9f8]">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-serif font-bold text-gray-900">
            Bon retour
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-sm border sm:rounded-2xl sm:px-10">

            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                
                <div>
                    <input name="email" type="email" placeholder="Email"
                    value="{{ old('email') }}"
                    class="w-full border p-2 rounded">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input name="password" type="password" placeholder="Mot de passe"
                    class="w-full border p-2 rounded">

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember">
                    <span class="ml-2 text-sm">Se souvenir de moi</span>
                </div>

                <button type="submit"
                    class="w-full bg-black text-white py-2 rounded hover:bg-yellow-600">
                    Se connecter
                </button>

            </form>

            @if(session('error'))
                <p class="text-red-500 text-center mt-4">{{ session('error') }}</p>
            @endif

            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-yellow-600">
                    Créer un compte
                </a>
            </div>

        </div>
    </div>
</div>
@endsection