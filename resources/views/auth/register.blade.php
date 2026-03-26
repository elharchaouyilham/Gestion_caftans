@extends('layouts.app')

@section('title', 'Inscription - IlhamCollection')

@section('content')
<div class="min-h-[80vh] flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-[#faf9f8]">
    <div class="sm:mx-auto sm:w-full sm:max-w-xl">
        <h2 class="mt-6 text-center text-3xl font-serif font-bold text-gray-900">
            Créer un compte
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Rejoignez-nous pour faciliter vos réservations et gérer vos essayages.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="bg-white py-8 px-4 shadow-sm border border-gray-100 sm:rounded-2xl sm:px-10">
            <form class="space-y-6" action="#" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                        <div class="mt-1">
                            <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm transition">
                        </div>
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <div class="mt-1">
                            <input id="last_name" name="last_name" type="text" autocomplete="family-name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm transition">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de téléphone (WhatsApp)</label>
                    <div class="mt-1">
                        <input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="+212 6 XX XX XX XX" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm transition">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm transition">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-[#d4af37] focus:border-[#d4af37] sm:text-sm transition">
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-[#d4af37] focus:ring-[#d4af37] border-gray-300 rounded cursor-pointer">
                    <label for="terms" class="ml-2 block text-sm text-gray-900 cursor-pointer">
                        J'accepte les <a href="#" class="text-[#d4af37] hover:underline">conditions générales</a> et la politique de confidentialité.
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-[#d4af37] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#d4af37] transition duration-300">
                        Créer mon compte
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm">
                <span class="text-gray-500">Vous avez déjà un compte ?</span>
                <a href="/login" class="font-medium text-[#d4af37] hover:text-[#b5952f] transition ml-1">
                    Connectez-vous
                </a>
            </div>
        </div>
    </div>
</div>
@endsection