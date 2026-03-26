
@extends('layouts.app')

@section('title', 'Catalogue Caftans - IlhamCollection')

@section('content')
    <div class="bg-white py-12 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-serif font-bold text-gray-900">Notre Collection de Caftans</h1>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Trouvez la tenue parfaite pour votre cérémonie.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row gap-8">
            <aside class="w-full md:w-64 flex-shrink-0">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-serif font-bold text-gray-900 mb-4 border-b pb-2">Filtres</h3>
                    </div>
            </aside>

            <div class="flex-1">
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <img class="h-72 w-full object-cover" src="https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Caftan">
                        <div class="p-5">
                            <h3 class="text-lg font-serif font-semibold text-gray-900">Caftan Royal Jawhara</h3>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900">1500 MAD</span>
                                <a href="/reservation" class="text-sm font-semibold text-[#d4af37]">Réserver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
