<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h1 class="text-2xl font-black tracking-tight text-white">Welcome Back</h1>
        <p class="text-xs text-slate-400 mt-1">Sign in to your CV-BULDER account</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-cyan-400 hover:text-cyan-300 transition" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-slate-700 bg-slate-950/70 text-indigo-600 shadow-sm focus:ring-cyan-400" name="remember">
                <span class="ms-2 text-xs font-medium text-slate-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-sm">
                {{ __('Sign In to CV-BULDER') }}
            </x-primary-button>
        </div>

        @if (Route::has('register'))
            <div class="text-center pt-4 border-t border-white/10 text-xs text-slate-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-bold text-cyan-400 hover:text-cyan-300 ml-1">
                    Register for Free
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
