<article id="cv-preview" class="tp-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <header class="tp-header relative z-10 overflow-hidden bg-[#0a2c4f] px-7 py-8 text-white sm:px-10">
        <div class="tp-shape tp-shape-one"></div>
        <div class="tp-shape tp-shape-two"></div>
        <div class="relative z-10 flex items-center gap-5">
            <div class="grid h-24 w-24 shrink-0 place-items-center overflow-hidden rounded-full border-4 border-white/80 bg-white/10 text-3xl font-bold text-white">
                <template x-if="cv.photo"><img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover"></template>
                <span x-show="!cv.photo" x-text="initials()"></span>
            </div>
            <div class="min-w-0">
                <p class="mb-2 text-xs font-bold uppercase tracking-[.2em] text-blue-200" x-text="cv.headline || 'Professional title'"></p>
                <h2 class="break-words text-3xl font-black leading-tight sm:text-4xl" x-text="cv.name || 'Your Name'"></h2>
                <div class="mt-3 h-1 w-14 rounded-full bg-[#0d6efd]"></div>
            </div>
        </div>
    </header>

    <div class="tp-body relative z-10 grid grid-cols-1 gap-0 px-7 py-7 sm:grid-cols-[.78fr_1.22fr] sm:px-10">
        <div class="tp-sidebar space-y-6 border-b border-slate-200 pb-6 sm:border-b-0 sm:border-r sm:pr-7">
            <section>
                <h3 class="tp-heading">Profile</h3>
                <p class="tp-copy" x-text="cv.summary || 'Your professional summary will appear here. Tell employers what makes you valuable and what you are looking for next.'"></p>
            </section>

            <section>
                <h3 class="tp-heading">Contact</h3>
                <div class="space-y-2.5 text-[11px] text-slate-600">
                    <p x-show="cv.phone" class="flex gap-2"><span class="tp-accent">&#9742;</span><span x-text="cv.phone"></span></p>
                    <p x-show="cv.email" class="flex gap-2 break-all"><span class="tp-accent">&#9993;</span><span x-text="cv.email"></span></p>
                    <p x-show="cv.location" class="flex gap-2"><span class="tp-accent">&#9673;</span><span x-text="cv.location"></span></p>
                    <p x-show="cv.website" class="flex gap-2 break-all"><span class="tp-accent">&#9678;</span><span x-text="cv.website"></span></p>
                    <p x-show="cv.linkedin" class="flex gap-2 break-all"><span class="tp-accent">in</span><span x-text="cv.linkedin"></span></p>
                    <p x-show="cv.github" class="flex gap-2 break-all"><span class="tp-accent">GH</span><span x-text="cv.github"></span></p>
                    <p x-show="!cv.phone && !cv.email && !cv.location && !cv.website && !cv.linkedin && !cv.github" class="text-slate-400">Add your contact details.</p>
                </div>
            </section>

            <section>
                <h3 class="tp-heading">Personal details</h3>
                <div aria-live="polite" class="space-y-1.5 text-[11px] text-slate-600">
                    <p x-show="cv.fullAddress"><b>Address:</b> <span x-text="cv.fullAddress"></span></p>
                    <p x-show="cv.fatherName"><b>Father name:</b> <span x-text="cv.fatherName"></span></p>
                    <p x-show="cv.domicile"><b>Domicile:</b> <span x-text="cv.domicile"></span></p>
                    <p x-show="cv.dateOfBirth"><b>Date of birth:</b> <span x-text="cv.dateOfBirth"></span></p>
                    <p x-show="cv.cnicNumber"><b>CNIC / ID:</b> <span x-text="cv.cnicNumber"></span></p>
                    <p x-show="!cv.fullAddress && !cv.fatherName && !cv.domicile && !cv.dateOfBirth && !cv.cnicNumber" class="text-slate-400">Personal details will appear here.</p>
                </div>
            </section>

            <section>
                <h3 class="tp-heading">Skills</h3>
                <div class="grid grid-cols-1 gap-2 text-[11px] text-slate-600 sm:grid-cols-2">
                    <template x-for="skill in skillList()" :key="'skill-' + skill"><span class="flex gap-2"><b class="tp-accent">&#10003;</b><span x-text="skill"></span></span></template>
                    <p x-show="!skillList().length" class="text-slate-400">Skills will appear here.</p>
                </div>
            </section>

            <section x-show="cv.languages.some(item => item.name)">
                <h3 class="tp-heading">Languages</h3>
                <div class="space-y-2 text-[11px] text-slate-600">
                    <template x-for="item in cv.languages" :key="item.id"><p x-show="item.name"><span class="font-bold text-slate-700" x-text="item.name"></span><span class="block text-slate-400" x-text="item.proficiency || item.level"></span></p></template>
                </div>
            </section>
        </div>

        <div class="space-y-6 pt-6 sm:pl-7 sm:pt-0">
            <section>
                <h3 class="tp-heading">Education</h3>
                <div class="space-y-4">
                    <template x-for="item in cv.education" :key="item.id">
                        <div x-show="item.degree || item.institution">
                            <p class="tp-title" x-text="[item.degree, item.field].filter(Boolean).join(' / ') || 'Degree name'"></p>
                            <p class="tp-meta" x-text="[item.institution, [item.startYear, item.endYear].filter(Boolean).join(' – ')].filter(Boolean).join(' · ')"></p>
                            <p x-show="item.totalMarks || item.obtainedMarks || item.percentage" class="tp-meta">
                                <span x-text="[['Obtained', item.obtainedMarks], ['Total', item.totalMarks], ['Percentage', item.percentage]].filter(pair => pair[1]).map(pair => pair.join(': ')).join(' · ')"></span>
                            </p>
                            <p x-show="item.description" class="tp-copy mt-1" x-text="item.description"></p>
                        </div>
                    </template>
                    <p x-show="!cv.education.some(item => item.degree || item.institution)" class="tp-copy text-slate-400">Your education history will appear here.</p>
                </div>
            </section>

            <section>
                <h3 class="tp-heading">Experience</h3>
                <div class="space-y-4">
                    <template x-for="item in cv.experience" :key="item.id">
                        <div x-show="item.position || item.company">
                            <p class="tp-title" x-text="item.position || 'Job position'"></p>
                            <p class="tp-meta" x-text="[item.company, item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' · ')"></p>
                            <p x-show="item.description" class="tp-copy mt-1 whitespace-pre-line" x-text="item.description"></p>
                        </div>
                    </template>
                    <p x-show="!cv.experience.some(item => item.position || item.company)" class="tp-copy text-slate-400">Your work experience will appear here.</p>
                </div>
            </section>

            <section x-show="cv.projects.some(item => item.name)">
                <h3 class="tp-heading">Projects</h3>
                <div class="space-y-4"><template x-for="item in cv.projects" :key="item.id"><div x-show="item.name"><p class="tp-title" x-text="item.name"></p><p class="tp-meta" x-text="[item.role, item.technologies].filter(Boolean).join(' · ')"></p><p x-show="item.description" class="tp-copy mt-1 whitespace-pre-line" x-text="item.description"></p></div></template></div>
            </section>

            <section x-show="cv.certifications.some(item => item.name)">
                <h3 class="tp-heading">Certifications</h3>
                <div class="space-y-3">
                    <template x-for="item in cv.certifications" :key="item.id"><div x-show="item.name"><p class="tp-title" x-text="item.name"></p><p class="tp-meta" x-text="[item.organization, item.issueDate || item.date, item.noExpiry ? 'No expiry' : item.expiryDate].filter(Boolean).join(' · ')"></p></div></template>
                </div>
            </section>

            <section x-show="cv.settings.referenceMode === 'full' && cv.references.some(item => item.name)"><h3 class="tp-heading">References</h3><div class="space-y-3"><template x-for="item in cv.references" :key="item.id"><div x-show="item.name"><p class="tp-title" x-text="item.name"></p><p class="tp-meta" x-text="[item.position, item.company].filter(Boolean).join(' · ')"></p><p class="tp-copy" x-text="[item.email, item.phone].filter(Boolean).join(' · ')"></p></div></template></div></section>
        </div>
    </div>

    <footer class="tp-footer relative z-10"></footer>
</article>
