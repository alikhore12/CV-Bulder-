<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-black tracking-tight text-white">Verify Your Email</h1>
        <p class="text-xs text-slate-400 mt-1">Please confirm your email address to continue</p>
    </div>

    <div class="mb-4 text-xs text-slate-300 leading-relaxed">
        {{ __('Thanks for signing up for CV-BULDER! Before getting started, please verify your email address by clicking the link we just sent you.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-semibold text-xs text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 p-3 rounded-xl">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="mt-6 flex flex-col gap-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full justify-center py-3 text-sm">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="text-xs text-slate-400 hover:text-white transition">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
