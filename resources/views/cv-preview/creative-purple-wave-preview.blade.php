<article id="cv-preview" class="tp-paper cv-purple-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <!-- Top Dot Pattern in right corner -->
    <div class="absolute top-4 right-4 pointer-events-none opacity-40" aria-hidden="true">
        <svg width="70" height="70" viewBox="0 0 70 70" fill="none">
            <pattern id="purple-dots" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="1.5" fill="#a855f7"/>
            </pattern>
            <rect width="70" height="70" fill="url(#purple-dots)"/>
        </svg>
    </div>

    <div class="relative z-10 grid min-h-[297mm] grid-cols-[36%_64%]">
        <!-- Left Column: Light Lavender & Purple Accent -->
        <aside class="relative flex flex-col justify-between border-r border-purple-100 bg-[#faf5ff]/60 p-6 sm:p-7">
            <div class="space-y-6">
                <!-- Circular Photo & Name -->
                <div class="text-center pt-2">
                    <div class="relative mx-auto mb-3.5 h-28 w-28 overflow-hidden rounded-full border-4 border-purple-400/80 bg-purple-100 shadow-md">
                        <template x-if="cv.photo">
                            <img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover rounded-full">
                        </template>
                        <span x-show="!cv.photo" class="flex h-full w-full items-center justify-center text-3xl font-black text-purple-600" x-text="initials()"></span>
                    </div>
                    <h1 class="break-words text-xl font-black uppercase tracking-wider text-[#6b21a8]" x-text="cv.name || 'Usman Ali'"></h1>
                    <p class="mt-1 text-[.65rem] font-extrabold uppercase tracking-widest text-[#9333ea]" x-text="cv.headline || 'UI/UX Designer'"></p>
                </div>

                <!-- Contact -->
                <div class="space-y-2 border-t border-purple-200/60 pt-4">
                    <h2 class="text-[.68rem] font-black uppercase tracking-widest text-slate-800">Contact</h2>
                    <div class="space-y-2 text-[.62rem] text-slate-600">
                        <p x-show="cv.phone" class="flex items-center gap-2">
                            <span class="text-[#9333ea]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.phone || '+92 301 9876543'"></span>
                        </p>
                        <p x-show="cv.email" class="flex items-center gap-2">
                            <span class="text-[#9333ea]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.email || 'usmanali@gmail.com'"></span>
                        </p>
                        <p x-show="cv.location || cv.fullAddress" class="flex items-center gap-2">
                            <span class="text-[#9333ea]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                            </span>
                            <span x-text="cv.location || cv.fullAddress || 'Karachi, Pakistan'"></span>
                        </p>
                        <p x-show="cv.website || cv.linkedin" class="flex items-center gap-2">
                            <span class="text-[#9333ea]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.website || 'behance.net/usmanali'"></span>
                        </p>
                        <p x-show="cv.linkedin" class="flex items-center gap-2">
                            <span class="text-[#9333ea]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.49 1.49 0 1 0 0-2.98 1.49 1.49 0 0 0 0 2.98m1.39 9.74v-8.37H5.07v8.37h2.78z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.linkedin || 'linkedin.com/in/usmanali'"></span>
                        </p>
                    </div>
                </div>

                <!-- Skills with Dot Rating -->
                <div class="space-y-2 border-t border-purple-200/60 pt-4">
                    <h2 class="text-[.68rem] font-black uppercase tracking-widest text-slate-800">Skills</h2>
                    <div class="space-y-2">
                        <template x-for="item in (cv.skills.length ? cv.skills : [{name: 'UI Design'}, {name: 'UX Research'}, {name: 'Figma'}, {name: 'Adobe XD'}, {name: 'Photoshop'}, {name: 'Illustrator'}, {name: 'Prototyping'}])" :key="'skill-' + (item.id || item.name)">
                            <div x-show="item.name" class="flex items-center justify-between text-[.6rem]">
                                <span class="font-medium text-slate-700" x-text="item.name"></span>
                                <div class="flex items-center gap-1 text-[.55rem] text-[#9333ea]">
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#9333ea]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#9333ea]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#9333ea]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full bg-[#9333ea]"></span>
                                    <span class="inline-block h-2 w-2 rounded-full" :class="['Beginner', 'Basic'].includes(item.level) ? 'bg-purple-200' : 'bg-[#9333ea]'"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Tools Section with App Badges -->
                <div class="space-y-2 border-t border-purple-200/60 pt-4">
                    <h2 class="text-[.68rem] font-black uppercase tracking-widest text-slate-800">Tools</h2>
                    <div class="grid grid-cols-4 gap-2 text-center">
                        <div class="flex flex-col items-center">
                            <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-white shadow-sm ring-1 ring-purple-200">
                                <span class="font-bold text-[9px] text-[#ea4c89]">Fg</span>
                            </div>
                            <span class="mt-1 text-[.52rem] font-semibold text-slate-600">Figma</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#470137] shadow-sm">
                                <span class="font-bold text-[9px] text-[#ff61f6]">XD</span>
                            </div>
                            <span class="mt-1 text-[.52rem] font-semibold text-slate-600">Adobe XD</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#001e36] shadow-sm">
                                <span class="font-bold text-[9px] text-[#31a8ff]">Ps</span>
                            </div>
                            <span class="mt-1 text-[.52rem] font-semibold text-slate-600">Photoshop</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#330000] shadow-sm">
                                <span class="font-bold text-[9px] text-[#ff9a00]">Ai</span>
                            </div>
                            <span class="mt-1 text-[.52rem] font-semibold text-slate-600">Illustrator</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4 text-center text-[.55rem] text-purple-400">
                <span>✦ Creative Studio</span>
            </div>
        </aside>

        <!-- Right Main Column -->
        <main class="relative flex flex-col justify-between p-7 sm:p-9 space-y-5 bg-white">
            <div class="space-y-5">
                <!-- About Me -->
                <section class="space-y-2">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-purple-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#7c3aed] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#6b21a8]">About Me</h2>
                    </div>
                    <p class="text-[.68rem] leading-relaxed text-slate-600" x-text="cv.summary || 'Creative UI/UX Designer with a passion for designing intuitive and user-friendly digital experiences. I enjoy turning complex problems into simple and beautiful designs.'"></p>
                </section>

                <!-- Education -->
                <section class="space-y-2.5">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-purple-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#7c3aed] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#6b21a8]">Education</h2>
                    </div>
                    <div class="space-y-2.5">
                        <template x-for="item in cv.education" :key="item.id">
                            <div x-show="item.degree || item.institution" class="space-y-0.5">
                                <h3 class="text-[.74rem] font-bold text-slate-900" x-text="item.degree || 'BS Software Engineering'"></h3>
                                <p class="text-[.66rem] font-semibold text-[#7c3aed]" x-text="item.institution || 'NED University, Karachi'"></p>
                                <p class="text-[.62rem] text-slate-500" x-text="[item.startYear && item.endYear ? `${item.startYear} – ${item.endYear}` : (item.startYear || item.endYear), item.obtainedMarks || item.percentage ? `CGPA: ${item.obtainedMarks || item.percentage}` : ''].filter(Boolean).join(' | ')"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Experience -->
                <section class="space-y-2.5">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-purple-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#7c3aed] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#6b21a8]">Experience</h2>
                    </div>
                    <div class="space-y-3">
                        <template x-for="item in cv.experience" :key="item.id">
                            <div x-show="item.position || item.company" class="space-y-1">
                                <h3 class="text-[.74rem] font-bold text-slate-900" x-text="item.position || 'UI/UX Design Intern'"></h3>
                                <p class="text-[.62rem] font-semibold text-[#7c3aed]" x-text="[item.company, [item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' – ')].filter(Boolean).join(' | ')"></p>
                                <p x-show="item.description" class="text-[.65rem] leading-relaxed text-slate-600 whitespace-pre-line" x-text="item.description || '• Designed user interfaces for mobile and web apps.\n• Created wireframes, prototypes and design systems.\n• Collaborated with developers and product managers.'"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Projects -->
                <section class="space-y-2.5">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-purple-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#7c3aed] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#6b21a8]">Projects</h2>
                    </div>
                    <div class="space-y-2.5">
                        <template x-for="item in (cv.projects.length ? cv.projects : [{name: 'Food Delivery App', description: 'Designed a complete UI/UX for a food delivery app.'}, {name: 'Portfolio Website', description: 'Designed and prototyped a personal portfolio website.'}])" :key="'proj-' + (item.id || item.name)">
                            <div x-show="item.name" class="space-y-0.5">
                                <h3 class="text-[.72rem] font-bold text-slate-900" x-text="item.name"></h3>
                                <p x-show="item.description" class="text-[.64rem] text-slate-600" x-text="item.description"></p>
                            </div>
                        </template>
                    </div>
                </section>
            </div>

            <!-- Bottom Flowing Lavender Waves -->
            <div class="pointer-events-none relative -mr-7 -mb-7 sm:-mr-9 sm:-mb-9 h-16 overflow-hidden" aria-hidden="true">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="h-full w-full">
                    <path d="M0.00,49.98 C150.00,150.00 271.49,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" class="fill-[#f3e8ff]"></path>
                    <path d="M0.00,80.00 C170.00,130.00 350.00,30.00 500.00,90.00 L500.00,150.00 L0.00,150.00 Z" class="fill-[#c084fc]/30"></path>
                </svg>
            </div>
        </main>
    </div>
</article>
