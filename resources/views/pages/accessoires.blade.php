@extends('layouts.app')

@section('title', 'Accessoires - IlhamCollection')

@section('content')
    <div class="bg-white py-12 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-serif font-bold text-gray-900">Accessoires de la Mariée</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
             <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="bg-gray-50 flex items-center justify-center h-64 overflow-hidden">
                    <img class="max-h-full w-full object-cover" src="https://images.unsplash.com/photo-1599643478514-4a4e03105151?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Couronne">
                </div>
                <div class="p-5">
                    <h3 class="mt-1 text-lg font-serif font-semibold text-gray-900">Couronne Royale</h3>
                    <div class="mt-4 flex justify-between">
                        <span class="text-lg font-bold">250 MAD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection