<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CV-BULDER') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#080c14] text-slate-100 min-h-screen selection:bg-cyan-500 selection:text-white">
        <div class="relative min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <!-- Background ambient glows -->
            <div class="pointer-events-none absolute -top-40 left-1/2 -translate-x-1/2 h-[500px] w-[700px] rounded-full bg-gradient-to-tr from-cyan-500/20 via-indigo-500/20 to-violet-500/20 blur-[130px]"></div>
            <div class="pointer-events-none absolute bottom-0 right-0 h-[400px] w-[500px] rounded-full bg-cyan-500/10 blur-[120px]"></div>

            <div class="mb-6 text-center">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group transition-transform hover:scale-105" aria-label="CV-BULDER Home">
                    <x-application-logo />
                </a>
            </div>

            <div class="w-full sm:max-w-md p-8 bg-slate-900/80 backdrop-blur-xl border border-white/10 shadow-2xl rounded-2xl relative z-10">
                {{ $slot }}
            </div>

            <div class="mt-8 text-center text-xs text-slate-400">
                <a href="{{ url('/') }}" class="text-cyan-400 hover:text-cyan-300 font-semibold transition">← Back to CV-BULDER Home</a>
            </div>
        </div>
    </body>
</html>
