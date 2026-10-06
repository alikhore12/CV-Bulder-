<div x-data="{ selected: localStorage.getItem('cvbuilder-template') || @js($defaultTemplate) }" class="fixed bottom-4 left-1/2 z-40 w-[min(94vw,720px)] -translate-x-1/2 rounded-2xl border border-slate-200 bg-white/95 p-3 shadow-2xl backdrop-blur print:hidden">
    <div class="mb-2 flex items-center justify-between gap-3 px-1">
        <div><p class="text-xs font-extrabold uppercase tracking-wider text-slate-900">CV templates</p><p class="text-[11px] text-slate-500">Select a template to update the live preview and PDF.</p></div>
        <span class="rounded-full bg-indigo-50 px-2 py-1 text-[10px] font-bold text-indigo-700">5 templates</span>
    </div>
    <div class="grid grid-cols-5 gap-2 overflow-x-auto">
        @foreach ($templates as $templateOption)
            <button type="button" @click="selected = @js($templateOption['slug']); localStorage.setItem('cvbuilder-template', selected); window.location.reload()" :class="selected === @js($templateOption['slug']) ? 'border-indigo-500 bg-indigo-50 text-indigo-700 ring-2 ring-indigo-100' : 'border-slate-200 bg-white text-slate-600 hover:border-indigo-300'" class="min-w-[110px] rounded-xl border px-2 py-2 text-left transition">
                <span class="mb-1 block h-9 rounded-md bg-gradient-to-br from-slate-100 to-slate-300 p-1.5"><span class="block h-1 w-2/3 rounded bg-slate-700"></span><span class="mt-1 block h-4 w-full rounded bg-white"></span></span>
                <span class="block truncate text-[10px] font-bold">{{ $templateOption['name'] }}</span>
            </button>
        @endforeach
    </div>
</div>
