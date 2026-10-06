<article id="cv-preview" class="tp-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <header class="tp-header relative z-10 px-7 pb-5 pt-8 text-center sm:px-10">
        <div class="mx-auto grid h-20 w-20 place-items-center overflow-hidden rounded-full bg-stone-100 text-xl font-bold text-stone-500">
            <template x-if="cv.photo"><img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover"></template>
            <span x-show="!cv.photo" x-text="initials()"></span>
        </div>
        <p class="mt-4 text-[.58rem] font-bold uppercase tracking-[.32em] text-stone-500" x-text="cv.headline || 'Professional title'"></p>
        <h2 class="tp-name mt-1.5 break-words text-3xl font-normal tracking-wide" x-text="cv.name || 'Your Name'"></h2>
        <div class="tp-rule mx-auto"></div>
        <div class="mt-3 flex flex-wrap justify-center gap-x-3.5 gap-y-1 text-[.62rem] text-stone-600">
            <template x-for="contact in contactList()" :key="contact.label + contact.value"><span x-text="contact.value"></span></template>
            <span x-show="!contactList().length" class="text-stone-400">Add your contact details.</span>
        </div>
    </header>

    <div class="tp-body relative z-10 space-y-5 px-7 pb-8 sm:px-10">
        <section>
            <h3 class="tp-heading">Profile</h3>
            <p class="tp-summary" x-text="cv.summary || 'Your professional summary will appear here. Tell employers what makes you valuable and what you are looking for next.'"></p>
        </section>

        <section>
            <h3 class="tp-heading">Education</h3>
            <div class="space-y-3">
                <template x-for="item in cv.education" :key="item.id">
                    <div x-show="item.degree || item.institution">
                        <p class="tp-item-title" x-text="[item.degree, item.field].filter(Boolean).join(' / ') || 'Degree name'"></p>
                        <p class="tp-meta" x-text="[item.institution, [item.startYear, item.endYear].filter(Boolean).join(' – ')].filter(Boolean).join(' · ')"></p>
                        <p x-show="item.totalMarks || item.obtainedMarks || item.percentage" class="tp-meta" x-text="[['Obtained', item.obtainedMarks], ['Total', item.totalMarks], ['Percentage', item.percentage]].filter(pair => pair[1]).map(pair => pair.join(': ')).join(' · ')"></p>
                        <p x-show="item.description" class="tp-copy mt-1" x-text="item.description"></p>
                    </div>
                </template>
                <p x-show="!cv.education.some(item => item.degree || item.institution)" class="tp-copy text-stone-400">Your education history will appear here.</p>
            </div>
        </section>

        <section>
            <h3 class="tp-heading">Experience</h3>
            <div class="space-y-3">
                <template x-for="item in cv.experience" :key="item.id">
                    <div x-show="item.position || item.company">
                        <p class="tp-item-title" x-text="item.position || 'Job position'"></p>
                        <p class="tp-meta" x-text="[item.company, item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' · ')"></p>
                        <p x-show="item.description" class="tp-copy mt-1 whitespace-pre-line" x-text="item.description"></p>
                    </div>
                </template>
                <p x-show="!cv.experience.some(item => item.position || item.company)" class="tp-copy text-stone-400">Your work experience will appear here.</p>
            </div>
        </section>

        <section class="tp-columns grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div>
                <h3 class="tp-heading">Skills</h3>
                <div class="flex flex-wrap gap-x-3.5 gap-y-1">
                    <template x-for="skill in skillList()" :key="'skill-' + skill"><span class="tp-copy text-stone-800" x-text="skill"></span></template>
                    <p x-show="!skillList().length" class="tp-copy text-stone-400">Add your strengths.</p>
                </div>
            </div>
            <div>
                <h3 class="tp-heading">Languages</h3>
                <template x-for="item in cv.languages" :key="item.id"><p x-show="item.name" class="tp-copy"><b class="text-stone-900" x-text="item.name"></b><span x-text="(item.proficiency || item.level) ? ' · ' + (item.proficiency || item.level) : ''"></span></p></template>
                <p x-show="!cv.languages.some(item => item.name)" class="tp-copy text-stone-400">Add your languages.</p>
            </div>
        </section>

        <section x-show="cv.certifications.some(item => item.name)">
            <h3 class="tp-heading">Certifications</h3>
            <template x-for="item in cv.certifications" :key="item.id"><div x-show="item.name"><p class="tp-item-title" x-text="item.name"></p><p class="tp-meta" x-text="[item.organization, item.date].filter(Boolean).join(' · ')"></p></div></template>
        </section>

        <section x-show="cv.fullAddress || cv.fatherName || cv.domicile || cv.dateOfBirth || cv.cnicNumber">
            <h3 class="tp-heading">Personal details</h3>
            <div class="tp-copy grid grid-cols-1 gap-x-6 sm:grid-cols-2">
                <p x-show="cv.fullAddress"><b>Address:</b> <span x-text="cv.fullAddress"></span></p>
                <p x-show="cv.fatherName"><b>Father name:</b> <span x-text="cv.fatherName"></span></p>
                <p x-show="cv.domicile"><b>Domicile:</b> <span x-text="cv.domicile"></span></p>
                <p x-show="cv.dateOfBirth"><b>Date of birth:</b> <span x-text="cv.dateOfBirth"></span></p>
                <p x-show="cv.cnicNumber"><b>CNIC / ID:</b> <span x-text="cv.cnicNumber"></span></p>
            </div>
        </section>
    </div>

    <footer class="tp-footer relative z-10 mx-7 mb-6 h-px bg-stone-300 sm:mx-10"></footer>
</article>
