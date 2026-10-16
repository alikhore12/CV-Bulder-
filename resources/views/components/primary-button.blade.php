<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-wider hover:opacity-95 hover:scale-[1.02] active:scale-[0.98] shadow-md shadow-indigo-500/25 transition-all focus:outline-none focus:ring-2 focus:ring-cyan-400']) }}>
    {{ $slot }}
</button>
