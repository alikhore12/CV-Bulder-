<x-app-layout>
    <div x-data="cvBuilder(@js($templates))" x-init="loadDraft()" class="min-h-screen bg-[#f5f7fa] text-slate-900">
        <header class="border-b border-slate-200 bg-white">
            <div class="mx-auto flex max-w-[1600px] items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3"><span class="grid h-10 w-10 place-items-center rounded-xl bg-[#0d6efd] text-lg font-black text-white">CV</span><span><span class="block text-base font-extrabold tracking-tight text-[#0a2c4f]">CV Builder</span><span class="hidden text-xs text-slate-500 sm:block">Professional resumes, made simple</span></span></a>
                <div class="flex items-center gap-2 sm:gap-3"><span class="hidden text-xs font-medium text-slate-500 sm:inline" x-text="saved ? 'Draft saved' : 'Unsaved changes'"></span><button type="button" @click="saveDraft()" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 hover:border-[#0d6efd] hover:text-[#0d6efd]">Save</button><button type="button" @click="downloadPdf()" :disabled="downloading" class="rounded-lg bg-[#0d6efd] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#0b5ed7] disabled:cursor-wait disabled:opacity-60" x-text="downloading ? 'Preparing...' : 'Download CV'"></button></div>
            </div>
        </header>
        <main class="mx-auto max-w-[1600px] px-4 py-6 sm:px-6 lg:px-8">
            <div class="mb-6 flex flex-wrap items-end justify-between gap-4"><div><p class="mb-1 text-sm font-bold uppercase tracking-[.18em] text-[#0d6efd]">CV builder</p><h1 class="text-2xl font-extrabold tracking-tight text-[#0a2c4f] sm:text-3xl">Build your professional CV</h1><p class="mt-1 text-sm text-slate-500">Complete the sections below and watch your resume update instantly.</p></div><div class="flex items-center gap-2"><button type="button" @click="window.print()" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Print CV</button><button type="button" @click="resetCv()" class="rounded-lg border border-rose-200 bg-white px-3 py-2 text-sm font-semibold text-rose-600 hover:bg-rose-50">Reset</button></div></div>
            <div class="grid items-start gap-8 lg:grid-cols-[minmax(0,0.92fr)_minmax(520px,1.08fr)]">
                <form @input="saved = false" @submit.prevent="saveDraft" class="space-y-4">
                    <section x-data="{ open: false }" class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"><button type="button" @click="open = !open" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left hover:bg-slate-50" :aria-expanded="open"><span class="flex items-center gap-3"><span class="grid h-8 w-8 place-items-center rounded-lg bg-blue-50 text-sm font-extrabold text-[#0d6efd]">02</span><span><span class="block text-sm font-bold text-[#0a2c4f]">Other information</span><span class="block text-xs text-slate-500">Additional personal details</span></span></span><span class="text-lg text-slate-400" x-text="open ? '−' : '+'"></span></button><div x-show="open" class="grid gap-4 border-t border-slate-100 px-5 pb-5 pt-5 sm:grid-cols-2"><div class="sm:col-span-2"><label class="field-label" for="full_address">Full address</label><input id="full_address" x-model="cv.fullAddress" class="field" placeholder="House, street, city, country"></div><div><label class="field-label" for="father_name">Father name</label><input id="father_name" x-model="cv.fatherName" class="field" placeholder="e.g. Muhammad Ahmed"></div><div><label class="field-label" for="domicile">Domicile</label><input id="domicile" x-model="cv.domicile" class="field" placeholder="e.g. Lahore"></div><div><label class="field-label" for="date_of_birth">Date of birth</label><input id="date_of_birth" type="date" x-model="cv.dateOfBirth" class="field"></div><div><label class="field-label" for="cnic_number">CNIC / ID number</label><input id="cnic_number" x-model="cv.cnicNumber" class="field" placeholder="35202-1234567-1"></div></div></section>
                    <template x-for="section in sections" :key="section.id"><section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"><button type="button" @click="section.open = !section.open" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left hover:bg-slate-50" :aria-expanded="section.open"><span class="flex items-center gap-3"><span class="grid h-8 w-8 place-items-center rounded-lg bg-blue-50 text-sm font-extrabold text-[#0d6efd]" x-text="section.number"></span><span><span class="block text-sm font-bold text-[#0a2c4f]" x-text="section.title"></span><span class="block text-xs text-slate-500" x-text="section.subtitle"></span></span></span><span class="text-lg text-slate-400" x-text="section.open ? '−' : '+'"></span></button><div x-show="section.open" class="border-t border-slate-100 px-5 pb-5 pt-5">
                        <template x-if="section.id === 'personal'"><div class="grid gap-4 sm:grid-cols-2"><div class="sm:col-span-2"><label class="field-label" for="full_name">Full name</label><input id="full_name" x-model="cv.name" class="field" placeholder="e.g. John Doe"></div><div><label class="field-label" for="headline">Professional title</label><input id="headline" x-model="cv.headline" class="field" placeholder="e.g. Product Designer"></div><div><label class="field-label" for="location">City, country</label><input id="location" x-model="cv.location" class="field" placeholder="e.g. Lahore, Pakistan"></div><div><label class="field-label" for="email">Email</label><input id="email" type="email" x-model="cv.email" class="field" placeholder="you@example.com"></div><div><label class="field-label" for="phone">Phone</label><input id="phone" x-model="cv.phone" class="field" placeholder="+92 300 0000000"></div><div><label class="field-label" for="website">Website</label><input id="website" x-model="cv.website" class="field" placeholder="www.yourwebsite.com"></div><div><label class="field-label" for="linkedin">LinkedIn</label><input id="linkedin" x-model="cv.linkedin" class="field" placeholder="linkedin.com/in/yourname"></div><div class="sm:col-span-2"><label class="field-label" for="profile_photo">Profile photo <span class="font-normal text-slate-400">(optional, JPG/PNG)</span></label><div class="mt-2 flex items-center gap-4"><div class="grid h-16 w-16 shrink-0 place-items-center overflow-hidden rounded-full border-2 border-dashed border-slate-300 bg-slate-50"><template x-if="cv.photo"><img :src="cv.photo" alt="Profile photo preview" class="h-full w-full object-cover"></template><span x-show="!cv.photo" class="text-2xl text-slate-300">+</span></div><input id="profile_photo" type="file" accept="image/png,image/jpeg" @change="uploadPhoto($event)" class="block w-full text-sm text-slate-500 file:mr-3 file:rounded-lg file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-xs file:font-bold file:text-[#0d6efd]"></div></div></div></template>
                        <template x-if="section.id === 'summary'"><div><label class="field-label" for="summary">Professional summary</label><textarea id="summary" x-model="cv.summary" rows="5" class="field" placeholder="Write a concise summary of your experience, strengths and career goals..."></textarea><p class="mt-2 text-xs text-slate-400">Keep it to 3–5 lines for the strongest impact.</p></div></template>
                        <template x-if="section.id === 'education'"><div class="space-y-4"><template x-for="(item, index) in cv.education" :key="item.id"><div class="rounded-xl border border-slate-200 p-4"><div class="mb-4 flex items-center justify-between"><h3 class="text-sm font-bold text-[#0a2c4f]">Education <span x-text="index + 1"></span></h3><button type="button" x-show="cv.education.length > 1" @click="removeItem('education', index)" class="text-xs font-bold text-rose-600">Remove</button></div><div class="grid gap-4 sm:grid-cols-2"><div><label class="field-label">Degree</label><input x-model="item.degree" class="field" placeholder="BS Computer Science"></div><div><label class="field-label">Field / major</label><input x-model="item.field" class="field" placeholder="Software Engineering"></div><div class="sm:col-span-2"><label class="field-label">University / institution</label><input x-model="item.institution" class="field" placeholder="University name"></div><div><label class="field-label">Start year</label><input x-model="item.startYear" class="field" placeholder="2018"></div><div><label class="field-label">End year</label><input x-model="item.endYear" class="field" placeholder="2022"></div><div><label class="field-label">Total marks / credits</label><input x-model="item.totalMarks" class="field" placeholder="1100"></div><div><label class="field-label">Obtained marks / CGPA</label><input x-model="item.obtainedMarks" class="field" placeholder="920 or 3.6"></div><div><label class="field-label">Percentage</label><input x-model="item.percentage" class="field" placeholder="83.6%"></div><div class="sm:col-span-2"><label class="field-label">Description <span class="font-normal text-slate-400">(optional)</span></label><textarea x-model="item.description" rows="2" class="field" placeholder="Relevant coursework, honors or achievements"></textarea></div></div></div></template><button type="button" @click="addEducation()" class="add-button">+ Add education</button></div></template>
                        <template x-if="section.id === 'experience'"><div class="space-y-4"><template x-for="(item, index) in cv.experience" :key="item.id"><div class="rounded-xl border border-slate-200 p-4"><div class="mb-4 flex items-center justify-between"><h3 class="text-sm font-bold text-[#0a2c4f]">Experience <span x-text="index + 1"></span></h3><button type="button" x-show="cv.experience.length > 1" @click="removeItem('experience', index)" class="text-xs font-bold text-rose-600">Remove</button></div><div class="grid gap-4 sm:grid-cols-2"><div><label class="field-label">Job position</label><input x-model="item.position" class="field" placeholder="Senior Product Designer"></div><div><label class="field-label">Company name</label><input x-model="item.company" class="field" placeholder="Company name"></div><div><label class="field-label">Start date</label><input x-model="item.startDate" class="field" placeholder="Jan 2021"></div><div><label class="field-label">End date</label><input x-model="item.endDate" :disabled="item.current" class="field disabled:bg-slate-50" placeholder="Present"><label class="mt-2 flex items-center gap-2 text-xs text-slate-500"><input type="checkbox" x-model="item.current" class="rounded border-slate-300 text-[#0d6efd]"> Currently working here</label></div><div class="sm:col-span-2"><label class="field-label">Job description</label><textarea x-model="item.description" rows="3" class="field" placeholder="Describe your responsibilities and measurable achievements..."></textarea></div></div></div></template><button type="button" @click="addExperience()" class="add-button">+ Add experience</button></div></template>
                        <template x-if="section.id === 'skills'"><div><label class="field-label" for="skills">Skills <span class="font-normal text-slate-400">(separate with commas)</span></label><input id="skills" x-model="cv.skills" class="field" placeholder="Photoshop, Figma, HTML, CSS, JavaScript"><p class="mt-2 text-xs text-slate-400">Your skills will appear as a clean checklist in the preview.</p></div></template>
                        <template x-if="section.id === 'languages'"><div class="space-y-3"><template x-for="(item, index) in cv.languages" :key="item.id"><div class="grid grid-cols-[1fr_1fr_auto] gap-3"><div><label class="field-label">Language</label><input x-model="item.name" class="field" placeholder="English"></div><div><label class="field-label">Proficiency</label><input x-model="item.level" class="field" placeholder="Fluent"></div><button type="button" @click="removeItem('languages', index)" class="mt-7 px-2 text-lg text-rose-500" aria-label="Remove language">×</button></div></template><button type="button" @click="addLanguage()" class="add-button">+ Add language</button></div></template>
                        <template x-if="section.id === 'certifications'"><div class="space-y-3"><template x-for="(item, index) in cv.certifications" :key="item.id"><div class="grid gap-3 sm:grid-cols-[1fr_1fr_140px_auto]"><div><label class="field-label">Certificate name</label><input x-model="item.name" class="field" placeholder="Google UX Certificate"></div><div><label class="field-label">Organization</label><input x-model="item.organization" class="field" placeholder="Google"></div><div><label class="field-label">Date</label><input x-model="item.date" class="field" placeholder="2024"></div><button type="button" @click="removeItem('certifications', index)" class="mt-7 px-2 text-lg text-rose-500" aria-label="Remove certification">×</button></div></template><button type="button" @click="addCertification()" class="add-button">+ Add certification</button></div></template>
                    </div></section></template>
                    <div class="rounded-2xl bg-[#0a2c4f] p-5 text-white"><div class="flex items-center justify-between gap-4"><div><p class="font-bold">Your CV is always up to date</p><p class="mt-1 text-xs text-blue-100">Save your draft in this browser or download a polished PDF.</p></div><button type="submit" class="rounded-lg bg-white px-4 py-2 text-sm font-bold text-[#0a2c4f] hover:bg-blue-50">Save CV</button></div></div>
                </form>
                <aside class="lg:sticky lg:top-5">
                    <div class="mb-3 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-[#0a2c4f]">Live preview</p>
                            <p class="text-xs text-slate-500"><span x-text="activeTemplateName()"></span> &middot; A4</p>
                        </div>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-[#0d6efd]">Auto-updating</span>
                    </div>

                    <div class="mb-3 flex flex-wrap gap-1.5" role="radiogroup" aria-label="CV template">
                        <template x-for="item in templates" :key="item.slug">
                            <button type="button" role="radio" @click="setTemplate(item.slug)" :aria-checked="template === item.slug" :title="item.description"
                                class="rounded-lg border px-2.5 py-1.5 text-xs font-bold transition"
                                :class="template === item.slug ? 'border-[#0d6efd] bg-[#0d6efd] text-white' : 'border-slate-300 bg-white text-slate-600 hover:border-[#0d6efd] hover:text-[#0d6efd]'"
                                x-text="item.name"></button>
                        </template>
                    </div>

                    <div :data-cv-template="template">
                        @foreach ($templates as $templateOption)
                            <template x-if="template === @js($templateOption['slug'])">@include('cv-preview.'.$templateOption['slug'])</template>
                        @endforeach
                    </div>
                </aside>
            </div>
        </main>
    </div>
    @include('cv-preview.styles')
    <script>
        function cvBuilder(templates) {
            const blankEducation = () => ({ id: Date.now() + Math.random(), degree:'', field:'', institution:'', startYear:'', endYear:'', totalMarks:'', obtainedMarks:'', percentage:'', description:'' });
            const blankExperience = () => ({ id: Date.now() + Math.random(), position:'', company:'', startDate:'', endDate:'', current:false, description:'' });
            const blankLanguage = () => ({ id: Date.now() + Math.random(), name:'', level:'' });
            const blankCertification = () => ({ id: Date.now() + Math.random(), name:'', organization:'', date:'' });
            const contactFields = [['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin']];

            return {
                saved: false,
                downloading: false,
                templates: templates,
                template: templates.length ? templates[0].slug : 'classic',
                sections: [
                    { id: 'personal', number: '01', title: 'Personal information', subtitle: 'Your name and contact details', open: true },
                    { id: 'summary', number: '02', title: 'Profile / summary', subtitle: 'Make a strong first impression', open: true },
                    { id: 'education', number: '03', title: 'Education', subtitle: 'Your academic background', open: false },
                    { id: 'experience', number: '04', title: 'Work experience', subtitle: 'Showcase your career impact', open: false },
                    { id: 'skills', number: '05', title: 'Skills', subtitle: 'Your strongest capabilities', open: false },
                    { id: 'languages', number: '06', title: 'Languages', subtitle: 'Language proficiency', open: false },
                    { id: 'certifications', number: '07', title: 'Certifications', subtitle: 'Courses and credentials', open: false },
                ],
                cv: {
                    name: '', headline: '', location: '', email: '', phone: '', website: '', linkedin: '', photo: '', summary: '', skills: '',
                    education: [blankEducation()], experience: [blankExperience()], languages: [blankLanguage()], certifications: [blankCertification()],
                },
                setTemplate(slug) { this.template = slug; this.saved = false; },
                activeTemplateName() { const match = this.templates.find(item => item.slug === this.template); return match ? match.name : ''; },
                contactList() { return contactFields.filter(([, key]) => this.cv[key]).map(([label, key]) => ({ label: label, value: this.cv[key] })); },
                loadDraft() {
                    const draft = localStorage.getItem('cvbuilder-draft');
                    if (draft) this.cv = { ...this.cv, ...JSON.parse(draft) };
                    ['education', 'experience', 'languages', 'certifications'].forEach(key => {
                        if (!Array.isArray(this.cv[key]) || !this.cv[key].length) this.cv[key] = [key === 'education' ? blankEducation() : key === 'experience' ? blankExperience() : key === 'languages' ? blankLanguage() : blankCertification()];
                    });
                    const savedTemplate = localStorage.getItem('cvbuilder-template');
                    if (savedTemplate && this.templates.some(item => item.slug === savedTemplate)) this.template = savedTemplate;
                },
                saveDraft() { localStorage.setItem('cvbuilder-draft', JSON.stringify(this.cv)); localStorage.setItem('cvbuilder-template', this.template); this.saved = true; },
                resetCv() { if (confirm('Clear all CV information?')) { localStorage.removeItem('cvbuilder-draft'); localStorage.removeItem('cvbuilder-template'); window.location.reload(); } },
                initials() { return (this.cv.name || 'YN').split(' ').map(word => word[0]).join('').slice(0, 2).toUpperCase(); },
                skillList() { return (this.cv.skills || '').split(',').map(item => item.trim()).filter(Boolean); },
                addEducation() { this.cv.education.push(blankEducation()); },
                addExperience() { this.cv.experience.push(blankExperience()); },
                addLanguage() { this.cv.languages.push(blankLanguage()); },
                addCertification() { this.cv.certifications.push(blankCertification()); },
                removeItem(collection, index) { if (this.cv[collection].length > 1) this.cv[collection].splice(index, 1); },
                uploadPhoto(event) {
                    const file = event.target.files[0];
                    if (!file) return;
                    if (file.size > 2 * 1024 * 1024) { alert('Please choose an image smaller than 2 MB.'); event.target.value = ''; return; }
                    const reader = new FileReader();
                    reader.onload = e => { this.cv.photo = e.target.result; this.saved = false; };
                    reader.readAsDataURL(file);
                },
                downloadPdf() {
                    this.downloading = true;
                    fetch(@js(route('cv-builder.pdf')), {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/pdf', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                        body: JSON.stringify({ ...this.cv, template: this.template }),
                    })
                        .then(response => { if (!response.ok) throw new Error(); return response.blob(); })
                        .then(blob => { const url = URL.createObjectURL(blob); const link = document.createElement('a'); link.href = url; link.download = 'professional-cv.pdf'; link.click(); URL.revokeObjectURL(url); })
                        .catch(() => alert('The PDF could not be created. Please try again.'))
                        .finally(() => { this.downloading = false; });
                },
            };
        }
    </script>
</x-app-layout>
