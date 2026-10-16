<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-2.5 select-none']) }}>
    <div class="relative flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-tr from-cyan-400 via-indigo-500 to-violet-600 p-[1.5px] shadow-lg shadow-indigo-500/25">
        <div class="flex h-full w-full items-center justify-center rounded-[10px] bg-slate-950">
            <svg class="h-5 w-5 text-cyan-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
        </div>
    </div>
    <div class="flex flex-col text-left leading-tight">
        <span class="text-lg font-black tracking-wider text-white">CV-<span class="bg-gradient-to-r from-cyan-400 via-indigo-400 to-violet-400 bg-clip-text text-transparent">BULDER</span></span>
        <span class="text-[9px] font-bold uppercase tracking-widest text-slate-400">Pro Studio</span>
    </div>
</div>
