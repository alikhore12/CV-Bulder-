<article id="cv-preview" class="tp-paper cv-emerald-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <!-- Header with soft green accent wave -->
    <header class="relative z-10 overflow-hidden bg-gradient-to-r from-emerald-50 via-teal-50 to-white px-7 pt-8 pb-6 sm:px-10 border-b border-emerald-100">
        <!-- Subtle Top Wave Arc -->
        <div class="absolute -top-16 -right-16 h-48 w-48 rounded-full bg-emerald-200/30 pointer-events-none" aria-hidden="true"></div>

        <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <!-- Left: Photo & Name -->
            <div class="flex items-center gap-5">
                <div class="relative h-24 w-24 shrink-0 overflow-hidden rounded-full border-4 border-[#10b981] bg-emerald-100 shadow-md">
                    <template x-if="cv.photo">
                        <img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover rounded-full">
                    </template>
                    <span x-show="!cv.photo" class="flex h-full w-full items-center justify-center text-3xl font-black text-[#059669]" x-text="initials()"></span>
                </div>
                <div>
                    <h1 class="break-words text-2xl font-black uppercase tracking-tight text-slate-900" x-text="cv.name || 'Ahsan Iqbal'"></h1>
                    <p class="mt-1 text-xs font-black uppercase tracking-widest text-[#059669]" x-text="cv.headline || 'Data Analyst'"></p>
                </div>
            </div>

            <!-- Right: Contact info block -->
            <div class="space-y-1.5 text-[.64rem] text-slate-600 sm:text-right border-t sm:border-t-0 sm:border-l border-emerald-200 sm:pl-6 pt-3 sm:pt-0">
                <p x-show="cv.phone" class="flex items-center sm:justify-end gap-2">
                    <span x-text="cv.phone || '+92 312 5556677'"></span>
                    <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-2.8 w-2.8" fill="currentColor" viewBox="0 0 24 24"><path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.45.57 3.57a1 1 0 01-.25 1.02l-2.2 2.2z"/></svg>
                    </span>
                </p>
                <p x-show="cv.email" class="flex items-center sm:justify-end gap-2">
                    <span class="break-all" x-text="cv.email || 'ahsan.iqbal@gmail.com'"></span>
                    <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-2.8 w-2.8" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    </span>
                </p>
                <p x-show="cv.location || cv.fullAddress" class="flex items-center sm:justify-end gap-2">
                    <span x-text="cv.location || cv.fullAddress || 'Islamabad, Pakistan'"></span>
                    <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-2.8 w-2.8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                    </span>
                </p>
                <p x-show="cv.linkedin" class="flex items-center sm:justify-end gap-2">
                    <span class="break-all" x-text="cv.linkedin || 'linkedin.com/in/ahsaniqbal'"></span>
                    <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-2.8 w-2.8" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 8.76a1.49 1.49 0 1 0 0-2.98 1.49 1.49 0 0 0 0 2.98m1.39 9.74v-8.37H5.07v8.37h2.78z"/></svg>
                    </span>
                </p>
            </div>
        </div>
    </header>

    <div class="relative z-10 px-7 py-6 sm:px-10 space-y-6">
        <!-- About Me (Full Width) -->
        <section class="space-y-1.5">
            <div class="flex items-center gap-2 text-[#059669]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <h2 class="text-xs font-black uppercase tracking-wider text-slate-800">About Me</h2>
            </div>
            <p class="text-[.68rem] leading-relaxed text-slate-600" x-text="cv.summary || 'Detail-oriented Data Analyst with experience in analyzing datasets, creating dashboards and generating insights to support business decisions.'"></p>
        </section>

        <!-- Two Column Main Body -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
            <!-- Left Sub-column: Education & Skills -->
            <div class="space-y-5">
                <!-- Education -->
                <section class="space-y-2">
                    <div class="flex items-center gap-2 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-800">Education</h2>
                    </div>
                    <div class="space-y-2">
                        <template x-for="item in cv.education" :key="item.id">
                            <div x-show="item.degree || item.institution" class="space-y-0.5">
                                <h3 class="text-[.72rem] font-bold text-slate-900" x-text="item.degree || 'BS Statistics'"></h3>
                                <p class="text-[.65rem] text-slate-700" x-text="item.institution || 'Quaid-i-Azam University'"></p>
                                <p class="text-[.6rem] text-slate-500" x-text="[item.startYear && item.endYear ? `${item.startYear} – ${item.endYear}` : (item.startYear || item.endYear), item.obtainedMarks || item.percentage ? `CGPA: ${item.obtainedMarks || item.percentage}` : ''].filter(Boolean).join(' | ')"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Skills (Progress Bars) -->
                <section class="space-y-2">
                    <div class="flex items-center gap-2 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-800">Skills</h2>
                    </div>
                    <div class="space-y-2">
                        <template x-for="item in (cv.skills.length ? cv.skills : [{name: 'Excel'}, {name: 'SQL'}, {name: 'Python'}, {name: 'Power BI'}, {name: 'Data Visualization'}, {name: 'Statistics'}, {name: 'Machine Learning'}])" :key="'skill-' + (item.id || item.name)">
                            <div x-show="item.name" class="space-y-1">
                                <div class="flex justify-between text-[.62rem] font-semibold text-slate-700">
                                    <span x-text="item.name"></span>
                                </div>
                                <div class="h-1.5 w-full rounded-full bg-slate-200 overflow-hidden">
                                    <div class="h-full rounded-full bg-[#10b981]" :style="`width: ${item.level === 'Expert' ? '95%' : item.level === 'Advanced' ? '85%' : item.level === 'Intermediate' ? '70%' : '80%'}`"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </section>
            </div>

            <!-- Right Sub-column: Experience & Projects -->
            <div class="space-y-5">
                <!-- Experience -->
                <section class="space-y-2">
                    <div class="flex items-center gap-2 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-800">Experience</h2>
                    </div>
                    <div class="space-y-2.5">
                        <template x-for="item in cv.experience" :key="item.id">
                            <div x-show="item.position || item.company" class="space-y-0.5">
                                <h3 class="text-[.72rem] font-bold text-slate-900" x-text="item.position || 'Data Analyst Intern'"></h3>
                                <p class="text-[.62rem] font-semibold text-[#059669]" x-text="[item.company || 'Data Insights Pvt. Ltd.', [item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' – ')].filter(Boolean).join(' | ')"></p>
                                <p x-show="item.description" class="text-[.64rem] leading-relaxed text-slate-600 whitespace-pre-line" x-text="item.description || '• Analyzed large datasets to identify trends.\n• Created dashboards using Power BI.\n• Generated reports for stakeholders.'"></p>
                            </div>
                        </template>
                    </div>
                </section>

                <!-- Projects -->
                <section class="space-y-2">
                    <div class="flex items-center gap-2 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                        <h2 class="text-xs font-black uppercase tracking-wider text-slate-800">Projects</h2>
                    </div>
                    <div class="space-y-2">
                        <template x-for="item in (cv.projects.length ? cv.projects : [{name: 'Sales Dashboard', description: 'Created an interactive sales dashboard using Power BI.'}, {name: 'Customer Segmentation', description: 'Performed customer segmentation using Python.'}])" :key="'proj-' + (item.id || item.name)">
                            <div x-show="item.name" class="space-y-0.5">
                                <h3 class="text-[.7rem] font-bold text-slate-900" x-text="item.name"></h3>
                                <p x-show="item.description" class="text-[.63rem] text-slate-600" x-text="item.description"></p>
                            </div>
                        </template>
                    </div>
                </section>
            </div>
        </div>

        <!-- Key Skills / Expertise Cards -->
        <section class="space-y-2.5 border-t border-slate-100 pt-5">
            <h2 class="text-xs font-black uppercase tracking-wider text-slate-800">Key Skills / Expertise</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center">
                <div class="rounded-xl border border-emerald-200 bg-emerald-50/40 p-2.5">
                    <div class="mx-auto flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <p class="mt-1.5 text-[.6rem] font-bold text-slate-800">Analytical Thinking</p>
                </div>
                <div class="rounded-xl border border-emerald-200 bg-emerald-50/40 p-2.5">
                    <div class="mx-auto flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <p class="mt-1.5 text-[.6rem] font-bold text-slate-800">Problem Solving</p>
                </div>
                <div class="rounded-xl border border-emerald-200 bg-emerald-50/40 p-2.5">
                    <div class="mx-auto flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <p class="mt-1.5 text-[.6rem] font-bold text-slate-800">Attention to Detail</p>
                </div>
                <div class="rounded-xl border border-emerald-200 bg-emerald-50/40 p-2.5">
                    <div class="mx-auto flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-[#059669]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <p class="mt-1.5 text-[.6rem] font-bold text-slate-800">Effective Communication</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Soft Green Curved Wave Footer -->
    <footer class="pointer-events-none relative h-12 w-full overflow-hidden" aria-hidden="true">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="h-full w-full">
            <path d="M0.00,49.98 C150.00,150.00 350.00,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" class="fill-[#10b981]/15"></path>
            <path d="M0.00,80.00 C200.00,140.00 300.00,20.00 500.00,90.00 L500.00,150.00 L0.00,150.00 Z" class="fill-[#059669]/25"></path>
        </svg>
    </footer>
</article>
