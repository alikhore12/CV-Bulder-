<nav x-data="{ open: false }" class="sticky top-0 z-40 border-b border-white/10 bg-slate-950/90 backdrop-blur-md text-white transition-all">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="group transition-transform duration-200 hover:scale-105" aria-label="CV-BULDER Home">
                        <x-application-logo />
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ url('/') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium transition {{ request()->is('/') ? 'text-cyan-400 bg-white/5 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('cv-builder') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('cv-builder') ? 'text-cyan-400 bg-white/5 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        {{ __('CV Builder') }}
                    </a>
                    <a href="{{ url('/#templates') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition">
                        {{ __('Templates') }}
                    </a>
                    <a href="{{ url('/#features') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition">
                        {{ __('Features') }}
                    </a>
                    <a href="{{ url('/#how-it-works') }}" class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition">
                        {{ __('How It Works') }}
                    </a>
                </div>
            </div>

            <!-- Right Side (Action + Auth) -->
            <div class="hidden sm:flex sm:items-center sm:gap-3">
                <a href="{{ route('cv-builder') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold tracking-wide uppercase text-white bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 shadow-md shadow-indigo-500/25 hover:shadow-cyan-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all">
                    <span>Create CV</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>

                @auth
                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg border border-white/10 bg-white/5 text-sm font-medium text-slate-200 hover:text-white hover:bg-white/10 focus:outline-none transition">
                                <div class="h-6 w-6 rounded-full bg-gradient-to-tr from-cyan-400 to-indigo-500 text-xs font-bold text-white grid place-items-center">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div class="max-w-[120px] truncate text-xs font-semibold">{{ Auth::user()->name }}</div>
                                <svg class="fill-current h-4 w-4 text-slate-400" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 border-b border-gray-100 text-xs text-gray-500">
                                Signed in as <span class="font-bold text-gray-800 block truncate">{{ Auth::user()->email }}</span>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile Settings') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('cv-builder')">
                                {{ __('Open CV Builder') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-slate-300 hover:text-white transition px-3 py-2 rounded-lg hover:bg-white/5">
                        {{ __('Log in') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-xs font-semibold text-cyan-400 hover:text-cyan-300 transition px-3 py-2 rounded-lg hover:bg-cyan-500/10 border border-cyan-400/20">
                            {{ __('Register') }}
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger Button -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-slate-400 hover:text-white hover:bg-white/10 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden border-t border-white/10 bg-slate-950/95 backdrop-blur-xl px-4 pt-3 pb-5 space-y-2">
        <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-200 hover:text-white hover:bg-white/5">
            {{ __('Home') }}
        </a>
        <a href="{{ route('cv-builder') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-cyan-400 bg-white/5">
            {{ __('CV Builder') }}
        </a>
        <a href="{{ url('/#templates') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-200 hover:text-white hover:bg-white/5">
            {{ __('Templates') }}
        </a>
        <a href="{{ url('/#features') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-200 hover:text-white hover:bg-white/5">
            {{ __('Features') }}
        </a>
        <a href="{{ url('/#how-it-works') }}" class="block px-3 py-2 rounded-lg text-base font-semibold text-slate-200 hover:text-white hover:bg-white/5">
            {{ __('How It Works') }}
        </a>

        <div class="pt-4 border-t border-white/10">
            @auth
                <div class="px-3 mb-3">
                    <div class="font-bold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-slate-400">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg text-sm text-slate-300 hover:text-white hover:bg-white/5">
                    {{ __('Profile Settings') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-3 py-2 rounded-lg text-sm text-rose-400 hover:bg-rose-500/10">
                        {{ __('Log Out') }}
                    </a>
                </form>
            @else
                <div class="flex flex-col gap-2 pt-2">
                    <a href="{{ route('login') }}" class="text-center px-4 py-2.5 rounded-xl border border-white/10 text-slate-200 hover:bg-white/5 font-semibold text-sm">
                        {{ __('Log In') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-center px-4 py-2.5 rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 text-white font-semibold text-sm shadow-md">
                            {{ __('Register Account') }}
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
