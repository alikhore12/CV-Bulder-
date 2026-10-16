<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-black tracking-tight text-white">Reset Password</h1>
        <p class="text-xs text-slate-400 mt-1">Enter your email to receive a password reset link</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <x-primary-button class="w-full justify-center py-3 text-sm">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4 border-t border-white/10 text-xs text-slate-400">
            Remembered your credentials?
            <a href="{{ route('login') }}" class="font-bold text-cyan-400 hover:text-cyan-300 ml-1">
                Back to Login
            </a>
        </div>
    </form>
</x-guest-layout>
