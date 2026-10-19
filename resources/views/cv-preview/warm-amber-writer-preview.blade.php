<article id="cv-preview" class="tp-paper cv-amber-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <div class="relative z-10 grid min-h-[297mm] grid-cols-[36%_64%]">
        <!-- Left Sidebar: Warm Golden Amber -->
        <aside class="relative flex flex-col justify-between border-r border-amber-200 bg-[#fffbeb] p-6 sm:p-7">
            <!-- Top Amber Shape -->
            <div class="absolute -top-10 -left-10 h-36 w-36 rounded-full bg-[#fde68a]/50 pointer-events-none" aria-hidden="true"></div>

            <div class="relative z-10 space-y-6">
                <!-- Circular Photo & Name -->
                <div class="text-center pt-2">
                    <div class="relative mx-auto mb-3.5 h-28 w-28 overflow-hidden rounded-full border-4 border-amber-400 bg-amber-100 shadow-md">
                        <template x-if="cv.photo">
                            <img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover rounded-full">
                        </template>
                        <span x-show="!cv.photo" class="flex h-full w-full items-center justify-center text-3xl font-black text-amber-700" x-text="initials()"></span>
                    </div>
                    <h1 class="break-words text-xl font-black uppercase tracking-wider text-slate-900" x-text="cv.name || 'Talha Raza'"></h1>
                    <p class="mt-1 text-[.65rem] font-extrabold uppercase tracking-widest text-[#ea580c]" x-text="cv.headline || 'Content Writer'"></p>
                </div>

                <!-- Contact -->
                <div class="space-y-2 border-t border-amber-200 pt-4">
                    <h2 class="text-[.68rem] font-black uppercase tracking-widest text-slate-800">Contact</h2>
                    <div class="space-y-2 text-[.62rem] text-slate-700">
                        <p x-show="cv.phone" class="flex items-center gap-2">
                            <span class="text-[#ea580c]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.phone || '+92 333 4445566'"></span>
                        </p>
                        <p x-show="cv.email" class="flex items-center gap-2">
                            <span class="text-[#ea580c]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.email || 'talharaza@gmail.com'"></span>
                        </p>
                        <p x-show="cv.location || cv.fullAddress" class="flex items-center gap-2">
                            <span class="text-[#ea580c]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                            </span>
                            <span x-text="cv.location || cv.fullAddress || 'Faisalabad, Pakistan'"></span>
                        </p>
                        <p x-show="cv.linkedin" class="flex items-center gap-2">
                            <span class="text-[#ea580c]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.49 1.49 0 1 0 0-2.98 1.49 1.49 0 0 0 0 2.98m1.39 9.74v-8.37H5.07v8.37h2.78z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.linkedin || 'linkedin.com/in/talharaza'"></span>
                        </p>
                    </div>
                </div>

                <!-- Skills with Dot Rating -->
                <div class="space-y-2 border-t border-amber-200 pt-4">
                    <h2 class="text-[.68rem] font-black uppercase tracking-widest text-slate-800">Skills</h2>
                    <div class="space-y-2">
                        <template x-for="item in (cv.skills.length ? cv.skills : [{name: 'Content Writing'}, {name: 'Blog Writing'}, {name: 'SEO Writing'}, {name: 'Research'}, {name: 'Editing'}, {name: 'WordPress'}])" :key="'skill-' + (item.id || item.name)">
                            <div x-show="item.name" class="flex items-center justify-between text-[.6rem]">
                                <span class="font-medium text-slate-800" x-text="item.name"></span>
                                <div class="flex items-center gap-1 text-[.55rem] text-[#ea580c]">
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#f59e0b]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#f59e0b]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#f59e0b]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#f59e0b]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full" :class="['Beginner', 'Basic'].includes(item.level) ? 'bg-amber-200' : 'bg-[#f59e0b]'"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Pencil Cup Decorative Graphic at Bottom Left -->
            <div class="pt-6 flex justify-center">
                <div class="relative flex items-center justify-center">
                    <svg class="h-16 w-16" viewBox="0 0 100 100" fill="none">
                        <!-- Cup -->
                        <rect x="25" y="45" width="50" height="48" rx="8" fill="#f59e0b" />
                        <rect x="23" y="42" width="54" height="6" rx="3" fill="#d97706" />
                        <!-- Pencils -->
                        <polygon points="35,12 30,45 40,45" fill="#ef4444" />
                        <polygon points="35,12 33,22 37,22" fill="#fca5a5" />
                        <polygon points="50,6 45,45 55,45" fill="#3b82f6" />
                        <polygon points="50,6 48,16 52,16" fill="#93c5fd" />
                        <polygon points="65,14 60,45 70,45" fill="#10b981" />
                        <polygon points="65,14 63,24 67,24" fill="#a7f3d0" />
                        <!-- Cup Highlight -->
                        <rect x="30" y="52" width="4" height="34" rx="2" fill="#fbbf24" opacity="0.6"/>
                    </svg>
                </div>
            </div>
        </aside>

        <!-- Right Main Column -->
        <main class="relative flex flex-col justify-between p-7 sm:p-9 space-y-5 bg-white">
            <div class="space-y-5">
                <!-- About Me (with notebook illustration) -->
                <section class="space-y-2">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-2.5 pb-1">
                            <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#ea580c] text-white">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <h2 class="text-xs font-black uppercase tracking-wider text-slate-900">About Me</h2>
                        </div>
                        <!-- Notebook and pencil graphic -->
                        <div class="shrink-0 opacity-90 hidden sm:block">
                            <svg class="h-12 w-12" viewBox="0 0 100 100" fill="none">
                                <rect x="20" y="15" width="55" height="70" rx="4" fill="#fff" stroke="#93c5fd" stroke-width="3"/>
                                <line x1="28" y1="30" x2="65" y2="30" stroke="#cbd5e1" stroke-width="3" stroke-linecap="round"/>
                                <line x1="28" y1="42" x2="65" y2="42" stroke="#cbd5e1" stroke-width="3" stroke-linecap="round"/>
                                <line x1="28" y1="54" x2="65" y2="54" stroke="#cbd5e1" stroke-width="3" stroke-linecap="round"/>
                                <line x1="28" y1="66" x2="52" y2="66" stroke="#cbd5e1" stroke-width="3" stroke-linecap="round"/>
                                <!-- Top spirals -->
                                <circle cx="32" cy="15" r="3" fill="#60a5fa"/>
                                <circle cx="48" cy="15" r="3" fill="#60a5fa"/>
                                <circle cx="64" cy="15" r="3" fill="#60a5fa"/>
                                <!-- Pencil -->
                                <polygon points="80,40 58,78 65,82 87,44" fill="#f59e0b"/>
                                <polygon points="58,78 54,86 65,82" fill="#ef4444"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[.68rem] leading-relaxed text-slate-600" x-text="cv.summary || 'Creative and detail-oriented Content Writer with a passion for creating engaging and SEO-friendly content. Skilled in writing blogs, articles and website content.'"></p>
                </section>

                <!-- Experience -->
                <section class="space-y-2.5">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-amber-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#ea580c] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-900">Experience</h2>
                    </div>
                    <div class="space-y-3">
                        <template x-for="item in cv.experience" :key="item.id">
                            <div x-show="item.position || item.company" class="space-y-1">
                                <h3 class="text-[.74rem] font-bold text-slate-900" x-text="item.position || 'Content Writer'"></h3>
                                <p class="text-[.62rem] font-semibold text-[#ea580c]" x-text="[item.company || 'Digital World', [item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' – ')].filter(Boolean).join(' | ')"></p>
                                <p x-show="item.description" class="text-[.65rem] leading-relaxed text-slate-600 whitespace-pre-line" x-text="item.description || '• Write blog posts and website content.\n• Conduct research and create SEO-friendly articles.\n• Edit and proofread content for accuracy.'"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Projects (Side-by-Side Rounded Cards) -->
                <section class="space-y-2.5">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-amber-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#ea580c] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-900">Projects</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <template x-for="item in (cv.projects.length ? cv.projects : [{name: 'Tech Blog Website', description: 'Wrote and managed content for a tech blog.'}, {name: 'Product Descriptions', description: 'Created product descriptions for an e-commerce store.'}])" :key="'proj-' + (item.id || item.name)">
                            <div x-show="item.name" class="rounded-xl border border-amber-200 bg-amber-50/30 p-3 space-y-1">
                                <div class="flex items-center gap-1.5 text-[#ea580c]">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    <h3 class="text-[.68rem] font-bold text-slate-900" x-text="item.name"></h3>
                                </div>
                                <p x-show="item.description" class="text-[.62rem] text-slate-600" x-text="item.description"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Education -->
                <section class="space-y-2">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-amber-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#ea580c] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-900">Education</h2>
                    </div>
                    <div class="space-y-2">
                        <template x-for="item in cv.education" :key="item.id">
                            <div x-show="item.degree || item.institution" class="space-y-0.5">
                                <h3 class="text-[.72rem] font-bold text-slate-900" x-text="item.degree || 'BA English'"></h3>
                                <p class="text-[.65rem] text-slate-700" x-text="item.institution || 'Government College University, Faisalabad'"></p>
                                <p class="text-[.6rem] text-slate-500" x-text="[item.startYear && item.endYear ? `${item.startYear} – ${item.endYear}` : (item.startYear || item.endYear), item.obtainedMarks || item.percentage ? `CGPA: ${item.obtainedMarks || item.percentage}` : ''].filter(Boolean).join(' | ')"></p>
                            </div>
                        </template>
                    </div>
                </section>
            </div>

            <!-- Layered Sunset Orange/Amber Waves at Bottom Right -->
            <div class="pointer-events-none relative -mr-7 -mb-7 sm:-mr-9 sm:-mb-9 h-16 overflow-hidden" aria-hidden="true">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="h-full w-full">
                    <path d="M0.00,49.98 C150.00,150.00 271.49,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" class="fill-[#fef3c7]"></path>
                    <path d="M0.00,70.00 C180.00,120.00 320.00,20.00 500.00,80.00 L500.00,150.00 L0.00,150.00 Z" class="fill-[#f59e0b]/40"></path>
                    <path d="M0.00,90.00 C220.00,130.00 360.00,40.00 500.00,100.00 L500.00,150.00 L0.00,150.00 Z" class="fill-[#ea580c]/50"></path>
                </svg>
            </div>
        </main>
    </div>
</article>
