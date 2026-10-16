<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight">
                    {{ __('Account Profile') }}
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Manage your personal credentials and security for CV-BULDER.</p>
            </div>
            <a href="{{ route('cv-builder') }}" class="inline-flex items-center gap-1.5 self-start sm:self-auto rounded-xl bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 px-4 py-2 text-xs font-bold text-white shadow-md hover:scale-[1.02] transition-transform">
                <span>Open CV Builder</span>
                <span>→</span>
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 sm:p-8 bg-white border border-slate-200/80 shadow-sm sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white border border-slate-200/80 shadow-sm sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white border border-slate-200/80 shadow-sm sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
