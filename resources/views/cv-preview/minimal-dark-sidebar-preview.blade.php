<article id="cv-preview" class="tp-paper relative overflow-hidden bg-white shadow-xl ring-1 ring-slate-200">
    <div class="tp-watermark" aria-hidden="true"><span x-text="((cv.name || 'Your Name').trim()) + ' CV'"></span></div>
    <div class="tp-accent-bar relative z-10 h-1.5 bg-[#222B38]"></div>
    <header class="tp-header relative z-10 px-7 pb-5 pt-7 sm:px-10 text-center">
        <div class="profile" x-show="cv.photo"><img :src="cv.photo" alt="Profile photo" class="h-32 w-32 rounded-3xl mx-auto mb-4 object-cover border-4 border-gray-300"></div>
        <div class="title" x-text="cv.headline || 'Professional title'"></div>
        <h1 class="tp-name" x-text="cv.name || 'Your Name'"></h1>
    </header>
    <div class="tp-body relative z-10 space-y-3 px-7 pb-7 sm:px-10">
        <section class="section"><h3 class="tp-heading">Professional Summary</h3><p class="tp-summary" x-text="cv.summary || 'Your professional summary will appear here.'"></p></section>
        <section class="section"><h3 class="tp-heading">Education</h3>
            <table>
                <template x-for="item in cv.education" :key="item.id">
                    <template x-show="item.degree || item.institution">
                        <tr><th class="tp-copy" x-text="'Degree: '"></th><td class="tp-copy" x-text="[item.degree, item.field].filter(Boolean).join(' / ') || 'Degree name'"></td></tr>
                        <tr><th class="tp-copy" x-text="'Institution: '"></th><td class="tp-copy" x-text="item.institution || ''"></td></tr>
                        <tr x-show="item.startYear || item.endYear"><th class="tp-copy" x-text="'Year: '"></th><td class="tp-copy" x-text="[item.startYear, item.endYear].filter(Boolean).join(' – ') || ''"></td></tr>
                        <tr x-show="item.totalMarks || item.obtainedMarks || item.percentage"><th class="tp-copy" x-text="'CGPA: '"></th><td class="tp-copy" x-text="[['Obtained', item.obtainedMarks], ['Total', item.totalMarks], ['Percentage', item.percentage]].filter(pair => pair[1]).map(pair => pair.join(': ')).join(' · ')"></td></tr>
                        <tr x-show="item.description"><th></th><td class="tp-copy mt-1" x-text="item.description"></td></tr>
                    </template>
                </template>
            </table>
        </section>
        <section class="section"><h3 class="tp-heading">Experience</h3>
            <template x-for="item in cv.experience" :key="item.id">
                <div x-show="item.position || item.company" class="tp-item">
                    <p class="tp-item-title" x-text="item.position || 'Job position'"></p>
                    <p class="tp-meta" x-text="[item.company, item.startDate, item.current ? 'Present' : item.endDate].filter(Boolean).join(' · ')"></p>
                    <p x-show="item.description" class="tp-copy mt-1 whitespace-pre-line" x-text="item.description"></p>
                </div>
            </template>
            <template x-show="!cv.experience.some(item => item.position || item.company)"><p class="tp-copy text-slate-400">Your work experience will appear here.</p></template>
        </section>
        <section class="section"><h3 class="tp-heading">Skills</h3>
            <div class="skills"><template x-for="skill in skillList()" :key="'skill-'+skill"><span class="tp-skill" x-text="skill"></span></template></div></section>
        <section class="section"><h3 class="tp-heading">Projects</h3>
            <template x-for="item in cv.projects" :key="item.id">
                <div x-show="item.name" class="tp-item">
                    <p class="tp-title" x-text="item.name"></p>
                    <p class="tp-meta" x-text="[item.technologies].filter(Boolean).join(' / ') || ''"></p>
                    <p x-show="item.description" class="tp-copy mt-1 whitespace-pre-line" x-text="item.description"></p>
                </div>
            </template>
        </section>
        <section class="section"><h3 class="tp-heading">Hobbies</h3>
            <ul class="tp-hobbies"><template x-for="hobby in cv.hobbies" :key="hobby"><li x-text="hobby"></li></template></ul></section>
        <section class="section"><h3 class="tp-heading">Certificates</h3>
            <template x-for="item in cv.certifications" :key="item.id">
                <div x-show="item.name" class="tp-item">
                    <p class="tp-title" x-text="item.name"></p>
                    <p class="tp-meta" x-text="[item.organization, item.date].filter(Boolean).join(' · ') || ''"></p>
                </div>
            </template>
        </section>
    </div>
</article>