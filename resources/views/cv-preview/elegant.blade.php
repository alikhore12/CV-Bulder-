<article id="cv-preview" class="tp-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>

    <div class="tp-frame relative z-10 m-3 border border-[#c9a227] p-5 sm:p-7">
        <header class="tp-header border-b-2 border-gray-800 pb-5 text-center">
            <div class="mx-auto grid h-[88px] w-[88px] place-items-center overflow-hidden rounded-full border-2 border-[#c9a227] bg-amber-50 text-xl font-bold text-amber-800">
                <template x-if="cv.photo"><img :src="cv.photo" alt="Profile photo" class="h-full w-full object-cover"></template>
                <span x-show="!cv.photo" x-text="initials()"></span>
            </div>
            <p class="mt-3.5 text-[.56rem] font-bold uppercase tracking-[.34em] text-[#a1801a]" x-text="cv.headline || 'Professional title'"></p>
            <h2 class="tp-name mt-1.5 break-words text-[1.85rem] font-bold tracking-wide" x-text="cv.name || 'Your Name'"></h2>
            <div class="mt-2.5 flex flex-wrap justify-center gap-x-3.5 gap-y-1 text-[.6rem] text-zinc-600">
                <template x-for="contact in contactList()" :key="contact.label + contact.value"><span x-text="contact.value"></span></template>
                <span x-show="!contactList().length" class="text-stone-400">Add your contact details.</span>
            </div>
        </header>

        <div class="tp-body mt-5 space-y-4.5">
            <section>
                <h3 class="tp-heading"><span class="tp-diamond">&#9670;</span> Profile</h3>
                <div class="tp-rule"></div>
                <p class="tp-summary" x-text="cv.summary || 'Your professional summary will appear here. Tell employers what makes you valuable and what you are looking for next.'"></p>
            </section>

            <section>
                <h3 class="tp-heading"><span class="tp-diamond">&#9670;</span> Education</h3>
                <div class="tp-rule"></div>
                <div class="space-y-2.5">
                    <template x-for="item in cv.education" :key="item.id">
                        <div class="tp-item" x-show="item.degree || item.institution">
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
                <h3 class="tp-heading"><span class="tp-diamond">&#9670;</span> Experience</h3>
                <div class="tp-rule"></div>
                <div class="space-y-2.5">
                    <template x-for="item in cv.experience" :key="item.id">
                        <div class="tp-item" x-show="item.position || item.company">
                            <p class="tp-item-title" x-text="item.position || 'Job position'"></p>
                            <p class="tp-meta" x-text="[item.company, item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' · ')"></p>
                            <p x-show="item.description" class="tp-copy mt-1 whitespace-pre-line" x-text="item.description"></p>
                        </div>
                    </template>
                    <p x-show="!cv.experience.some(item => item.position || item.company)" class="tp-copy text-stone-400">Your work experience will appear here.</p>
                </div>
            </section>

            <section x-show="skillList().length">
                <h3 class="tp-heading"><span class="tp-diamond">&#9670;</span> Skills</h3>
                <div class="tp-rule"></div>
                <div class="flex flex-wrap gap-1.5">
                    <template x-for="skill in skillList()" :key="'skill-' + skill"><span class="tp-tag" x-text="skill"></span></template>
                </div>
            </section>

            <section>
                <h3 class="tp-heading"><span class="tp-diamond">&#9670;</span> Languages &amp; Certifications</h3>
                <div class="tp-rule"></div>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div>
                        <template x-for="item in cv.languages" :key="item.id"><p x-show="item.name" class="tp-copy"><b class="text-gray-900" x-text="item.name"></b><span x-text="(item.proficiency || item.level) ? ' · ' + (item.proficiency || item.level) : ''"></span></p></template>
                        <p x-show="!cv.languages.some(item => item.name)" class="tp-copy text-stone-400">Add your languages.</p>
                    </div>
                    <div>
                        <template x-for="item in cv.certifications" :key="item.id"><p x-show="item.name" class="tp-copy"><b class="text-gray-900" x-text="item.name"></b><span x-text="[item.organization, item.date].filter(Boolean).join(' · ')"></span></p></template>
                        <p x-show="!cv.certifications.some(item => item.name)" class="tp-copy text-stone-400">Add your certifications.</p>
                    </div>
                </div>
            </section>

            <section x-show="cv.fullAddress || cv.fatherName || cv.domicile || cv.dateOfBirth || cv.cnicNumber">
                <h3 class="tp-heading"><span class="tp-diamond">&#9670;</span> Personal details</h3>
                <div class="tp-rule"></div>
                <div class="tp-copy grid grid-cols-1 gap-x-6 sm:grid-cols-3">
                    <p x-show="cv.fullAddress"><b>Address:</b> <span x-text="cv.fullAddress"></span></p>
                    <p x-show="cv.fatherName"><b>Father:</b> <span x-text="cv.fatherName"></span></p>
                    <p x-show="cv.domicile"><b>Domicile:</b> <span x-text="cv.domicile"></span></p>
                    <p x-show="cv.dateOfBirth"><b>Born:</b> <span x-text="cv.dateOfBirth"></span></p>
                    <p x-show="cv.cnicNumber"><b>CNIC / ID:</b> <span x-text="cv.cnicNumber"></span></p>
                </div>
            </section>
        </div>
    </div>

    <footer class="tp-footer relative z-10 pb-4 text-center text-[.55rem] font-bold uppercase tracking-[.24em] text-[#a1801a]"><span x-text="(cv.name || 'Your Name') + ' · Curriculum Vitae'"></span></footer>
</article>
