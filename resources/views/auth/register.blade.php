@extends('layouts.app')

@section('title', 'Inscription - IlhamCollection')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-[#faf9f8]">
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <h2 class="mt-6 text-center text-3xl font-serif font-bold text-gray-900">
            Créer un compte
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="bg-white py-8 px-4 shadow-sm border sm:rounded-2xl sm:px-10">

            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <input name="first_name" type="text" placeholder="Prénom"
                        value="{{ old('first_name') }}"
                        class="w-full border p-2 rounded">
                        @error('first_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <input name="last_name" type="text" placeholder="Nom"
                        value="{{ old('last_name') }}"
                        class="w-full border p-2 rounded">
                        @error('last_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <input name="phone" type="text" placeholder="Téléphone"
                    value="{{ old('phone') }}"
                    class="w-full border p-2 rounded">
                    @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <input name="email" type="email" placeholder="Email"
                    value="{{ old('email') }}"
                    class="w-full border p-2 rounded">
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <input name="password" type="password" placeholder="Mot de passe"
                        class="w-full border p-2 rounded">
                        @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <input name="password_confirmation" type="password" placeholder="Confirmer"
                        class="w-full border p-2 rounded">
                    </div>
                </div>

                <div class="flex items-center">
                    <input name="terms" type="checkbox" required>
                    <span class="ml-2 text-sm">J'accepte les conditions</span>
                </div>

                <button type="submit"
                    class="w-full bg-black text-white py-2 rounded hover:bg-yellow-600">
                    Créer un compte
                </button>

            </form>

            @if(session('success'))
                <p class="text-green-500 text-center mt-4">{{ session('success') }}</p>
            @endif

            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-yellow-600">
                    Déjà un compte ?
                </a>
            </div>

        </div>
    </div>
</div>
@endsection