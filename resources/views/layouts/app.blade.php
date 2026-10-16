<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CV-BULDER') }} — Professional Resume Studio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900 bg-[#f8fafc]">
        <div class="min-h-screen flex flex-col justify-between">
            <div>
                @unless (request()->routeIs('cv-builder'))
                    @include('layouts.navigation')
                @endunless

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white border-b border-slate-200 shadow-xs">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>

            @unless (request()->routeIs('cv-builder'))
                <footer class="border-t border-slate-200 bg-white py-6 mt-12 text-center text-xs text-slate-500">
                    <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <span class="font-extrabold text-slate-800">CV-<span class="text-indigo-600">BULDER</span></span>
                            <span>— Professional ATS Resume Maker</span>
                        </div>
                        <div>
                            © {{ date('Y') }} CV-BULDER. Built for your next career move.
                        </div>
                    </div>
                </footer>
            @endunless
        </div>
    </body>
</html>
