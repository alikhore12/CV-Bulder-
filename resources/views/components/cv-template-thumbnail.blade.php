@props([
    'slug' => 'classic',
    'size' => 'lg', // 'lg' (for showcase cards) or 'sm' (for builder buttons)
])

@if ($size === 'lg')
    {{-- Large High-Fidelity A4 Miniature (148px x 210px) --}}
    <div class="relative h-[210px] w-[148px] overflow-hidden rounded-[4px] bg-white shadow-2xl ring-1 ring-black/10 select-none transition-transform duration-300 group-hover:scale-105">

        @if ($slug === 'classic')
            {{-- 1. Classic Blue Professional --}}
            <div class="flex h-full flex-col">
                <div class="relative h-[52px] shrink-0 overflow-hidden bg-[#0a2c4f] px-2 py-1.5 text-white">
                    <div class="absolute -right-2 -top-5 h-20 w-14 -skew-x-[28deg] bg-[#0d6efd]"></div>
                    <div class="absolute right-4 -bottom-6 h-16 w-5 -skew-x-[28deg] bg-[#65a7ff]/50"></div>
                    <div class="relative z-10 flex items-center gap-1.5">
                        <div class="grid h-7 w-7 shrink-0 place-items-center rounded-full border border-white/80 bg-white/20 text-[7px] font-black text-white">
                            MH
                        </div>
                        <div class="min-w-0">
                            <p class="truncate text-[4.5px] font-bold uppercase tracking-wider text-blue-200">Software Engineer</p>
                            <p class="truncate text-[8px] font-black text-white">Muhammad Hamza</p>
                        </div>
                    </div>
                </div>
                <div class="grid flex-1 grid-cols-[36%_64%] p-1.5 text-[4px] leading-tight">
                    <div class="border-r border-slate-200 pr-1 space-y-1.5 text-slate-600">
                        <div>
                            <p class="border-b border-[#0d6efd] pb-0.5 text-[4.5px] font-bold uppercase text-[#0d6efd]">Profile</p>
                            <p class="mt-0.5 text-[3.8px] text-slate-500 line-clamp-3">Experienced full-stack engineer leading teams.</p>
                        </div>
                        <div>
                            <p class="border-b border-[#0d6efd] pb-0.5 text-[4.5px] font-bold uppercase text-[#0d6efd]">Contact</p>
                            <p class="mt-0.5 text-[3.8px] truncate">☎ +92 300 0000</p>
                            <p class="text-[3.8px] truncate">✉ hamza@dev.me</p>
                        </div>
                        <div>
                            <p class="border-b border-[#0d6efd] pb-0.5 text-[4.5px] font-bold uppercase text-[#0d6efd]">Skills</p>
                            <p class="mt-0.5 text-[3.8px] font-semibold text-slate-700">✓ Laravel</p>
                            <p class="text-[3.8px] font-semibold text-slate-700">✓ Vue.js</p>
                            <p class="text-[3.8px] font-semibold text-slate-700">✓ MySQL</p>
                        </div>
                    </div>
                    <div class="pl-1.5 space-y-1.5">
                        <div>
                            <p class="border-b border-[#0d6efd] pb-0.5 text-[4.5px] font-bold uppercase text-[#0d6efd]">Experience</p>
                            <p class="mt-0.5 font-bold text-[#0a2c4f] text-[4.5px]">Lead Backend Dev</p>
                            <p class="text-[3.5px] font-bold text-[#0d6efd]">TechSphere · 2022 – Pres</p>
                            <p class="text-[3.5px] text-slate-500 line-clamp-2">Architected core microservices handling high traffic.</p>
                        </div>
                        <div>
                            <p class="border-b border-[#0d6efd] pb-0.5 text-[4.5px] font-bold uppercase text-[#0d6efd]">Education</p>
                            <p class="mt-0.5 font-bold text-[#0a2c4f] text-[4.5px]">BS Computer Science</p>
                            <p class="text-[3.5px] text-[#0d6efd]">Punjab University · 2019</p>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'modern')
            {{-- 2. Modern Teal --}}
            <div class="flex h-full flex-col bg-white">
                <div class="h-1.5 w-full bg-[#0f766e]"></div>
                <div class="flex items-center gap-1.5 border-b border-slate-100 px-2 py-1.5">
                    <div class="grid h-7 w-7 shrink-0 place-items-center rounded-lg bg-[#ccfbf1] text-[7px] font-black text-[#0f766e]">
                        MH
                    </div>
                    <div class="min-w-0">
                        <p class="truncate text-[4.5px] font-bold uppercase tracking-wider text-[#0f766e]">Software Engineer</p>
                        <p class="truncate text-[8px] font-extrabold text-[#134e4a]">Muhammad Hamza</p>
                    </div>
                </div>
                <div class="flex-1 space-y-1.5 p-1.5 text-[4px]">
                    <div class="rounded border border-slate-200 border-l-[3px] border-l-[#0f766e] bg-white p-1">
                        <p class="text-[4.5px] font-bold uppercase text-[#0f766e]">Profile</p>
                        <p class="text-[3.8px] text-slate-500 line-clamp-2">Full-stack software engineer delivering robust scalable apps.</p>
                    </div>
                    <div class="rounded border border-slate-200 border-l-[3px] border-l-[#0f766e] bg-white p-1">
                        <p class="text-[4.5px] font-bold uppercase text-[#0f766e]">Experience</p>
                        <p class="font-bold text-[#134e4a] text-[4.5px]">Lead Backend Engineer</p>
                        <p class="text-[3.5px] font-bold text-[#0f766e]">TechSphere · 2022 – Present</p>
                    </div>
                    <div class="rounded border border-slate-200 border-l-[3px] border-l-[#0f766e] bg-white p-1">
                        <p class="text-[4.5px] font-bold uppercase text-[#0f766e]">Skills</p>
                        <div class="mt-0.5 flex flex-wrap gap-0.5">
                            <span class="rounded-full bg-[#ccfbf1] px-1 py-0.2 text-[3.2px] font-bold text-[#115e59]">Laravel</span>
                            <span class="rounded-full bg-[#ccfbf1] px-1 py-0.2 text-[3.2px] font-bold text-[#115e59]">Vue.js</span>
                            <span class="rounded-full bg-[#ccfbf1] px-1 py-0.2 text-[3.2px] font-bold text-[#115e59]">Docker</span>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'minimal')
            {{-- 3. Minimal Serif --}}
            <div class="flex h-full flex-col bg-white p-2 text-center text-stone-800">
                <div class="border-b border-stone-200 pb-2">
                    <div class="mx-auto grid h-7 w-7 place-items-center rounded-full bg-stone-100 font-serif text-[7px] font-bold text-stone-700">
                        MH
                    </div>
                    <p class="mt-0.5 text-[4px] font-sans font-bold uppercase tracking-widest text-stone-400">Software Engineer</p>
                    <p class="font-serif text-[9px] font-normal tracking-wide text-stone-900">Muhammad Hamza</p>
                    <div class="mx-auto mt-1 w-6 border-t border-stone-300"></div>
                    <p class="mt-0.5 text-[3.5px] font-sans text-stone-500">Lahore · hamza@dev.me · +92 300 000</p>
                </div>
                <div class="flex-1 space-y-2 pt-2 text-left font-serif text-[4px]">
                    <div>
                        <p class="border-b border-stone-200 pb-0.5 font-sans text-[4.5px] font-bold uppercase tracking-widest text-stone-800">Experience</p>
                        <p class="mt-0.5 font-sans font-bold text-[4.5px]">Lead Backend Engineer · TechSphere</p>
                        <p class="text-[3.5px] text-stone-500">2022 – Present · High scale APIs & microservices</p>
                    </div>
                    <div>
                        <p class="border-b border-stone-200 pb-0.5 font-sans text-[4.5px] font-bold uppercase tracking-widest text-stone-800">Education</p>
                        <p class="mt-0.5 font-sans font-bold text-[4.5px]">BS Computer Science · PUCIT</p>
                    </div>
                    <div>
                        <p class="border-b border-stone-200 pb-0.5 font-sans text-[4.5px] font-bold uppercase tracking-widest text-stone-800">Core Strengths</p>
                        <p class="mt-0.5 text-[3.5px] text-stone-600">PHP 8.4, Laravel, MySQL, REST APIs, Architecture</p>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'elegant')
            {{-- 4. Elegant Gold --}}
            <div class="h-full bg-white p-1.5">
                <div class="flex h-full flex-col justify-between border-[1.5px] border-[#c9a227] p-2 text-stone-900">
                    <div class="border-b border-gray-800 pb-1.5 text-center">
                        <div class="mx-auto grid h-6 w-6 place-items-center rounded-full border border-[#c9a227] bg-amber-50 font-serif text-[6px] font-bold text-amber-900">
                            MH
                        </div>
                        <p class="mt-0.5 text-[3.8px] font-sans font-bold uppercase tracking-widest text-[#a1801a]">Software Engineer</p>
                        <p class="font-serif text-[8.5px] font-bold tracking-wide text-gray-950">Muhammad Hamza</p>
                        <p class="text-[3.5px] font-sans text-stone-500">Lahore, PK · hamza@example.com</p>
                    </div>
                    <div class="space-y-1.5 font-serif text-[4px]">
                        <div>
                            <p class="border-b border-stone-200 pb-0.5 font-sans text-[4.2px] font-bold uppercase tracking-widest text-gray-900">
                                <span class="text-[#c9a227]">&#9670;</span> Profile
                            </p>
                            <p class="mt-0.5 italic text-stone-600 line-clamp-2">Results-driven engineer scaling distributed systems.</p>
                        </div>
                        <div class="border-l-2 border-stone-200 pl-1">
                            <p class="font-sans font-bold text-gray-900 text-[4.2px]">Lead Backend Engineer</p>
                            <p class="text-[3.5px] font-sans text-[#a1801a]">TechSphere · 2022 – Pres</p>
                        </div>
                        <div>
                            <p class="border-b border-stone-200 pb-0.5 font-sans text-[4.2px] font-bold uppercase tracking-widest text-gray-900">
                                <span class="text-[#c9a227]">&#9670;</span> Skills
                            </p>
                            <div class="mt-0.5 flex flex-wrap gap-0.5 font-sans">
                                <span class="border border-[#c9a227] px-1 py-0.2 text-[3px] text-amber-950">Laravel</span>
                                <span class="border border-[#c9a227] px-1 py-0.2 text-[3px] text-amber-950">PHP 8.4</span>
                                <span class="border border-[#c9a227] px-1 py-0.2 text-[3px] text-amber-950">Docker</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center font-sans text-[3.5px] font-bold uppercase tracking-widest text-[#a1801a]">
                        Curriculum Vitae
                    </div>
                </div>
            </div>

        @elseif ($slug === 'compact')
            {{-- 5. Compact Cyan --}}
            <div class="flex h-full flex-col bg-white">
                <div class="bg-[#164e63] px-2 py-1.5 text-white">
                    <div class="flex items-center gap-1.5">
                        <div class="grid h-6 w-6 shrink-0 place-items-center rounded border border-[#67e8f9] bg-cyan-950 text-[6px] font-black text-[#67e8f9]">
                            MH
                        </div>
                        <div class="min-w-0">
                            <p class="truncate text-[4px] font-bold uppercase tracking-wider text-[#a5f3fc]">Lead Software Dev</p>
                            <p class="truncate text-[8px] font-black">Muhammad Hamza</p>
                        </div>
                    </div>
                </div>
                <div class="grid flex-1 grid-cols-[38%_62%] p-1.5 text-[4px]">
                    <div class="border-r border-slate-200 pr-1 space-y-1.5">
                        <div>
                            <p class="border-b border-[#164e63] pb-0.5 text-[4.2px] font-bold uppercase text-[#164e63]">Profile</p>
                            <p class="mt-0.5 text-[3.5px] text-slate-500 line-clamp-3">High throughput backend systems architect.</p>
                        </div>
                        <div>
                            <p class="border-b border-[#164e63] pb-0.5 text-[4.2px] font-bold uppercase text-[#164e63]">Skills</p>
                            <div class="mt-0.5 flex flex-wrap gap-0.5">
                                <span class="rounded bg-[#ecfeff] border border-[#a5f3fc] px-1 py-0.2 text-[3.2px] text-[#155e75] font-bold">Laravel</span>
                                <span class="rounded bg-[#ecfeff] border border-[#a5f3fc] px-1 py-0.2 text-[3.2px] text-[#155e75] font-bold">MySQL</span>
                            </div>
                        </div>
                    </div>
                    <div class="pl-1.5 space-y-1.5">
                        <div>
                            <p class="border-b border-[#164e63] pb-0.5 text-[4.2px] font-bold uppercase text-[#164e63]">Experience</p>
                            <p class="mt-0.5 font-bold text-[#164e63] text-[4.2px]">Lead Engineer</p>
                            <p class="text-[3.2px] text-cyan-700">TechSphere · 2022–Pres</p>
                        </div>
                        <div>
                            <p class="border-b border-[#164e63] pb-0.5 text-[4.2px] font-bold uppercase text-[#164e63]">Education</p>
                            <p class="mt-0.5 font-bold text-[4.2px]">BSCS PUCIT · 3.8 GPA</p>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'blue-cyan-wave')
            {{-- 6. Blue Cyan Wave --}}
            <div class="relative flex h-full flex-col bg-white overflow-hidden">
                <div class="relative h-[56px] shrink-0 overflow-hidden bg-white px-2 pt-1 text-center">
                    <div class="absolute -top-3 -left-4 h-12 w-28 -rotate-6 rounded-[50%] bg-[#19B5E5]"></div>
                    <div class="absolute -top-2 -right-2 h-12 w-24 rotate-3 rounded-[50%] bg-[#26356F]/85"></div>
                    <div class="relative z-10">
                        <div class="mx-auto grid h-7 w-7 place-items-center rounded-full border-2 border-white bg-slate-900 text-[6.5px] font-black text-white shadow">
                            MH
                        </div>
                        <p class="mt-0.5 text-[6.5px] font-black uppercase tracking-wider text-[#26356F]">Muhammad Hamza</p>
                        <p class="text-[3.8px] font-bold uppercase tracking-wider text-[#19B5E5]">Software Engineer</p>
                    </div>
                </div>
                <div class="grid flex-1 grid-cols-[36%_64%] p-1.5 text-[4px]">
                    <div class="border-r border-slate-200 pr-1 space-y-1.5">
                        <div>
                            <p class="border-b-2 border-[#26356F] pb-0.5 text-[4.2px] font-black uppercase text-[#19B5E5]">Contact</p>
                            <p class="mt-0.5 text-[3.5px] text-slate-600 truncate">☎ +92 300 000</p>
                            <p class="text-[3.5px] text-slate-600 truncate">✉ hamza@dev.me</p>
                        </div>
                        <div>
                            <p class="border-b-2 border-[#26356F] pb-0.5 text-[4.2px] font-black uppercase text-[#19B5E5]">Skills</p>
                            <div class="mt-0.5 flex flex-wrap gap-0.5">
                                <span class="rounded-full bg-[#19B5E5] px-1 py-0.2 text-[3px] font-bold text-white">Laravel</span>
                                <span class="rounded-full bg-[#19B5E5] px-1 py-0.2 text-[3px] font-bold text-white">Vue.js</span>
                            </div>
                        </div>
                    </div>
                    <div class="pl-1.5 space-y-1.5">
                        <div>
                            <p class="border-b-2 border-[#26356F] pb-0.5 text-[4.2px] font-black uppercase text-[#19B5E5]">Experience</p>
                            <p class="font-bold text-[#26356F] text-[4.2px]">Lead Backend Dev</p>
                            <p class="text-[3.2px] text-slate-500">TechSphere · 2022–Pres</p>
                        </div>
                        <div>
                            <p class="border-b-2 border-[#26356F] pb-0.5 text-[4.2px] font-black uppercase text-[#19B5E5]">Education</p>
                            <p class="font-bold text-[#26356F] text-[4.2px]">BS Computer Science</p>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'black-yellow-sidebar')
            {{-- 7. Black & Yellow Sidebar --}}
            <div class="grid h-full grid-cols-[38%_62%] bg-white">
                <div class="flex flex-col justify-between bg-[#202020] p-1.5 text-white">
                    <div>
                        <div class="mx-auto grid h-7 w-7 place-items-center rounded-full border-2 border-[#f4c400] bg-stone-800 text-[6.5px] font-black text-[#f4c400]">
                            MH
                        </div>
                        <p class="mt-1 text-center text-[6px] font-black uppercase text-white">M. Hamza</p>
                        <p class="text-center text-[3.8px] font-bold uppercase text-[#f4c400]">Software Eng</p>
                        <div class="mt-2 space-y-1.5 text-[3.5px]">
                            <div>
                                <p class="border-b border-stone-700 pb-0.5 text-[4px] font-bold uppercase text-[#f4c400]">Contact</p>
                                <p class="mt-0.5 text-stone-300 truncate">Lahore, PK</p>
                                <p class="text-stone-300 truncate">hamza@dev.me</p>
                            </div>
                            <div>
                                <p class="border-b border-stone-700 pb-0.5 text-[4px] font-bold uppercase text-[#f4c400]">Skills</p>
                                <p class="text-stone-300">Laravel · PHP</p>
                                <p class="text-stone-300">Vue · MySQL</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-[3.5px] text-[#f4c400] text-center font-bold">★ ATS Standard</div>
                </div>
                <div class="p-1.5 space-y-2 text-[4px]">
                    <div>
                        <p class="border-b border-slate-200 pb-0.5 text-[4.5px] font-bold uppercase text-slate-900">
                            <span class="inline-block h-2 w-2 rounded-full bg-[#f4c400] text-[3px] text-center leading-2 mr-0.5">✦</span> Experience
                        </p>
                        <p class="mt-0.5 font-bold text-slate-900 text-[4.2px]">Lead Backend Engineer</p>
                        <p class="text-[3.2px] text-amber-700 font-bold">TechSphere · 2022 – Pres</p>
                        <p class="text-[3.5px] text-slate-500 line-clamp-2">Architected core distributed microservices.</p>
                    </div>
                    <div>
                        <p class="border-b border-slate-200 pb-0.5 text-[4.5px] font-bold uppercase text-slate-900">
                            <span class="inline-block h-2 w-2 rounded-full bg-[#f4c400] text-[3px] text-center leading-2 mr-0.5">✦</span> Education
                        </p>
                        <p class="mt-0.5 font-bold text-slate-900 text-[4.2px]">BS Computer Science</p>
                        <p class="text-[3.2px] text-slate-500">PUCIT Lahore · Magna Cum Laude</p>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'minimal-dark-sidebar')
            {{-- 8. Minimal Dark Sidebar --}}
            <div class="flex h-full flex-col bg-white">
                <div class="flex h-[34px] shrink-0 items-center gap-1.5 bg-[#222b38] px-2 text-white">
                    <div class="grid h-6 w-6 place-items-center rounded border border-slate-400 bg-slate-800 text-[6px] font-bold text-white">
                        MH
                    </div>
                    <div class="min-w-0">
                        <p class="text-[3.8px] font-bold uppercase tracking-wider text-slate-300">Software Engineer</p>
                        <p class="text-[7.5px] font-bold uppercase text-white">Muhammad Hamza</p>
                    </div>
                </div>
                <div class="grid flex-1 grid-cols-[64%_36%] text-[4px]">
                    <div class="p-1.5 space-y-1.5 text-slate-700">
                        <div>
                            <p class="border-b border-slate-200 pb-0.5 text-[4.2px] font-bold uppercase tracking-wider text-slate-900">Experience</p>
                            <p class="mt-0.5 font-bold text-slate-900 text-[4.2px]">Lead Backend Dev</p>
                            <p class="text-[3.2px] text-slate-500">TechSphere Global · 2022–Pres</p>
                            <p class="text-[3.5px] text-slate-500 line-clamp-2">Core microservices and high-throughput APIs.</p>
                        </div>
                        <div>
                            <p class="border-b border-slate-200 pb-0.5 text-[4.2px] font-bold uppercase tracking-wider text-slate-900">Education</p>
                            <p class="font-bold text-[4.2px]">BS Computer Science</p>
                        </div>
                    </div>
                    <div class="bg-[#222b38] p-1.5 text-slate-200 space-y-1.5">
                        <div>
                            <p class="border-b border-slate-600 pb-0.5 text-[4px] font-bold uppercase text-white">Skills</p>
                            <div class="mt-0.5 flex flex-wrap gap-0.5">
                                <span class="rounded bg-slate-800 px-1 py-0.2 text-[3px] text-slate-200">PHP</span>
                                <span class="rounded bg-slate-800 px-1 py-0.2 text-[3px] text-slate-200">Laravel</span>
                                <span class="rounded bg-slate-800 px-1 py-0.2 text-[3px] text-slate-200">Docker</span>
                            </div>
                        </div>
                        <div>
                            <p class="border-b border-slate-600 pb-0.5 text-[4px] font-bold uppercase text-white">Contact</p>
                            <p class="text-[3.2px] text-slate-300 truncate">hamza@dev.me</p>
                            <p class="text-[3.2px] text-slate-300 truncate">+92 300 000</p>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'navy-blue-geometric')
            {{-- 9. Navy Blue Geometric --}}
            <div class="flex h-full flex-col bg-slate-100">
                <div class="relative h-[42px] shrink-0 bg-[#0B3447] px-2 py-1 text-white">
                    <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-[#3b82f6]"></div>
                    <div class="flex items-center gap-1.5">
                        <div class="grid h-6 w-6 place-items-center rounded-full border-2 border-[#3b82f6] bg-slate-900 text-[6px] font-black text-white">
                            MH
                        </div>
                        <div class="min-w-0">
                            <p class="text-[3.8px] font-bold uppercase tracking-wider text-cyan-300">Software Engineer</p>
                            <p class="text-[7.5px] font-black uppercase text-white">Muhammad Hamza</p>
                        </div>
                    </div>
                </div>
                <div class="flex-1 space-y-1.5 p-1.5 text-[4px]">
                    <div class="rounded-md bg-[#0f172a] p-1 text-white">
                        <p class="border-b border-slate-700 pb-0.5 text-[4px] font-bold uppercase text-slate-400">Experience</p>
                        <p class="font-bold text-white text-[4.2px]">Lead Backend Engineer</p>
                        <p class="text-[3.2px] text-slate-400">TechSphere Global · 2022–Pres</p>
                    </div>
                    <div class="rounded-md bg-[#0f172a] p-1 text-white">
                        <p class="border-b border-slate-700 pb-0.5 text-[4px] font-bold uppercase text-slate-400">Capabilities</p>
                        <div class="mt-0.5 flex flex-wrap gap-0.5">
                            <span class="rounded bg-[#3b82f6] px-1 py-0.2 text-[3px] font-bold text-white uppercase">Laravel</span>
                            <span class="rounded bg-[#3b82f6] px-1 py-0.2 text-[3px] font-bold text-white uppercase">MySQL</span>
                            <span class="rounded bg-[#3b82f6] px-1 py-0.2 text-[3px] font-bold text-white uppercase">Redis</span>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'royal-blue-sidebar')
            {{-- 10. Royal Blue Tech Sidebar --}}
            <div class="grid h-full grid-cols-[36%_64%] bg-white">
                <div class="flex flex-col justify-between bg-[#0b325b] p-1.5 text-white">
                    <div>
                        <div class="mx-auto h-7 w-7 rounded-full border border-white/80 bg-[#1e4a78] grid place-items-center text-[7px] font-black text-cyan-300">
                            MH
                        </div>
                        <p class="mt-1 truncate text-center text-[5.5px] font-black uppercase text-white">M. Hamza</p>
                        <p class="truncate text-center text-[3.8px] font-bold uppercase tracking-wider text-[#38bdf8]">Software Eng</p>
                        
                        <div class="mt-2 space-y-1 border-t border-white/20 pt-1 text-[3.5px] text-slate-200">
                            <p class="truncate">☎ +92 301 1234</p>
                            <p class="truncate">✉ hamza@dev.io</p>
                            <p class="truncate">⌖ Lahore, PK</p>
                        </div>

                        <div class="mt-2 space-y-1 border-t border-white/20 pt-1">
                            <p class="text-[3.8px] font-bold uppercase text-white">Skills</p>
                            <div class="space-y-0.5">
                                <div class="h-0.8 w-full rounded-full bg-[#082547]"><div class="h-full w-4/5 rounded-full bg-[#00b4d8]"></div></div>
                                <div class="h-0.8 w-full rounded-full bg-[#082547]"><div class="h-full w-3/4 rounded-full bg-[#00b4d8]"></div></div>
                                <div class="h-0.8 w-full rounded-full bg-[#082547]"><div class="h-full w-5/6 rounded-full bg-[#00b4d8]"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="h-2 rounded-t-full bg-cyan-400/20"></div>
                </div>
                <div class="flex flex-col justify-between p-1.5 text-[4px]">
                    <div class="space-y-1.5">
                        <div>
                            <p class="font-bold uppercase text-[#0b325b] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#0b325b] text-[3px] text-white grid place-items-center">★</span> About Me</p>
                            <p class="text-[3.5px] text-slate-500 line-clamp-2">Detail-oriented software engineer delivering scalable modern web applications.</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-[#0b325b] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#0b325b] text-[3px] text-white grid place-items-center">🎓</span> Education</p>
                            <p class="font-bold text-slate-800 text-[4px]">BS Computer Science</p>
                            <p class="text-[3.2px] text-slate-400">Univ of Lahore · CGPA 3.45</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-[#0b325b] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#0b325b] text-[3px] text-white grid place-items-center">💼</span> Experience</p>
                            <p class="font-bold text-slate-800 text-[4px]">Software Engineer Intern</p>
                            <p class="text-[3.2px] text-[#00b4d8] font-semibold">ABC Tech Solutions</p>
                        </div>
                    </div>
                    <div class="h-2 w-full rounded-tl-full bg-[#0b325b]/10"></div>
                </div>
            </div>

        @elseif ($slug === 'creative-purple-wave')
            {{-- 11. Creative Purple Designer --}}
            <div class="grid h-full grid-cols-[36%_64%] bg-white">
                <div class="flex flex-col justify-between bg-[#faf5ff] border-r border-purple-100 p-1.5 text-slate-700">
                    <div>
                        <div class="mx-auto h-7 w-7 rounded-full border-2 border-purple-400 bg-purple-100 grid place-items-center text-[7px] font-black text-[#7c3aed]">
                            UA
                        </div>
                        <p class="mt-1 truncate text-center text-[5.5px] font-black uppercase text-[#6b21a8]">Usman Ali</p>
                        <p class="truncate text-center text-[3.8px] font-bold uppercase tracking-wider text-[#9333ea]">UI/UX Designer</p>
                        
                        <div class="mt-2 space-y-0.8 border-t border-purple-200/60 pt-1 text-[3.5px] text-slate-600">
                            <p class="truncate">☎ +92 301 9876</p>
                            <p class="truncate">✉ usman@design.io</p>
                            <p class="truncate">⌖ Karachi, PK</p>
                        </div>

                        <div class="mt-2 space-y-0.8 border-t border-purple-200/60 pt-1">
                            <p class="text-[3.8px] font-bold uppercase text-slate-800">Skills</p>
                            <div class="text-[3.5px] text-[#9333ea]">
                                <p class="flex justify-between"><span>UI Design</span><span>●●●●○</span></p>
                                <p class="flex justify-between"><span>Figma</span><span>●●●●●</span></p>
                                <p class="flex justify-between"><span>Adobe XD</span><span>●●●●○</span></p>
                            </div>
                        </div>

                        <div class="mt-1.5 flex gap-0.5 justify-center">
                            <span class="rounded bg-[#ea4c89] px-0.5 text-[3px] font-bold text-white">Fg</span>
                            <span class="rounded bg-[#470137] px-0.5 text-[3px] font-bold text-[#ff61f6]">XD</span>
                            <span class="rounded bg-[#001e36] px-0.5 text-[3px] font-bold text-[#31a8ff]">Ps</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between p-1.5 text-[4px]">
                    <div class="space-y-1.5">
                        <div>
                            <p class="font-bold uppercase text-[#6b21a8] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#7c3aed] text-[3px] text-white grid place-items-center">★</span> About Me</p>
                            <p class="text-[3.5px] text-slate-500 line-clamp-2">Creative UI/UX designer crafting intuitive digital experiences.</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-[#6b21a8] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#7c3aed] text-[3px] text-white grid place-items-center">🎓</span> Education</p>
                            <p class="font-bold text-slate-900 text-[4px]">BS Software Engineering</p>
                            <p class="text-[3.2px] text-[#7c3aed]">NED University · 3.30</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-[#6b21a8] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#7c3aed] text-[3px] text-white grid place-items-center">💼</span> Experience</p>
                            <p class="font-bold text-slate-900 text-[4px]">UI/UX Design Intern</p>
                            <p class="text-[3.2px] text-[#7c3aed]">Creative Agency · 2023</p>
                        </div>
                    </div>
                    <div class="h-2 w-full rounded-t-full bg-purple-200/40"></div>
                </div>
            </div>

        @elseif ($slug === 'emerald-data-analyst')
            {{-- 12. Emerald Data Analyst --}}
            <div class="flex h-full flex-col bg-white">
                <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border-b border-emerald-100 p-1.5 flex justify-between items-center">
                    <div class="flex items-center gap-1">
                        <div class="h-6 w-6 rounded-full border-2 border-[#10b981] bg-emerald-100 grid place-items-center text-[6px] font-black text-[#059669]">
                            AI
                        </div>
                        <div>
                            <p class="text-[5.5px] font-black uppercase text-slate-900 leading-none">Ahsan Iqbal</p>
                            <p class="text-[3.8px] font-bold uppercase text-[#059669] mt-0.5">Data Analyst</p>
                        </div>
                    </div>
                    <div class="text-[3px] text-slate-500 text-right space-y-0.2">
                        <p>☎ +92 312 5556</p>
                        <p>✉ ahsan@analyst.me</p>
                    </div>
                </div>
                <div class="p-1.5 space-y-1 text-[4px] flex-1">
                    <div>
                        <p class="font-bold uppercase text-[#059669] text-[4.2px]">About Me</p>
                        <p class="text-[3.5px] text-slate-500 line-clamp-1">Detail-oriented Data Analyst with experience in analyzing complex datasets.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-1">
                        <div class="space-y-0.8">
                            <p class="font-bold uppercase text-[#059669] text-[4px]">Education</p>
                            <p class="font-bold text-[3.8px] text-slate-800">BS Statistics</p>
                            <p class="text-[3.2px] text-slate-400">QAU · CGPA 3.62</p>
                            <div class="space-y-0.5 pt-0.5">
                                <div class="h-0.8 w-full bg-slate-100 rounded-full"><div class="h-full w-4/5 bg-[#10b981] rounded-full"></div></div>
                                <div class="h-0.8 w-full bg-slate-100 rounded-full"><div class="h-full w-3/4 bg-[#10b981] rounded-full"></div></div>
                            </div>
                        </div>
                        <div class="space-y-0.8">
                            <p class="font-bold uppercase text-[#059669] text-[4px]">Experience</p>
                            <p class="font-bold text-[3.8px] text-slate-800">Data Analyst Intern</p>
                            <p class="text-[3.2px] text-[#059669]">Data Insights Pvt</p>
                            <p class="font-bold uppercase text-[#059669] text-[4px] pt-0.5">Projects</p>
                            <p class="text-[3.2px] text-slate-600">Sales Dashboard (Power BI)</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-0.5 pt-1 border-t border-slate-100">
                        <div class="rounded border border-emerald-200 bg-emerald-50/50 p-0.5 text-center text-[3px] font-bold text-slate-700">Analytic</div>
                        <div class="rounded border border-emerald-200 bg-emerald-50/50 p-0.5 text-center text-[3px] font-bold text-slate-700">Solving</div>
                        <div class="rounded border border-emerald-200 bg-emerald-50/50 p-0.5 text-center text-[3px] font-bold text-slate-700">Detail</div>
                        <div class="rounded border border-emerald-200 bg-emerald-50/50 p-0.5 text-center text-[3px] font-bold text-slate-700">Comms</div>
                    </div>
                </div>
            </div>

        @elseif ($slug === 'warm-amber-writer')
            {{-- 13. Warm Amber Creative --}}
            <div class="grid h-full grid-cols-[36%_64%] bg-white">
                <div class="flex flex-col justify-between bg-[#fffbeb] border-r border-amber-200 p-1.5 text-slate-700">
                    <div>
                        <div class="mx-auto h-7 w-7 rounded-full border-2 border-amber-400 bg-amber-100 grid place-items-center text-[7px] font-black text-amber-800">
                            TR
                        </div>
                        <p class="mt-1 truncate text-center text-[5.5px] font-black uppercase text-slate-900">Talha Raza</p>
                        <p class="truncate text-center text-[3.8px] font-bold uppercase tracking-wider text-[#ea580c]">Content Writer</p>
                        
                        <div class="mt-2 space-y-0.8 border-t border-amber-200 pt-1 text-[3.5px] text-slate-600">
                            <p class="truncate">☎ +92 333 4445</p>
                            <p class="truncate">✉ talha@writer.io</p>
                            <p class="truncate">⌖ Faisalabad, PK</p>
                        </div>

                        <div class="mt-2 space-y-0.8 border-t border-amber-200 pt-1">
                            <p class="text-[3.8px] font-bold uppercase text-slate-800">Skills</p>
                            <div class="text-[3.5px] text-[#f59e0b]">
                                <p class="flex justify-between"><span>Content</span><span>●●●●●</span></p>
                                <p class="flex justify-between"><span>SEO</span><span>●●●●○</span></p>
                                <p class="flex justify-between"><span>Editing</span><span>●●●●○</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto h-3 w-3 rounded-t-xs bg-amber-400/50"></div>
                </div>
                <div class="flex flex-col justify-between p-1.5 text-[4px]">
                    <div class="space-y-1.5">
                        <div>
                            <p class="font-bold uppercase text-slate-900 text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#ea580c] text-[3px] text-white grid place-items-center">★</span> About Me</p>
                            <p class="text-[3.5px] text-slate-500 line-clamp-2">Creative content writer with passion for engaging and SEO-friendly copy.</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-slate-900 text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#ea580c] text-[3px] text-white grid place-items-center">💼</span> Experience</p>
                            <p class="font-bold text-slate-900 text-[4px]">Content Writer</p>
                            <p class="text-[3.2px] text-[#ea580c]">Digital World · 2022–Pres</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-slate-900 text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#ea580c] text-[3px] text-white grid place-items-center">📁</span> Projects</p>
                            <div class="grid grid-cols-2 gap-0.5">
                                <div class="rounded border border-amber-200 bg-amber-50/50 p-0.5 text-[3.2px]">Tech Blog</div>
                                <div class="rounded border border-amber-200 bg-amber-50/50 p-0.5 text-[3.2px]">Product Copy</div>
                            </div>
                        </div>
                    </div>
                    <div class="h-2 w-full rounded-tl-full bg-gradient-to-r from-amber-200 to-orange-300"></div>
                </div>
            </div>

        @elseif ($slug === 'teal-developer-wave')
            {{-- 14. Teal Developer Wave --}}
            <div class="grid h-full grid-cols-[36%_64%] bg-white">
                <div class="flex flex-col justify-between bg-[#005f73] p-1.5 text-white">
                    <div>
                        <div class="mx-auto h-7 w-7 rounded-full border-2 border-[#2dd4bf] bg-[#0a9396] grid place-items-center text-[7px] font-black text-white">
                            BK
                        </div>
                        <p class="mt-1 truncate text-center text-[5.5px] font-black uppercase text-white">Bilal Khan</p>
                        <p class="truncate text-center text-[3.8px] font-bold uppercase tracking-wider text-[#2dd4bf]">MERN Stack Dev</p>
                        
                        <div class="mt-2 space-y-0.8 border-t border-teal-500/30 pt-1 text-[3.5px] text-teal-100">
                            <p class="truncate">☎ +92 321 7778</p>
                            <p class="truncate">✉ bilal@mern.dev</p>
                            <p class="truncate">⌖ Peshawar, PK</p>
                        </div>

                        <div class="mt-2 space-y-0.8 border-t border-teal-500/30 pt-1">
                            <p class="text-[3.8px] font-bold uppercase text-white">Skills</p>
                            <div class="space-y-0.5">
                                <div class="h-0.8 w-full rounded-full bg-[#003844]"><div class="h-full w-5/6 rounded-full bg-[#2dd4bf]"></div></div>
                                <div class="h-0.8 w-full rounded-full bg-[#003844]"><div class="h-full w-4/5 rounded-full bg-[#2dd4bf]"></div></div>
                                <div class="h-0.8 w-full rounded-full bg-[#003844]"><div class="h-full w-3/4 rounded-full bg-[#2dd4bf]"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-between p-1.5 text-[4px]">
                    <div class="space-y-1.5">
                        <div>
                            <p class="font-bold uppercase text-[#005f73] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#005f73] text-[3px] text-white grid place-items-center">★</span> About Me</p>
                            <p class="text-[3.5px] text-slate-500 line-clamp-2">Passionate MERN stack developer building responsive web applications.</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-[#005f73] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#005f73] text-[3px] text-white grid place-items-center">💼</span> Experience</p>
                            <p class="font-bold text-slate-900 text-[4px]">MERN Developer</p>
                            <p class="text-[3.2px] text-[#0a9396]">Web Solutions · 2023</p>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-[#005f73] text-[4.5px] flex items-center gap-0.5"><span class="h-1.5 w-1.5 rounded-2xs bg-[#005f73] text-[3px] text-white grid place-items-center">📁</span> Projects</p>
                            <p class="text-[3.2px] text-slate-600">Social Media App · Realtime Chat</p>
                        </div>
                    </div>
                    <div class="h-2 w-full rounded-tl-full bg-[#2dd4bf]/30"></div>
                </div>
            </div>

        @endif
    </div>

@else
    {{-- Small Thumbnail for Pickers & Switchers (height: 48px to 64px) --}}
    <div class="relative h-14 w-full overflow-hidden rounded-md border border-slate-200 bg-white shadow-2xs">
        @if ($slug === 'classic')
            <div class="h-4 bg-[#0a2c4f] relative overflow-hidden px-1 flex items-center">
                <div class="absolute -right-1 -top-2 h-8 w-6 -skew-x-[28deg] bg-[#0d6efd]"></div>
                <div class="h-2.5 w-2.5 rounded-full bg-white/20 border border-white/60"></div>
            </div>
            <div class="grid grid-cols-[30%_70%] p-1 gap-1">
                <div class="space-y-0.5 border-r border-slate-200 pr-0.5">
                    <div class="h-0.5 w-full bg-[#0d6efd]"></div>
                    <div class="h-0.5 w-3/4 bg-slate-300"></div>
                </div>
                <div class="space-y-0.5">
                    <div class="h-0.5 w-full bg-[#0d6efd]"></div>
                    <div class="h-1 w-full bg-slate-100 rounded-2xs"></div>
                </div>
            </div>

        @elseif ($slug === 'modern')
            <div class="h-1 bg-[#0f766e]"></div>
            <div class="flex items-center gap-1 p-1 border-b border-slate-100">
                <div class="h-2.5 w-2.5 rounded-sm bg-[#ccfbf1] border border-[#0f766e]"></div>
                <div class="h-1 w-10 bg-[#134e4a] rounded-2xs"></div>
            </div>
            <div class="p-1 space-y-0.5">
                <div class="h-2 border border-slate-200 border-l-2 border-l-[#0f766e] rounded-2xs bg-white"></div>
                <div class="h-2 border border-slate-200 border-l-2 border-l-[#0f766e] rounded-2xs bg-white"></div>
            </div>

        @elseif ($slug === 'minimal')
            <div class="p-1 text-center">
                <div class="mx-auto h-2.5 w-2.5 rounded-full bg-stone-200"></div>
                <div class="mx-auto mt-0.5 h-0.5 w-8 bg-stone-800"></div>
                <div class="mx-auto mt-0.5 w-4 border-t border-stone-300"></div>
                <div class="mt-1 flex gap-1 justify-center">
                    <div class="h-3 w-7 bg-stone-50 border border-stone-100 rounded-2xs"></div>
                    <div class="h-3 w-7 bg-stone-50 border border-stone-100 rounded-2xs"></div>
                </div>
            </div>

        @elseif ($slug === 'elegant')
            <div class="m-0.5 h-[calc(100%-4px)] border border-[#c9a227] p-1 flex flex-col justify-between">
                <div class="text-center">
                    <div class="mx-auto h-2 w-2 rounded-full border border-[#c9a227] bg-amber-50"></div>
                    <div class="mx-auto mt-0.5 h-0.5 w-8 bg-gray-900"></div>
                </div>
                <div class="space-y-0.5">
                    <div class="h-0.5 w-full bg-[#c9a227]"></div>
                    <div class="h-1.5 w-full border-l border-[#c9a227] bg-stone-50"></div>
                </div>
            </div>

        @elseif ($slug === 'compact')
            <div class="h-3.5 bg-[#164e63] px-1 flex items-center gap-1">
                <div class="h-2 w-2 rounded-2xs bg-cyan-950 border border-[#67e8f9]"></div>
                <div class="h-0.5 w-8 bg-white"></div>
            </div>
            <div class="grid grid-cols-[35%_65%] p-1 gap-1">
                <div class="border-r border-slate-200 space-y-0.5">
                    <div class="h-0.5 w-full bg-[#164e63]"></div>
                    <div class="h-1 w-full bg-cyan-50"></div>
                </div>
                <div class="space-y-0.5">
                    <div class="h-0.5 w-full bg-[#164e63]"></div>
                    <div class="h-1 w-full bg-slate-100"></div>
                </div>
            </div>

        @elseif ($slug === 'blue-cyan-wave')
            <div class="relative h-4 overflow-hidden bg-white">
                <div class="absolute -top-2 -left-2 h-6 w-14 -rotate-6 rounded-[50%] bg-[#19B5E5]"></div>
                <div class="absolute -top-1 -right-1 h-6 w-12 rotate-3 rounded-[50%] bg-[#26356F]"></div>
                <div class="relative z-10 mx-auto mt-0.5 h-2.5 w-2.5 rounded-full border border-white bg-slate-900"></div>
            </div>
            <div class="p-1 space-y-0.5">
                <div class="h-0.5 w-full bg-[#19B5E5]"></div>
                <div class="h-2 w-full bg-slate-50 border border-slate-100"></div>
            </div>

        @elseif ($slug === 'black-yellow-sidebar')
            <div class="grid h-full grid-cols-[35%_65%]">
                <div class="bg-[#202020] p-0.5 flex flex-col justify-between">
                    <div class="mx-auto h-2 w-2 rounded-full border border-[#f4c400] bg-stone-800"></div>
                    <div class="space-y-0.5">
                        <div class="h-0.5 w-full bg-[#f4c400]"></div>
                        <div class="h-0.5 w-3/4 bg-stone-600"></div>
                    </div>
                </div>
                <div class="p-1 space-y-0.5">
                    <div class="h-0.5 w-full bg-slate-800"></div>
                    <div class="h-2 w-full bg-slate-50 rounded-2xs"></div>
                </div>
            </div>

        @elseif ($slug === 'minimal-dark-sidebar')
            <div class="h-2.5 bg-[#222b38] px-1 flex items-center">
                <div class="h-1.5 w-1.5 rounded-2xs bg-slate-400"></div>
                <div class="ml-1 h-0.5 w-8 bg-white"></div>
            </div>
            <div class="grid h-[calc(100%-10px)] grid-cols-[65%_35%]">
                <div class="p-1 space-y-0.5">
                    <div class="h-0.5 w-full bg-slate-400"></div>
                    <div class="h-2 w-full bg-slate-50"></div>
                </div>
                <div class="bg-[#222b38] p-0.5 space-y-0.5">
                    <div class="h-0.5 w-full bg-slate-600"></div>
                    <div class="h-1.5 w-full bg-slate-800"></div>
                </div>
            </div>

        @elseif ($slug === 'navy-blue-geometric')
            <div class="relative h-3 bg-[#0B3447] px-1 flex items-center">
                <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-[#3b82f6]"></div>
                <div class="h-2 w-2 rounded-full border border-[#3b82f6] bg-slate-900"></div>
            </div>
            <div class="p-1 space-y-0.5 bg-slate-100">
                <div class="h-2 rounded-2xs bg-[#0f172a]"></div>
                <div class="h-2 rounded-2xs bg-[#0f172a]"></div>
            </div>

        @elseif ($slug === 'royal-blue-sidebar')
            <div class="grid h-full grid-cols-[35%_65%]">
                <div class="bg-[#0b325b] p-0.5 flex flex-col justify-between">
                    <div class="mx-auto h-2 w-2 rounded-full border border-white/60 bg-[#1e4a78]"></div>
                    <div class="space-y-0.5">
                        <div class="h-0.5 w-full bg-[#00b4d8]"></div>
                        <div class="h-0.5 w-3/4 bg-[#00b4d8]"></div>
                    </div>
                </div>
                <div class="p-1 space-y-0.5">
                    <div class="h-0.5 w-full bg-[#0b325b]"></div>
                    <div class="h-1.5 w-full bg-slate-100 rounded-2xs"></div>
                    <div class="h-1.5 w-full bg-slate-50 rounded-2xs"></div>
                </div>
            </div>

        @elseif ($slug === 'creative-purple-wave')
            <div class="grid h-full grid-cols-[35%_65%]">
                <div class="bg-[#faf5ff] border-r border-purple-100 p-0.5 flex flex-col justify-between">
                    <div class="mx-auto h-2 w-2 rounded-full border border-[#a855f7] bg-purple-100"></div>
                    <div class="space-y-0.5">
                        <div class="h-0.5 w-full bg-[#9333ea]"></div>
                        <div class="h-0.5 w-3/4 bg-purple-300"></div>
                    </div>
                </div>
                <div class="p-1 space-y-0.5">
                    <div class="h-0.5 w-full bg-[#6b21a8]"></div>
                    <div class="h-1.5 w-full bg-slate-50 rounded-2xs"></div>
                    <div class="h-1.5 w-full bg-purple-50 rounded-2xs"></div>
                </div>
            </div>

        @elseif ($slug === 'emerald-data-analyst')
            <div class="h-3 bg-gradient-to-r from-emerald-100 to-teal-50 px-1 flex items-center justify-between border-b border-emerald-100">
                <div class="h-2 w-2 rounded-full border border-[#10b981] bg-emerald-200"></div>
                <div class="h-0.5 w-6 bg-[#059669]"></div>
            </div>
            <div class="grid grid-cols-2 p-1 gap-1">
                <div class="space-y-0.5">
                    <div class="h-0.5 w-full bg-[#059669]"></div>
                    <div class="h-1 w-full bg-slate-100"></div>
                </div>
                <div class="space-y-0.5">
                    <div class="h-0.5 w-full bg-[#059669]"></div>
                    <div class="h-1 w-full bg-emerald-50"></div>
                </div>
            </div>

        @elseif ($slug === 'warm-amber-writer')
            <div class="grid h-full grid-cols-[35%_65%]">
                <div class="bg-[#fffbeb] border-r border-amber-200 p-0.5 flex flex-col justify-between">
                    <div class="mx-auto h-2 w-2 rounded-full border border-amber-400 bg-amber-100"></div>
                    <div class="space-y-0.5">
                        <div class="h-0.5 w-full bg-[#ea580c]"></div>
                        <div class="h-0.5 w-3/4 bg-amber-300"></div>
                    </div>
                </div>
                <div class="p-1 space-y-0.5">
                    <div class="h-0.5 w-full bg-slate-900"></div>
                    <div class="h-1.5 w-full bg-amber-50/60 rounded-2xs border border-amber-100"></div>
                </div>
            </div>

        @elseif ($slug === 'teal-developer-wave')
            <div class="grid h-full grid-cols-[35%_65%]">
                <div class="bg-[#005f73] p-0.5 flex flex-col justify-between">
                    <div class="mx-auto h-2 w-2 rounded-full border border-[#2dd4bf] bg-[#0a9396]"></div>
                    <div class="space-y-0.5">
                        <div class="h-0.5 w-full bg-[#2dd4bf]"></div>
                        <div class="h-0.5 w-3/4 bg-teal-300"></div>
                    </div>
                </div>
                <div class="p-1 space-y-0.5">
                    <div class="h-0.5 w-full bg-[#005f73]"></div>
                    <div class="h-1.5 w-full bg-slate-50 rounded-2xs"></div>
                </div>
            </div>
        @endif
    </div>
@endif
