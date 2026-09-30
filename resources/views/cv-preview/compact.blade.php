<article id="cv-preview" class="tp-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <header class="tp-header relative z-10 bg-[#164e63] px-6 py-5 text-white sm:px-8">
        <div class="flex items-center gap-4">
            <div class="grid h-16 w-16 shrink-0 place-items-center overflow-hidden rounded-md border-2 border-[#67e8f9] bg-cyan-950 text-lg font-black text-[#67e8f9]">
                <template x-if="cv.photo"><img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover"></template>
                <span x-show="!cv.photo" x-text="initials()"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[.55rem] font-bold uppercase tracking-[.2em] text-[#a5f3fc]" x-text="cv.headline || 'Professional title'"></p>
                <h2 class="tp-name mt-0.5 break-words text-2xl font-extrabold leading-tight" x-text="cv.name || 'Your Name'"></h2>
            </div>
        </div>
        <div class="mt-3 flex flex-wrap gap-x-3 gap-y-0.5 text-[.58rem] text-cyan-100">
            <template x-for="contact in contactList()" :key="contact.label + contact.value"><span><b class="text-[#67e8f9]" x-text="contact.label + ':'"></b> <span x-text="contact.value"></span></span></template>
            <span x-show="!contactList().length" class="text-cyan-300/70">Add your contact details.</span>
        </div>
    </header>

    <div class="tp-body relative z-10 grid grid-cols-1 gap-0 px-6 py-5 sm:grid-cols-[.7fr_1.3fr] sm:px-8">
        <aside class="tp-sidebar space-y-4 border-b border-slate-200 pb-4 sm:border-b-0 sm:border-r sm:pr-4">
            <section>
                <h3 class="tp-heading">Profile</h3>
                <p class="tp-copy" x-text="cv.summary || 'Your professional summary will appear here. Tell employers what makes you valuable and what you are looking for next.'"></p>
            </section>

            <section>
                <h3 class="tp-heading">Skills</h3>
                <div class="flex flex-wrap gap-1">
                    <template x-for="skill in skillList()" :key="'skill-' + skill"><span class="tp-tag" x-text="skill"></span></template>
                    <p x-show="!skillList().length" class="tp-copy text-slate-400">Add your strengths.</p>
                </div>
            </section>

            <section x-show="cv.languages.some(item => item.name)">
                <h3 class="tp-heading">Languages</h3>
                <template x-for="item in cv.languages" :key="item.id"><p x-show="item.name" class="tp-copy"><b class="text-[#164e63]" x-text="item.name"></b><span x-text="item.level ? ' ' + item.level : ''"></span></p></template>
            </section>

            <section x-show="cv.fullAddress || cv.fatherName || cv.domicile || cv.dateOfBirth || cv.cnicNumber">
                <h3 class="tp-heading">Personal details</h3>
                <table class="tp-rows w-full text-[.62rem] text-slate-600">
                    <tbody>
                        <tr x-show="cv.fullAddress"><td>Address</td><td x-text="cv.fullAddress"></td></tr>
                        <tr x-show="cv.fatherName"><td>Father name</td><td x-text="cv.fatherName"></td></tr>
                        <tr x-show="cv.domicile"><td>Domicile</td><td x-text="cv.domicile"></td></tr>
                        <tr x-show="cv.dateOfBirth"><td>Date of birth</td><td x-text="cv.dateOfBirth"></td></tr>
                        <tr x-show="cv.cnicNumber"><td>CNIC / ID</td><td x-text="cv.cnicNumber"></td></tr>
                    </tbody>
                </table>
            </section>
        </aside>

        <main class="space-y-4 pt-4 sm:pl-5 sm:pt-0">
            <section>
                <h3 class="tp-heading">Education</h3>
                <div class="space-y-2.5">
                    <template x-for="item in cv.education" :key="item.id">
                        <div x-show="item.degree || item.institution">
                            <p class="tp-title" x-text="[item.degree, item.field].filter(Boolean).join(' / ') || 'Degree name'"></p>
                            <p class="tp-meta" x-text="[item.institution, [item.startYear, item.endYear].filter(Boolean).join(' – ')].filter(Boolean).join(' · ')"></p>
                            <p x-show="item.totalMarks || item.obtainedMarks || item.percentage" class="tp-meta" x-text="[['Obtained', item.obtainedMarks], ['Total', item.totalMarks], ['Percentage', item.percentage]].filter(pair => pair[1]).map(pair => pair.join(': ')).join(' · ')"></p>
                            <p x-show="item.description" class="tp-copy mt-0.5" x-text="item.description"></p>
                        </div>
                    </template>
                    <p x-show="!cv.education.some(item => item.degree || item.institution)" class="tp-copy text-slate-400">Your education history will appear here.</p>
                </div>
            </section>

            <section>
                <h3 class="tp-heading">Experience</h3>
                <div class="space-y-2.5">
                    <template x-for="item in cv.experience" :key="item.id">
                        <div x-show="item.position || item.company">
                            <p class="tp-title" x-text="item.position || 'Job position'"></p>
                            <p class="tp-meta" x-text="[item.company, item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' · ')"></p>
                            <p x-show="item.description" class="tp-copy mt-0.5 whitespace-pre-line" x-text="item.description"></p>
                        </div>
                    </template>
                    <p x-show="!cv.experience.some(item => item.position || item.company)" class="tp-copy text-slate-400">Your work experience will appear here.</p>
                </div>
            </section>

            <section x-show="cv.certifications.some(item => item.name)">
                <h3 class="tp-heading">Certifications</h3>
                <div class="space-y-2">
                    <template x-for="item in cv.certifications" :key="item.id"><div x-show="item.name"><p class="tp-title" x-text="item.name"></p><p class="tp-meta" x-text="[item.organization, item.date].filter(Boolean).join(' · ')"></p></div></template>
                </div>
            </section>
        </main>
    </div>
</article>