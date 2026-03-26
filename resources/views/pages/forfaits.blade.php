@extends('layouts.app')

@section('title', 'Forfaits Mariage - IlhamCollection')

@section('content')
    <div class="bg-white py-20 border-b border-gray-200 text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-serif font-bold text-gray-900 sm:text-5xl">Nos Forfaits Mariage</h1>
            <div class="w-24 h-1 bg-[#d4af37] mx-auto mt-6 mb-6"></div>
        </div>
    </div>

    <div class="py-16 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <span class="text-[#d4af37] font-bold tracking-wider uppercase text-sm">Le premier pas</span>
                    <h2 class="mt-2 text-3xl font-serif font-bold text-gray-900">Forfait Fiançailles</h2>
                    </div>
                <div class="lg:w-1/2 w-full">
                    <div class="relative">
                        <div class="absolute inset-0 bg-[#d4af37] translate-x-4 translate-y-4 rounded-xl -z-10"></div>
                        <img class="rounded-xl shadow-lg w-full h-[500px] object-cover" src="https://images.unsplash.com/photo-1600521605632-15f184e622b7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Fiançailles">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection