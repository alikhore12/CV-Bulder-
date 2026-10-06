<article id="cv-preview" class="tp-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <div class="tp-accent-bar relative z-10 h-1.5 bg-[#1e3a8a]"></div>

    <header class="tp-header relative z-10 px-7 pb-5 pt-7 sm:px-10">
        <div class="flex items-center gap-5">
            <div class="grid h-20 w-20 shrink-0 place-items-center overflow-hidden rounded-2xl bg-[#e2e8f0] text-2xl font-black text-[#1e3a8a]">
                <template x-if="cv.photo"><img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover"></template>
                <span x-show="!cv.photo" x-text="initials()"></span>
            </div>
            <div class="min-w-0">
                <p class="mb-1.5 text-[.6rem] font-bold uppercase tracking-[.22em] text-[#1e3a8a]" x-text="cv.headline || 'Professional title'"></p>
                <h2 class="break-words text-3xl font-extrabold leading-tight text-[#1e293b]" x-text="cv.name || 'Your Name'"></h2>
            </div>
        </div>
    </header>

    <div class="tp-body relative z-10 space-y-3 px-7 pb-7 sm:px-10">
        <section class="tp-card">
            <h3 class="tp-heading">About Me</h3>
            <p class="tp-copy" x-text="cv.summary || 'Your professional summary will appear here. Tell employers what makes you valuable and what you are looking for next.'"></p>
        </section>

        <section class="tp-card">
            <h3 class="tp-heading">Education</h3>
            <div class="space-y-3.5">
                <template x-for="item in cv.education" :key="item.id">
                    <div x-show="item.degree || item.institution">
                        <p class="tp-title" x-text="[item.degree, item.field].filter(Boolean).join(' / ') || 'Degree name'"></p>
                        <p class="tp-meta" x-text="[item.institution, [item.startYear, item.endYear].filter(Boolean).join(' – ')].filter(Boolean).join(' · ')"></p>
                        <p x-show="item.totalMarks || item.obtainedMarks || item.percentage" class="tp-meta" x-text="[['Obtained', item.obtainedMarks], ['Total', item.totalMarks], ['Percentage', item.percentage]].filter(pair => pair[1]).map(pair => pair.join(': ')).join(' · ')"></p>
                        <p x-show="item.description" class="tp-copy mt-1" x-text="item.description"></p>
                    </div>
                </template>
                <p x-show="!cv.education.some(item => item.degree || item.institution)" class="tp-copy text-slate-400">Your education history will appear here.</p>
            </div>
        </section>

        <section class="tp-card">
            <h3 class="tp-heading">Experience</h3>
            <div class="space-y-3.5">
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

        <section class="tp-card" x-show="skillList().length">
            <h3 class="tp-heading">Skills</h3>
            <div class="flex flex-wrap gap-1.5">
                <template x-for="skill in skillList()" :key="'skill-' + skill"><span class="tp-tag" x-text="skill"></span></template>
            </div>
        </section>

        <section class="tp-card" x-show="cv.certifications.some(item => item.name)">
            <h3 class="tp-heading">Certifications</h3>
            <div class="space-y-2.5">
                <template x-for="item in cv.certifications" :key="item.id"><div x-show="item.name"><p class="tp-title" x-text="item.name"></p><p class="tp-meta" x-text="[item.organization, item.date].filter(Boolean).join(' · ')"></p></div></template>
            </div>
        </section>

        <section class="tp-card" x-show="cv.languages.some(item => item.name)">
            <h3 class="tp-heading">Languages</h3>
            <p class="tp-copy"><template x-for="(item, index) in cv.languages" :key="item.id"><span x-show="item.name"><b class="text-[#1e3a8a]" x-text="item.name"></b><span x-text="(item.proficiency || item.level) ? ' · ' + (item.proficiency || item.level) : ''"></span><span x-show="index < cv.languages.length - 1">, </span></span></template></p>
        </section>

        <section class="tp-card" x-show="cv.fullAddress || cv.fatherName || cv.domicile || cv.dateOfBirth || cv.cinicNumber">
            <h3 class="tp-heading">Personal details</h3>
            <div class="space-y-1 text-[.66rem] text-slate-600">
                <p x-show="cv.fullAddress"><b class="text-[#1e3a8a]">Address:</b> <span x-text="cv.fullAddress"></span></p>
                <p x-show="cv.fatherName"><b class="text-[#1e3a8a]">Father name:</b> <span x-text="cv.fatherName"></span></p>
                <p x-show="cv.domicile"><b class="text-[#1e3a8a]">Domicile:</b> <span x-text="cv.domicile"></span></p>
                <p x-show="cv.dateOfBirth"><b class="text-[#1e3a8a]">Date of birth:</b> <span x-text="cv.dateOfBirth"></span></p>
                <p x-show="cv.cinicNumber"><b class="text-[#1e3a8a]">CNIC / ID:</b> <span x-text="cv.cinicNumber"></span></p>
            </div>
        </section>
    </div>

    <footer class="tp-footer relative z-10 h-1.5 bg-[#1e3a8a]"></footer>
</article>