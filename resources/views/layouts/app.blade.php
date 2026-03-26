<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'IlhamCollection - Location de Caftans')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body class="bg-[#faf9f8] text-gray-800 flex flex-col min-h-screen">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-28">

                <div class="hidden lg:flex items-center space-x-8 w-1/3">
                    <a href="/caftans" class="text-sm font-medium text-gray-800 hover:text-[#d4af37] uppercase tracking-wider transition">Caftans</a>
                    <a href="/accessoires" class="text-sm font-medium text-gray-500 hover:text-[#d4af37] uppercase tracking-wider transition">Accessoires</a>
                    <a href="/forfaits" class="text-sm font-medium text-gray-500 hover:text-[#d4af37] uppercase tracking-wider transition">Forfaits</a>
                </div>

                <div class="flex-shrink-0 w-1/3 flex justify-center">
                    <a href="/" class="flex flex-col items-center justify-center group text-center">
                        <span class="flex items-center justify-center w-10 h-10 border border-[#d4af37] rounded-full mb-1.5 group-hover:bg-[#d4af37] transition-colors duration-300">
                            <span class="font-serif text-lg text-[#d4af37] group-hover:text-white leading-none">I<span class="text-xs">C</span></span>
                        </span>
                        <span class="text-2xl font-serif font-bold tracking-widest text-gray-900 uppercase leading-none">Ilham</span>
                        <span class="text-[0.65rem] tracking-[0.4em] text-gray-500 uppercase mt-1">Collection</span>
                    </a>
                </div>

                <div class="hidden lg:flex items-center justify-end w-1/3 space-x-6">
                    <a href="/login" class="text-gray-400 hover:text-[#d4af37] transition" title="Mon Compte">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </a>

                    <a href="/reservation" class="bg-gray-900 text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-[#d4af37] transition shadow-md">
                        Réserver
                    </a>
                </div>

                <div class="flex items-center lg:hidden w-1/3 justify-end">
                    <button class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-[#1a1a1a] text-white pt-16 pb-8 border-t-4 border-[#d4af37]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">

                <div class="md:col-span-2 pr-0 md:pr-12">
                    <a href="/" class="flex items-center group mb-6">
                        <span class="flex items-center justify-center w-8 h-8 border border-[#d4af37] rounded-full mr-3">
                            <span class="font-serif text-sm text-[#d4af37] leading-none">I<span class="text-[0.6rem]">C</span></span>
                        </span>
                        <div class="flex flex-col">
                            <span class="text-xl font-serif font-bold tracking-widest text-white uppercase leading-none">Ilham</span>
                            <span class="text-[0.55rem] tracking-[0.4em] text-gray-400 uppercase mt-1">Collection</span>
                        </div>
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        L'adresse incontournable pour la location de caftans et accessoires de mariage. Célébrez vos plus beaux moments avec élégance, tradition et sérénité.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-5">La Collection</h3>
                    <ul class="space-y-3">
                        <li><a href="/caftans" class="text-sm text-gray-400 hover:text-[#d4af37] transition">Caftans de Mariée</a></li>
                        <li><a href="/accessoires" class="text-sm text-gray-400 hover:text-[#d4af37] transition">Accessoires & Parures</a></li>
                        <li><a href="/forfaits" class="text-sm text-gray-400 hover:text-[#d4af37] transition">Forfaits Mariage</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-5">Informations</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-[#d4af37] transition">Guide des tailles</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-[#d4af37] transition">Conditions de location</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-[#d4af37] transition">Retours & Remboursements</a></li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-xs text-gray-500 mb-4 md:mb-0">
                    &copy; 2026 IlhamCollection. Tous droits réservés.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition">Politique de confidentialité</a>
                    <a href="#" class="text-xs text-gray-500 hover:text-white transition">Mentions légales</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>