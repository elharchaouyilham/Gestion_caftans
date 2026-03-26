@extends('layouts.app')

@section('title', 'Accueil - IlhamCollection')

@section('content')
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-16 lg:pt-24">
                <div class="sm:text-center lg:text-left px-4 sm:px-6 lg:px-8 mt-10">
                    <h1 class="text-4xl tracking-tight font-serif font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">L'élégance pour votre</span>
                        <span class="block text-[#d4af37] mt-2">jour inoubliable</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Découvrez notre collection exclusive de caftans et accessoires de mariage. Louez la tenue parfaite pour vos cérémonies avec sérénité et raffinement.
                    </p>
                    <div class="mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-full shadow">
                            <a href="/reservation" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-[#d4af37] hover:bg-[#b5952f] transition">Réserver maintenant</a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="/caftans" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-[#d4af37] bg-[#fdfbf7] hover:bg-gray-50 transition">Voir le catalogue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Mariée élégante">
        </div>
    </div>
@endsection