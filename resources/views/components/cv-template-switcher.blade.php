<div x-data="{
    open: false,
    selected: localStorage.getItem('cvbuilder-template') || @js($defaultTemplate)
}" class="fixed bottom-4 left-1/2 z-40 -translate-x-1/2 w-[min(94vw,780px)] print:hidden">
    <!-- Toggle Pill Button -->
    <div class="flex justify-center mb-1">
        <button type="button" @click="open = !open" class="inline-flex items-center gap-1.5 rounded-full bg-slate-950/90 text-white px-4 py-1.5 text-xs font-bold shadow-xl border border-white/15 backdrop-blur hover:bg-slate-900 transition">
            <span class="text-cyan-400">✦</span>
            <span>Switch Template ({{ count($templates) }})</span>
            <svg class="w-3.5 h-3.5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </button>
    </div>

    <!-- Template Drawer -->
    <div x-show="open" x-cloak class="rounded-2xl border border-slate-200/90 bg-white/95 p-3.5 shadow-2xl backdrop-blur-md">
        <div class="mb-2 flex items-center justify-between gap-3 px-1">
            <div>
                <p class="text-xs font-black uppercase tracking-wider text-slate-900">Choose From {{ count($templates) }} Templates</p>
                <p class="text-[11px] text-slate-500">Click any layout to update live preview instantly.</p>
            </div>
            <button type="button" @click="open = false" class="text-slate-400 hover:text-slate-700 text-sm font-bold px-1.5" aria-label="Close template drawer">✕</button>
        </div>
        <div class="flex gap-2 overflow-x-auto pb-1">
            @foreach ($templates as $templateOption)
                <button type="button" @click="selected = @js($templateOption['slug']); localStorage.setItem('cvbuilder-template', selected); window.dispatchEvent(new CustomEvent('template-selected', { detail: selected }));" :class="selected === @js($templateOption['slug']) ? 'border-indigo-600 bg-indigo-50 text-indigo-700 ring-2 ring-indigo-200' : 'border-slate-200 bg-white text-slate-700 hover:border-indigo-300'" class="min-w-[130px] shrink-0 rounded-xl border p-2 text-left transition">
                    <span class="mb-1.5 block overflow-hidden rounded-md">
                        <x-cv-template-thumbnail :slug="$templateOption['slug']" size="sm" />
                    </span>
                    <span class="block truncate text-[10px] font-bold">{{ $templateOption['name'] }}</span>
                </button>
            @endforeach
        </div>
    </div>
</div>
