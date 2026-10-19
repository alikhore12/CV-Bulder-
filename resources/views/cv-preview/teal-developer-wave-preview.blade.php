<article id="cv-preview" class="tp-paper cv-teal-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <div class="relative z-10 grid min-h-[297mm] grid-cols-[35%_65%] bg-white">
        <!-- Left Column: Deep Petrol Teal Sidebar -->
        <aside class="relative flex flex-col justify-between bg-[#005f73] p-6 text-white sm:p-7">
            <!-- Decorative circle at top -->
            <div class="absolute -top-12 -left-12 h-44 w-44 rounded-full bg-[#0a9396]/20 pointer-events-none" aria-hidden="true"></div>

            <div class="relative z-10 space-y-6">
                <!-- Circular Photo & Name -->
                <div class="text-center pt-2">
                    <div class="relative mx-auto mb-3.5 h-28 w-28 overflow-hidden rounded-full border-4 border-[#2dd4bf] bg-[#0a9396]/30 shadow-lg">
                        <template x-if="cv.photo">
                            <img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover rounded-full">
                        </template>
                        <span x-show="!cv.photo" class="flex h-full w-full items-center justify-center text-3xl font-black text-[#2dd4bf]" x-text="initials()"></span>
                    </div>
                    <h1 class="break-words text-xl font-black uppercase tracking-wider text-white" x-text="cv.name || 'Bilal Khan'"></h1>
                    <p class="mt-1 text-[.65rem] font-bold uppercase tracking-widest text-[#2dd4bf]" x-text="cv.headline || 'MERN Stack Developer'"></p>
                </div>

                <!-- Contact -->
                <div class="space-y-2 border-t border-teal-500/30 pt-4">
                    <h2 class="text-[.68rem] font-black uppercase tracking-widest text-white">Contact</h2>
                    <div class="space-y-2 text-[.62rem] text-teal-100">
                        <p x-show="cv.phone" class="flex items-center gap-2.5">
                            <span class="text-[#2dd4bf]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.phone || '+92 321 7778899'"></span>
                        </p>
                        <p x-show="cv.email" class="flex items-center gap-2.5">
                            <span class="text-[#2dd4bf]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.email || 'bilalkhan@gmail.com'"></span>
                        </p>
                        <p x-show="cv.location || cv.fullAddress" class="flex items-center gap-2.5">
                            <span class="text-[#2dd4bf]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                            </span>
                            <span x-text="cv.location || cv.fullAddress || 'Peshawar, Pakistan'"></span>
                        </p>
                        <p x-show="cv.github" class="flex items-center gap-2.5">
                            <span class="text-[#2dd4bf]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.github || 'github.com/bilalkhan'"></span>
                        </p>
                        <p x-show="cv.linkedin" class="flex items-center gap-2.5">
                            <span class="text-[#2dd4bf]">
                                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.49 1.49 0 1 0 0-2.98 1.49 1.49 0 0 0 0 2.98m1.39 9.74v-8.37H5.07v8.37h2.78z"/></svg>
                            </span>
                            <span class="break-all" x-text="cv.linkedin || 'linkedin.com/in/bilalkhan'"></span>
                        </p>
                    </div>
                </div>

                <!-- Skills with cyan progress bars -->
                <div class="space-y-2 border-t border-teal-500/30 pt-4">
                    <h2 class="text-[.68rem] font-black uppercase tracking-widest text-white">Skills</h2>
                    <div class="space-y-2.5">
                        <template x-for="item in (cv.skills.length ? cv.skills : [{name: 'MongoDB'}, {name: 'Express.js'}, {name: 'React.js'}, {name: 'Node.js'}, {name: 'JavaScript'}, {name: 'HTML / CSS'}, {name: 'Git & GitHub'}])" :key="'skill-' + (item.id || item.name)">
                            <div x-show="item.name" class="space-y-1">
                                <div class="flex justify-between text-[.6rem] font-semibold text-teal-100">
                                    <span x-text="item.name"></span>
                                </div>
                                <div class="h-1.5 w-full rounded-full bg-[#003844] overflow-hidden">
                                    <div class="h-full rounded-full bg-[#2dd4bf]" :style="`width: ${item.level === 'Expert' ? '95%' : item.level === 'Advanced' ? '85%' : item.level === 'Intermediate' ? '70%' : '80%'}`"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="pt-4 text-center text-[.55rem] text-teal-200/50">
                <span>CV-BULDER</span>
            </div>
        </aside>

        <!-- Right Main Column -->
        <main class="relative flex flex-col justify-between p-7 sm:p-9 space-y-5 bg-white">
            <div class="space-y-5">
                <!-- About Me (with laptop code illustration) -->
                <section class="space-y-2">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-2.5 pb-1">
                            <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#005f73] text-white">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <h2 class="text-xs font-black uppercase tracking-wider text-[#005f73]">About Me</h2>
                        </div>

                        <!-- Laptop with Code screen illustration -->
                        <div class="shrink-0 hidden sm:block">
                            <svg class="h-12 w-14" viewBox="0 0 120 100" fill="none">
                                <!-- Laptop Body -->
                                <rect x="25" y="15" width="70" height="50" rx="4" fill="#0f172a"/>
                                <rect x="30" y="20" width="60" height="40" rx="2" fill="#1e293b"/>
                                <!-- Code icon </ > on screen -->
                                <text x="60" y="45" font-family="monospace" font-size="14" font-weight="bold" fill="#2dd4bf" text-anchor="middle">&lt;/&gt;</text>
                                <!-- Laptop base -->
                                <polygon points="15,68 105,68 98,76 22,76" fill="#64748b"/>
                                <rect x="52" y="69" width="16" height="2" rx="1" fill="#cbd5e1"/>
                            </svg>
                        </div>
                    </div>
                    <p class="text-[.68rem] leading-relaxed text-slate-600" x-text="cv.summary || 'Passionate MERN Stack Developer with hands-on experience in building responsive web applications. I love solving problems and learning new technologies.'"></p>
                </section>

                <!-- Experience -->
                <section class="space-y-2.5">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-teal-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#005f73] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#005f73]">Experience</h2>
                    </div>
                    <div class="space-y-3">
                        <template x-for="item in cv.experience" :key="item.id">
                            <div x-show="item.position || item.company" class="space-y-1">
                                <h3 class="text-[.74rem] font-bold text-slate-900" x-text="item.position || 'MERN Stack Developer'"></h3>
                                <p class="text-[.62rem] font-semibold text-[#0a9396]" x-text="[item.company || 'Web Solutions', [item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' – ')].filter(Boolean).join(' | ')"></p>
                                <p x-show="item.description" class="text-[.65rem] leading-relaxed text-slate-600 whitespace-pre-line" x-text="item.description || '• Built full-stack web applications using MERN stack.\n• Integrated REST APIs and third-party services.\n• Optimized applications for performance and SEO.'"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Projects -->
                <section class="space-y-2.5">
                    <div class="flex items-center gap-2.5 pb-1 border-b border-teal-100">
                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#005f73] text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                        </div>
                        <h2 class="text-xs font-black uppercase tracking-wider text-[#005f73]">Projects</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <template x-for="item in (cv.projects.length ? cv.projects : [{name: 'Social Media App', description: 'Built a social media platform with real-time chat.'}, {name: 'E-Learning Platform', description: 'Developed an e-learning platform with video courses.'}])" :key="'proj-' + (item.id || item.name)">
                            <div x-show="item.name" class="space-y-0.5">
                                <h3 class="text-[.7rem] font-bold text-slate-900" x-text="item.name"></h3>
                                <p x-show="item.description" class="text-[.63rem] text-slate-600" x-text="item.description"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Education (with graduation cap illustration) -->
                <section class="space-y-2">
                    <div class="flex items-center justify-between pb-1 border-b border-teal-100">
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-md bg-[#005f73] text-white">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </div>
                            <h2 class="text-xs font-black uppercase tracking-wider text-[#005f73]">Education</h2>
                        </div>

                        <!-- Graduation Cap on Book Illustration -->
                        <div class="shrink-0 hidden sm:block">
                            <svg class="h-10 w-12" viewBox="0 0 100 80" fill="none">
                                <!-- Books -->
                                <rect x="20" y="48" width="60" height="12" rx="2" fill="#0284c7"/>
                                <rect x="25" y="44" width="50" height="6" rx="1" fill="#38bdf8"/>
                                <!-- Cap -->
                                <polygon points="50,15 85,26 50,37 15,26" fill="#0f172a"/>
                                <polygon points="30,32 30,42 70,42 70,32 50,39" fill="#1e293b"/>
                                <!-- Tassel -->
                                <line x1="50" y1="26" x2="22" y2="34" stroke="#f59e0b" stroke-width="2"/>
                                <circle cx="22" cy="36" r="3" fill="#f59e0b"/>
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <template x-for="item in cv.education" :key="item.id">
                            <div x-show="item.degree || item.institution" class="space-y-0.5">
                                <h3 class="text-[.72rem] font-bold text-slate-900" x-text="item.degree || 'BS Computer Science'"></h3>
                                <p class="text-[.65rem] text-slate-700" x-text="item.institution || 'University of Peshawar'"></p>
                                <p class="text-[.6rem] text-slate-500" x-text="[item.startYear && item.endYear ? `${item.startYear} – ${item.endYear}` : (item.startYear || item.endYear), item.obtainedMarks || item.percentage ? `CGPA: ${item.obtainedMarks || item.percentage}` : 'CGPA: 3.48/4.00'].filter(Boolean).join(' | ')"></p>
                            </div>
                        </template>
                    </div>
                </section>
            </div>

            <!-- Layered Flowing Waves at Bottom -->
            <div class="pointer-events-none relative -mr-7 -mb-7 sm:-mr-9 sm:-mb-9 h-16 overflow-hidden" aria-hidden="true">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="h-full w-full">
                    <path d="M0.00,49.98 C150.00,150.00 271.49,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" class="fill-[#ccfbf1]"></path>
                    <path d="M0.00,80.00 C170.00,130.00 350.00,30.00 500.00,90.00 L500.00,150.00 L0.00,150.00 Z" class="fill-[#2dd4bf]/40"></path>
                </svg>
            </div>
        </main>
    </div>
</article>
