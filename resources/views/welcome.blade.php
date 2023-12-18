<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home Project Vola spa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="flex justify-center items-center bg-slate-700 h-screen">
            @if (Route::has('login'))
                {{-- Card per il login --}}
                <div class="p-6 bg-white rounded-lg w-1/2 h-content">
                    <h1 class="text-center mb-3 font-extrabold text-4xl">Benvenut*!</h1>

                    <p class="text-center mb-10 font-semibold">Hai già un account? Allora esegui il login. Altrimenti clicca su "Registrati".</p>

                    <div class="flex items-center justify-center gap-5">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary w-1/3">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary w-1/3">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary w-1/3">Registrati</a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif
        </div>
    </body>
</html>
