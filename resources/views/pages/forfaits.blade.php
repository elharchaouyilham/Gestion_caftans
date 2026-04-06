@extends('layouts.app')

@section('title', 'Forfaits Mariage - IlhamCollection')

@section('content')
    <div class="bg-white py-20 border-b border-gray-200 text-center">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-serif font-bold text-gray-900">Nos Forfaits Mariage</h1>
            <div class="w-24 h-1 bg-[#d4af37] mx-auto mt-6"></div>
            <p class="mt-6 text-gray-500 text-lg">Des forfaits complets adaptés à chaque cérémonie de votre mariage</p>
        </div>
    </div>

    <div class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 lg:space-y-24">

            @forelse($forfaits as $key => $forfait)
                <div
                    class="flex flex-col {{ $key % 2 == 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }} items-center gap-8 lg:gap-12 {{ $key >= $forfaits->count() - 1 ? 'bg-gradient-to-br from-[#faf9f8] to-[#f5f1eb] p-6 lg:p-12 rounded-3xl' : '' }}">
                    <div class="lg:w-1/2 w-full">
                        <span class="text-[#d4af37] font-bold tracking-wider uppercase text-sm">Forfait
                            {{ $key + 1 }}</span>
                        <h2 class="mt-2 text-2xl sm:text-3xl lg:text-4xl font-serif font-bold text-gray-900">
                            {{ $forfait->nom }}</h2>
                        <div class="mt-4 lg:mt-6 space-y-4">
                            <p class="text-gray-600 leading-relaxed text-sm sm:text-base">{{ $forfait->description }}</p>

                            @if ($forfait->inclusions)
                                <ul class="space-y-2 sm:space-y-3 mt-4 lg:mt-6">
                                    @php
                                        $inclusions = is_array($forfait->inclusions)
                                            ? $forfait->inclusions
                                            : json_decode($forfait->inclusions, true);
                                    @endphp
                                    @foreach ($inclusions as $inclusion)
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-[#d4af37] mr-2 sm:mr-3 flex-shrink-0 mt-0.5"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="text-gray-700 text-sm sm:text-base">{{ $inclusion }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="mt-6 lg:mt-8">
                                <div class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3 lg:mb-4">
                                    {{ number_format($forfait->prix, 0) }} <span
                                        class="text-lg sm:text-xl text-gray-500">MAD</span></div>
                                <a href="{{ route('reservation.create', ['forfait_id' => $forfait->id]) }}"
                                    class="inline-block bg-[#d4af37] text-white px-6 sm:px-8 py-3 rounded-full font-semibold hover:bg-[#b5952f] transition text-sm sm:text-base">Réserver
                                    ce forfait</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 w-full">
                        <div class="relative">
                            <div
                                class="absolute inset-0 bg-[#d4af37] {{ $key % 2 == 0 ? 'translate-x-2 sm:translate-x-4' : '-translate-x-2 sm:-translate-x-4' }} translate-y-2 sm:translate-y-4 rounded-xl -z-10">
                            </div>
                            <img class="rounded-xl shadow-lg w-full h-64 sm:h-80 lg:h-[500px] object-cover"
                                src="{{ $forfait->url ?? 'https://images.unsplash.com/photo-1583391733958-65521b181dbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80' }}"
                                alt="{{ $forfait->nom }}">
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">Aucun forfait disponible actuellement</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gray-900 text-white py-16 mt-20">
        <div class="max-w-3xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-serif font-bold mb-6">Besoin d'un forfait personnalisé?</h2>
            <p class="text-gray-300 text-lg mb-8">Contactez-nous pour créer un forfait sur mesure adapté à vos besoins et
                votre budget.</p>
            <a href="{{ route('contact.create') }}"
                class="inline-block bg-[#d4af37] text-gray-900 px-8 py-3 rounded-full font-semibold hover:bg-white transition">Nous
                contacter</a>
        </div>
    </div>
@endsection
