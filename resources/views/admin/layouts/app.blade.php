<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration - IlhamCollection')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Lato', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 h-screen flex overflow-hidden">

    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col hidden md:flex z-20">
        <div class="h-16 flex items-center justify-center border-b border-gray-200 px-6">
            <span class="text-xl font-bold tracking-widest text-gray-900 uppercase">Ilham<span class="text-[#d4af37]">Admin</span></span>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <a href="/admin/dashboard" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-[#d4af37] transition">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Tableau de bord
            </a>
            <a href="/admin/catalog" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg bg-[#fdfbf7] text-[#d4af37] transition">
                <svg class="w-5 h-5 mr-3 text-[#d4af37]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                Catalogue & Forfaits
            </a>
            <a href="/admin/reservations" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-[#d4af37] transition">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                RÃ©servations
                <span class="ml-auto bg-red-100 text-red-600 py-0.5 px-2 rounded-full text-xs">3</span>
            </a>
            <a href="/admin/customers" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-50 hover:text-[#d4af37] transition">
                <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Clientes
            </a>
        </nav>
        <div class="p-4 border-t border-gray-200">
            <a href="/" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 transition">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Retour au site
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-gray-50">
        
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10">
            <h2 class="text-xl font-semibold text-gray-800">@yield('header_title', 'Tableau de bord')</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-600">Bonjour, Administratrice</span>
                <img class="h-8 w-8 rounded-full object-cover border border-[#d4af37]" src="https://ui-avatars.com/api/?name=Admin&background=d4af37&color=fff" alt="Admin avatar">
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </div>

    </main>
</body>
</html>