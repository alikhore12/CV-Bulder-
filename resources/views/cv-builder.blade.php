<x-app-layout>
    <div x-data="cvBuilder(@js($templates), @js($defaultTemplate))" x-init="init()" class="cv-builder-shell min-h-screen bg-[#0f172a]/5 text-slate-900">
        <!-- Top Sticky Header -->
        <header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/95 backdrop-blur-md shadow-sm print:hidden">
            <div class="mx-auto flex max-w-[1750px] items-center justify-between gap-3 px-4 py-3 sm:px-6 lg:px-8">
                <!-- Brand / Logo -->
                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" class="group flex min-w-0 items-center gap-3" aria-label="CV-BULDER Home">
                        <div class="relative flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-tr from-cyan-400 via-indigo-500 to-violet-600 p-[1.5px] shadow-md shadow-indigo-500/20 group-hover:scale-105 transition-transform">
                            <div class="flex h-full w-full items-center justify-center rounded-[9px] bg-slate-950 font-black text-xs text-cyan-400">
                                CV
                            </div>
                        </div>
                        <span class="min-w-0">
                            <span class="block truncate text-base font-black tracking-wider text-slate-950">CV-<span class="bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 bg-clip-text text-transparent">BULDER</span></span>
                            <span class="hidden text-[10px] font-bold uppercase tracking-widest text-slate-400 sm:block">Editor Studio</span>
                        </span>
                    </a>

                    <!-- Quick Template Dropdown in Header -->
                    <div class="hidden lg:flex items-center ml-4 border-l border-slate-200 pl-4 gap-2">
                        <label for="header_template" class="text-xs font-bold text-slate-500">Template:</label>
                        <select id="header_template" x-model="template" @change="setTemplate($event.target.value)" class="rounded-lg border border-slate-300 bg-white px-2.5 py-1 text-xs font-bold text-slate-800 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                            <template x-for="item in templates" :key="item.slug">
                                <option :value="item.slug" x-text="item.name" :selected="template === item.slug"></option>
                            </template>
                        </select>
                    </div>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Autosave Indicator -->
                    <div class="hidden items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600 sm:flex">
                        <span class="h-2 w-2 rounded-full" :class="saveStatus === 'saved' ? 'bg-emerald-500' : saveStatus === 'saving' ? 'bg-amber-400 animate-pulse' : 'bg-slate-300'"></span>
                        <span x-text="saveLabel()"></span>
                    </div>

                    <!-- Load Sample Data -->
                    <button type="button" @click="loadSampleData()" class="hidden md:inline-flex items-center gap-1.5 rounded-lg border border-indigo-200 bg-indigo-50/70 px-3 py-1.5 text-xs font-bold text-indigo-700 hover:bg-indigo-100 transition" title="Fill with sample data">
                        <span>✨ Sample CV</span>
                    </button>

                    <!-- Reset / Clear -->
                    <button type="button" @click="clearData()" class="hidden xl:inline-flex items-center rounded-lg border border-slate-200 px-2.5 py-1.5 text-xs font-semibold text-slate-500 hover:bg-rose-50 hover:text-rose-600 transition" title="Reset all fields">
                        Clear
                    </button>

                    <!-- Mobile Preview Toggle -->
                    <button type="button" @click="mobilePreview = true" class="rounded-lg border border-slate-300 px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-100 lg:hidden">
                        Live Preview
                    </button>

                    <!-- Print Button -->
                    <button type="button" @click="window.print()" class="hidden sm:inline-flex items-center rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-xs font-bold text-slate-700 hover:bg-slate-50 transition" title="Print this CV">
                        <svg class="w-3.5 h-3.5 mr-1 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Print
                    </button>

                    <!-- Save Draft Button -->
                    <button type="button" @click="saveDraft()" class="rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-xs font-bold text-slate-700 hover:border-indigo-500 transition">
                        Save
                    </button>

                    <!-- View PDF in New Tab -->
                    <button type="button" @click="downloadPdf(true)" :disabled="downloading" class="hidden sm:inline-flex items-center gap-1.5 rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-xs font-bold text-slate-700 hover:border-indigo-500 hover:text-indigo-600 transition" title="Preview generated PDF in browser tab">
                        <svg class="h-3.5 w-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        <span>View PDF</span>
                    </button>

                    <!-- Download PDF CTA -->
                    <button type="button" @click="downloadPdf(false)" :disabled="downloading" class="inline-flex items-center gap-1.5 rounded-lg bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 px-4 py-2 text-xs font-extrabold uppercase tracking-wider text-white shadow-md shadow-indigo-500/25 hover:shadow-cyan-500/30 hover:scale-[1.02] active:scale-[0.98] transition-all disabled:cursor-wait disabled:opacity-60">
                        <svg x-show="!downloading" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <svg x-show="downloading" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        <span x-text="downloading ? 'Exporting PDF...' : 'Download PDF'"></span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Workspace -->
        <main class="mx-auto max-w-[1750px] px-4 py-6 sm:px-6 lg:px-8">
            <!-- Progress Banner -->
            <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between print:hidden rounded-2xl bg-white border border-slate-200/80 p-5 shadow-sm">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="inline-block h-2 w-2 rounded-full bg-cyan-400"></span>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-indigo-600">CV-BULDER Studio</p>
                    </div>
                    <h1 class="mt-1 text-2xl font-black tracking-tight text-slate-900 sm:text-3xl">
                        Create Your Career-Defining Resume
                    </h1>
                    <p class="mt-0.5 text-xs text-slate-500">
                        Fill each step at your own pace. The live preview updates automatically with every keystroke.
                    </p>
                </div>

                <div class="w-full max-w-sm rounded-xl bg-slate-50 p-3.5 border border-slate-200/60">
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-slate-600">
                        <span>Profile Completion</span>
                        <span class="text-indigo-600 font-extrabold" x-text="completion() + '%'"></span>
                    </div>
                    <div class="mt-2 h-2.5 overflow-hidden rounded-full bg-slate-200">
                        <div class="h-full rounded-full bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 transition-all duration-500" :style="`width: ${completion()}%`"></div>
                    </div>
                    <p class="mt-2 text-[11px] font-medium text-slate-500" x-text="completionHint()"></p>
                </div>
            </div>

            <!-- Editor Grid: Left Form, Right Live Preview -->
            <div class="grid items-start gap-8 lg:grid-cols-[minmax(0,0.95fr)_minmax(540px,1.05fr)]">
                <!-- Form Accordion Sections -->
                <form @input="markChanged()" @submit.prevent="saveDraft" class="space-y-4 print:hidden">
                    <template x-for="(section, index) in sections" :key="section.id">
                        <section class="overflow-hidden rounded-2xl border border-slate-200/90 bg-white shadow-sm transition-all hover:border-slate-300">
                            <!-- Accordion Header -->
                            <button type="button" @click="section.open = !section.open" class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left hover:bg-slate-50/80 transition" :aria-expanded="section.open">
                                <span class="flex items-center gap-3.5">
                                    <span class="grid h-8 w-8 place-items-center rounded-xl bg-indigo-50 text-xs font-black text-indigo-600 shadow-sm" x-text="String(index + 1).padStart(2, '0')"></span>
                                    <span>
                                        <span class="block text-sm font-bold text-slate-900" x-text="section.title"></span>
                                        <span class="block text-xs text-slate-500" x-text="section.subtitle"></span>
                                    </span>
                                </span>
                                <span class="grid h-6 w-6 place-items-center rounded-full bg-slate-100 text-sm font-bold text-slate-600" x-text="section.open ? '−' : '+'"></span>
                            </button>

                            <!-- Accordion Content -->
                            <div x-show="section.open" x-collapse class="border-t border-slate-100 px-5 pb-6 pt-5">
                                <!-- Personal Section -->
                                <template x-if="section.id === 'personal'">
                                    <div class="grid gap-4 sm:grid-cols-2">
                                        <div class="sm:col-span-2">
                                            <label class="field-label" for="full_name">Full name *</label>
                                            <input id="full_name" x-model="cv.name" class="field" placeholder="e.g. Muhammad Ahmed" autocomplete="name">
                                        </div>
                                        <div>
                                            <label class="field-label">Professional headline / Title *</label>
                                            <input x-model="cv.headline" class="field" placeholder="e.g. Senior Software Engineer">
                                        </div>
                                        <div>
                                            <label class="field-label">Location (City, Country)</label>
                                            <input x-model="cv.location" class="field" placeholder="e.g. Lahore, Pakistan">
                                        </div>
                                        <div>
                                            <label class="field-label">Email address *</label>
                                            <input type="email" x-model="cv.email" class="field" placeholder="you@example.com">
                                        </div>
                                        <div>
                                            <label class="field-label">Phone number</label>
                                            <input x-model="cv.phone" class="field" placeholder="+92 300 0000000">
                                        </div>
                                        <div>
                                            <label class="field-label">Portfolio / Website</label>
                                            <input x-model="cv.website" class="field" placeholder="https://yourportfolio.com">
                                        </div>
                                        <div>
                                            <label class="field-label">LinkedIn profile</label>
                                            <input x-model="cv.linkedin" class="field" placeholder="linkedin.com/in/username">
                                        </div>
                                        <div>
                                            <label class="field-label">GitHub profile</label>
                                            <input x-model="cv.github" class="field" placeholder="github.com/username">
                                        </div>
                                        <div>
                                            <label class="field-label">Profile photo <span class="font-normal text-slate-400">(optional)</span></label>
                                            <div class="flex items-center gap-3">
                                                <div class="grid h-12 w-12 shrink-0 place-items-center overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                                                    <template x-if="cv.photo">
                                                        <img :src="cv.photo" alt="Profile preview" class="h-full w-full object-cover">
                                                    </template>
                                                    <span x-show="!cv.photo" class="text-xs font-bold text-slate-400">+</span>
                                                </div>
                                                <input type="file" accept="image/png,image/jpeg" @change="uploadPhoto($event)" class="block w-full text-xs text-slate-500 file:mr-2 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-2.5 file:py-1.5 file:text-xs file:font-bold file:text-indigo-600">
                                            </div>
                                        </div>

                                        <!-- Optional Details Accordion Toggle -->
                                        <div class="sm:col-span-2 rounded-xl bg-slate-50/80 p-4 border border-slate-200/60">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-xs font-bold text-slate-800">Additional Personal Details</p>
                                                    <p class="text-[11px] text-slate-500">Include domicile, address or CNIC only when required by your employer.</p>
                                                </div>
                                                <label class="relative inline-flex cursor-pointer items-center">
                                                    <input type="checkbox" x-model="cv.settings.showPersonalDetails" class="peer sr-only">
                                                    <span class="h-5 w-9 rounded-full bg-slate-300 after:absolute after:left-[2px] after:top-[2px] after:h-4 after:w-4 after:rounded-full after:bg-white after:transition-all peer-checked:bg-indigo-600 peer-checked:after:translate-x-full"></span>
                                                </label>
                                            </div>
                                            <div x-show="cv.settings.showPersonalDetails" class="mt-4 grid gap-3 sm:grid-cols-2">
                                                <div class="sm:col-span-2">
                                                    <label class="field-label">Full Street Address</label>
                                                    <input x-model="cv.fullAddress" class="field" placeholder="House, street, city, country">
                                                </div>
                                                <div>
                                                    <label class="field-label">Nationality</label>
                                                    <input x-model="cv.nationality" class="field" placeholder="Pakistani">
                                                </div>
                                                <div>
                                                    <label class="field-label">Domicile</label>
                                                    <input x-model="cv.domicile" class="field" placeholder="Lahore">
                                                </div>
                                                <div>
                                                    <label class="field-label">Date of Birth</label>
                                                    <input type="date" x-model="cv.dateOfBirth" class="field">
                                                </div>
                                                <div>
                                                    <label class="field-label">CNIC / ID Number</label>
                                                    <input x-model="cv.cnicNumber" class="field" placeholder="Optional">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Summary Section -->
                                <template x-if="section.id === 'summary'">
                                    <div>
                                        <div class="flex items-center justify-between">
                                            <label class="field-label">Professional Summary</label>
                                            <span class="text-xs font-medium text-slate-400" x-text="wordCount() + ' words'"></span>
                                        </div>
                                        <textarea x-model="cv.summary" rows="5" maxlength="1200" class="field" placeholder="Highlight your key achievements, core technical expertise, and career aspirations in 3–5 high-impact lines."></textarea>
                                        <div class="mt-3 flex flex-wrap items-center gap-2">
                                            <span class="text-xs font-bold text-slate-500 mr-1">AI Assistant:</span>
                                            <button type="button" @click="summaryAction('short')" class="ai-button">⚡ Make Concise</button>
                                            <button type="button" @click="summaryAction('professional')" class="ai-button">💼 Make Professional</button>
                                            <button type="button" @click="summaryAction('generate')" class="ai-button">✦ Generate Pitch</button>
                                        </div>
                                        <p class="hint">Tip: Strong summaries state your strongest specialty, quantified experience, and the exact position you seek.</p>
                                    </div>
                                </template>

                                <!-- Work Experience -->
                                <template x-if="section.id === 'experience'">
                                    <div class="space-y-4">
                                        <template x-for="(item, index) in cv.experience" :key="item.id">
                                            <div class="rounded-xl border border-slate-200 bg-slate-50/40 p-4">
                                                <div class="mb-3 flex items-center justify-between border-b border-slate-200/60 pb-2">
                                                    <h3 class="text-xs font-black uppercase tracking-wider text-slate-700">Role #<span x-text="index + 1"></span></h3>
                                                    <div class="flex gap-3">
                                                        <button type="button" @click="duplicateItem('experience', index)" class="text-xs font-bold text-indigo-600 hover:text-indigo-800">Duplicate</button>
                                                        <button type="button" @click="removeItem('experience', index)" class="text-xs font-bold text-rose-600 hover:text-rose-800">Remove</button>
                                                    </div>
                                                </div>
                                                <div class="grid gap-3 sm:grid-cols-2">
                                                    <div>
                                                        <label class="field-label">Job Title *</label>
                                                        <input x-model="item.position" class="field" placeholder="Software Engineer">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Company Name *</label>
                                                        <input x-model="item.company" class="field" placeholder="Tech Innovations LLC">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Location</label>
                                                        <input x-model="item.location" class="field" placeholder="Remote / City">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Start Date</label>
                                                        <input type="month" x-model="item.startDate" class="field">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">End Date</label>
                                                        <input type="month" x-model="item.endDate" :disabled="item.current" class="field disabled:bg-slate-100 disabled:opacity-60">
                                                        <label class="mt-2 flex items-center gap-2 text-xs font-semibold text-slate-600">
                                                            <input type="checkbox" x-model="item.current" class="rounded border-slate-300 text-indigo-600">
                                                            Currently working here
                                                        </label>
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label class="field-label">Key Achievements & Bullet Points</label>
                                                        <textarea x-model="item.description" rows="4" class="field" placeholder="• Led development of core APIs improving throughput by 40%.&#10;• Reduced latency and optimized database queries."></textarea>
                                                        <p class="hint">Begin each line with a bullet (•) or action verb and include metrics where possible.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <button type="button" @click="addExperience()" class="add-button">+ Add Work Experience</button>
                                    </div>
                                </template>

                                <!-- Education -->
                                <template x-if="section.id === 'education'">
                                    <div class="space-y-4">
                                        <template x-for="(item, index) in cv.education" :key="item.id">
                                            <div class="rounded-xl border border-slate-200 bg-slate-50/40 p-4">
                                                <div class="mb-3 flex items-center justify-between border-b border-slate-200/60 pb-2">
                                                    <h3 class="text-xs font-black uppercase tracking-wider text-slate-700">Degree #<span x-text="index + 1"></span></h3>
                                                    <button type="button" @click="removeItem('education', index)" class="text-xs font-bold text-rose-600 hover:text-rose-800">Remove</button>
                                                </div>
                                                <div class="grid gap-3 sm:grid-cols-2">
                                                    <div>
                                                        <label class="field-label">Degree / Certificate *</label>
                                                        <input x-model="item.degree" class="field" placeholder="BS Computer Science">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Major / Field of Study</label>
                                                        <input x-model="item.field" class="field" placeholder="Software Engineering">
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label class="field-label">Institution / University *</label>
                                                        <input x-model="item.institution" class="field" placeholder="University of the Punjab">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Location</label>
                                                        <input x-model="item.location" class="field" placeholder="Lahore">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Start Year</label>
                                                        <input x-model="item.startYear" class="field" placeholder="2018">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">End Year (or Expected)</label>
                                                        <input x-model="item.endYear" class="field" placeholder="2022">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">CGPA / Grade</label>
                                                        <input x-model="item.obtainedMarks" class="field" placeholder="3.7 / 4.0">
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label class="field-label">Honors / Relevant Coursework</label>
                                                        <textarea x-model="item.description" rows="2" class="field" placeholder="Dean's Honor List, Data Structures, Distributed Systems"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <button type="button" @click="addEducation()" class="add-button">+ Add Education</button>
                                    </div>
                                </template>

                                <!-- Skills Section -->
                                <template x-if="section.id === 'skills'">
                                    <div>
                                        <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                            <div>
                                                <p class="field-label">Skills & Competencies</p>
                                                <p class="hint">Categorize skills and assign proficiency levels for recruiter clarity.</p>
                                            </div>
                                            <input x-model="skillSearch" class="field max-w-[200px]" placeholder="Filter skills...">
                                        </div>

                                        <div class="space-y-3">
                                            <template x-for="(item, index) in cv.skills" :key="item.id">
                                                <div x-show="!skillSearch || item.name.toLowerCase().includes(skillSearch.toLowerCase())" class="grid gap-2 sm:grid-cols-[1.4fr_1fr_1fr_auto] items-center">
                                                    <input x-model="item.name" class="field" placeholder="e.g. Laravel">
                                                    <select x-model="item.category" class="field">
                                                        <option>Technical Skills</option>
                                                        <option>Programming</option>
                                                        <option>Web Development</option>
                                                        <option>Database & Cloud</option>
                                                        <option>Design</option>
                                                        <option>Soft Skills</option>
                                                        <option>Tools</option>
                                                    </select>
                                                    <select x-model="item.level" class="field">
                                                        <option value="">Proficiency (Optional)</option>
                                                        <option>Expert</option>
                                                        <option>Advanced</option>
                                                        <option>Professional</option>
                                                        <option>Intermediate</option>
                                                        <option>Basic</option>
                                                    </select>
                                                    <button type="button" @click="removeItem('skills', index)" class="rounded-lg p-2 text-rose-500 hover:bg-rose-50" aria-label="Remove skill">×</button>
                                                </div>
                                            </template>
                                        </div>

                                        <!-- Quick Suggestion Pills -->
                                        <div class="mt-4 pt-4 border-t border-slate-100">
                                            <span class="text-xs font-bold text-slate-500 block mb-2">Quick Add Suggestions:</span>
                                            <div class="flex flex-wrap gap-2">
                                                <template x-for="suggestion in skillSuggestions" :key="suggestion">
                                                    <button type="button" @click="addSkill(suggestion)" class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold text-slate-700 hover:border-indigo-400 hover:text-indigo-600 transition" x-text="'+ ' + suggestion"></button>
                                                </template>
                                            </div>
                                        </div>

                                        <button type="button" @click="addSkill()" class="add-button mt-4">+ Add Custom Skill</button>
                                    </div>
                                </template>

                                <!-- Projects Section -->
                                <template x-if="section.id === 'projects'">
                                    <div class="space-y-4">
                                        <template x-for="(item, index) in cv.projects" :key="item.id">
                                            <div class="rounded-xl border border-slate-200 bg-slate-50/40 p-4">
                                                <div class="mb-3 flex items-center justify-between border-b border-slate-200/60 pb-2">
                                                    <h3 class="text-xs font-black uppercase tracking-wider text-slate-700">Project #<span x-text="index + 1"></span></h3>
                                                    <button type="button" @click="removeItem('projects', index)" class="text-xs font-bold text-rose-600 hover:text-rose-800">Remove</button>
                                                </div>
                                                <div class="grid gap-3 sm:grid-cols-2">
                                                    <div>
                                                        <label class="field-label">Project Name *</label>
                                                        <input x-model="item.name" class="field" placeholder="e.g. Healthcare CRM">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Your Role</label>
                                                        <input x-model="item.role" class="field" placeholder="Lead Developer">
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label class="field-label">Technologies Used</label>
                                                        <input x-model="item.technologies" class="field" placeholder="Laravel, Vue.js, Tailwind, MySQL">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Live Project URL</label>
                                                        <input type="url" x-model="item.url" class="field" placeholder="https://example.com">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">GitHub URL</label>
                                                        <input type="url" x-model="item.githubUrl" class="field" placeholder="https://github.com/...">
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label class="field-label">Summary & Key Achievements</label>
                                                        <textarea x-model="item.description" rows="3" class="field" placeholder="Architected core features, payment flow, and managed deployment..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <button type="button" @click="addProject()" class="add-button">+ Add Project</button>
                                    </div>
                                </template>

                                <!-- Certifications Section -->
                                <template x-if="section.id === 'certifications'">
                                    <div class="space-y-4">
                                        <template x-for="(item, index) in cv.certifications" :key="item.id">
                                            <div class="rounded-xl border border-slate-200 bg-slate-50/40 p-4">
                                                <div class="mb-3 flex items-center justify-between border-b border-slate-200/60 pb-2">
                                                    <h3 class="text-xs font-black uppercase tracking-wider text-slate-700">Certificate #<span x-text="index + 1"></span></h3>
                                                    <button type="button" @click="removeItem('certifications', index)" class="text-xs font-bold text-rose-600 hover:text-rose-800">Remove</button>
                                                </div>
                                                <div class="grid gap-3 sm:grid-cols-2">
                                                    <div>
                                                        <label class="field-label">Certificate Title</label>
                                                        <input x-model="item.name" class="field" placeholder="AWS Solutions Architect">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Issuing Organization</label>
                                                        <input x-model="item.organization" class="field" placeholder="Amazon Web Services">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Issue Date</label>
                                                        <input type="month" x-model="item.issueDate" class="field">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Expiry Date</label>
                                                        <input type="month" x-model="item.expiryDate" :disabled="item.noExpiry" class="field disabled:bg-slate-100 disabled:opacity-60">
                                                        <label class="mt-2 flex items-center gap-2 text-xs font-semibold text-slate-600">
                                                            <input type="checkbox" x-model="item.noExpiry" class="rounded border-slate-300 text-indigo-600">
                                                            Does not expire
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Credential ID</label>
                                                        <input x-model="item.credentialId" class="field" placeholder="ID-89234">
                                                    </div>
                                                    <div>
                                                        <label class="field-label">Verification URL</label>
                                                        <input type="url" x-model="item.credentialUrl" class="field" placeholder="https://...">
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        <button type="button" @click="addCertification()" class="add-button">+ Add Certification</button>
                                    </div>
                                </template>

                                <!-- Languages Section -->
                                <template x-if="section.id === 'languages'">
                                    <div class="space-y-3">
                                        <template x-for="(item, index) in cv.languages" :key="item.id">
                                            <div class="grid grid-cols-[1fr_1fr_auto] gap-3 items-center">
                                                <input x-model="item.name" class="field" placeholder="Language (e.g. English)">
                                                <select x-model="item.proficiency" class="field">
                                                    <option value="">Proficiency</option>
                                                    <option>Native</option>
                                                    <option>Fluent</option>
                                                    <option>Professional</option>
                                                    <option>Intermediate</option>
                                                    <option>Basic</option>
                                                </select>
                                                <button type="button" @click="removeItem('languages', index)" class="rounded-lg p-2 text-rose-500 hover:bg-rose-50">×</button>
                                            </div>
                                        </template>
                                        <button type="button" @click="addLanguage()" class="add-button">+ Add Language</button>
                                    </div>
                                </template>

                                <!-- References Section -->
                                <template x-if="section.id === 'references'">
                                    <div>
                                        <div class="mb-4 flex items-center justify-between rounded-xl bg-slate-50 p-3 border border-slate-200">
                                            <div>
                                                <p class="text-xs font-bold text-slate-800">References Setting</p>
                                                <p class="text-[11px] text-slate-500">Most modern resumes keep references available upon request.</p>
                                            </div>
                                            <select x-model="cv.settings.referenceMode" class="field w-auto text-xs">
                                                <option value="request">Available upon request</option>
                                                <option value="full">Include full contact list</option>
                                            </select>
                                        </div>

                                        <div x-show="cv.settings.referenceMode === 'full'" class="space-y-4">
                                            <template x-for="(item, index) in cv.references" :key="item.id">
                                                <div class="rounded-xl border border-slate-200 bg-slate-50/40 p-4">
                                                    <div class="mb-3 flex items-center justify-between">
                                                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-700">Reference #<span x-text="index + 1"></span></h3>
                                                        <button type="button" @click="removeItem('references', index)" class="text-xs font-bold text-rose-600">Remove</button>
                                                    </div>
                                                    <div class="grid gap-3 sm:grid-cols-2">
                                                        <input x-model="item.name" class="field" placeholder="Full name">
                                                        <input x-model="item.position" class="field" placeholder="Designation">
                                                        <input x-model="item.company" class="field" placeholder="Company / Organization">
                                                        <input type="email" x-model="item.email" class="field" placeholder="Email">
                                                        <input x-model="item.phone" class="field" placeholder="Phone">
                                                        <input x-model="item.relationship" class="field" placeholder="Professional Relationship">
                                                    </div>
                                                </div>
                                            </template>
                                            <button type="button" @click="addReference()" class="add-button">+ Add Reference</button>
                                        </div>
                                    </div>
                                </template>

                                <!-- Design & Styling Section -->
                                <template x-if="section.id === 'design'">
                                    <div class="grid gap-5">
                                        <div>
                                            <label class="field-label mb-2">Select From 9 Premium Templates</label>
                                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                                                @foreach ($templates as $item)
                                                    <button type="button" @click="setTemplate(@js($item['slug']))" class="group rounded-xl border p-2.5 text-left transition-all" :class="template === @js($item['slug']) ? 'border-indigo-600 bg-indigo-50/70 ring-2 ring-indigo-500/30' : 'border-slate-200 hover:border-indigo-300 hover:bg-slate-50'">
                                                        <div class="mb-2 overflow-hidden rounded-lg">
                                                            <x-cv-template-thumbnail :slug="$item['slug']" size="sm" />
                                                        </div>
                                                        <span class="block text-xs font-bold text-slate-900 group-hover:text-indigo-600 truncate">{{ $item['name'] }}</span>
                                                        <span class="block text-[10px] text-slate-500 line-clamp-1 mt-0.5">{{ $item['description'] }}</span>
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="pt-4 border-t border-slate-100 grid gap-4 sm:grid-cols-2 items-center">
                                            <div>
                                                <label class="field-label">Custom Accent Color</label>
                                                <div class="flex flex-wrap gap-2.5 mt-2">
                                                    <template x-for="color in accentColors" :key="color">
                                                        <button type="button" @click="cv.settings.accent = color; markChanged();" class="h-8 w-8 rounded-full border-2 transition-transform hover:scale-110" :class="cv.settings.accent === color ? 'border-slate-900 ring-2 ring-indigo-300 scale-105' : 'border-white shadow-sm'" :style="`background:${color}`" :aria-label="'Set accent ' + color"></button>
                                                    </template>
                                                </div>
                                            </div>

                                            <div>
                                                <label class="flex items-center gap-3 text-xs font-bold text-slate-700 cursor-pointer">
                                                    <input type="checkbox" x-model="cv.settings.atsMode" class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                                                    <span>Enforce ATS Standard Layout</span>
                                                </label>
                                                <p class="hint mt-1">Ensures headings and spacing match automated parser conventions.</p>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </section>
                    </template>

                    <!-- Bottom Action Card -->
                    <div class="rounded-2xl bg-slate-950 p-5 text-white shadow-xl flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div>
                            <p class="font-bold text-sm">Draft Automatically Stored in Browser</p>
                            <p class="text-xs text-slate-400 mt-0.5">Your data never leaves your device unless you export a PDF.</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="submit" class="rounded-xl bg-white px-5 py-2.5 text-xs font-extrabold uppercase tracking-wider text-slate-950 hover:bg-cyan-100 transition">
                                Save Progress
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right Sticky Live Preview -->
                <aside class="hidden lg:sticky lg:top-[76px] lg:block print:block">
                    <!-- Preview Toolbar -->
                    <div class="mb-3 flex items-center justify-between print:hidden rounded-xl bg-white border border-slate-200/80 px-4 py-2.5 shadow-sm">
                        <div class="flex items-center gap-2">
                            <span class="flex h-2.5 w-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs font-bold text-slate-900">Live Paper Canvas</span>
                            <span class="text-slate-400">·</span>
                            <span class="text-xs font-medium text-slate-500" x-text="activeTemplateName()"></span>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="button" @click="downloadPdf(true)" :disabled="downloading" class="text-xs font-bold text-slate-600 hover:text-indigo-600 transition" title="Open PDF in new tab">
                                View PDF
                            </button>
                            <span class="text-slate-300">·</span>
                            <button type="button" @click="downloadPdf(false)" :disabled="downloading" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 transition" title="Quick PDF download">
                                Export PDF
                            </button>
                        </div>
                    </div>

                    <!-- Canvas Wrapper -->
                    <div :data-cv-template="template" :style="'--cv-accent:' + (cv.settings.accent || '#4f46e5')" class="mx-auto max-w-[760px] overflow-hidden rounded-md bg-white shadow-2xl ring-1 ring-slate-200">
                        @foreach ($templates as $templateOption)
                            <template x-if="template === @js($templateOption['slug'])">
                                @include('cv-preview.'.$templateOption['slug'])
                            </template>
                        @endforeach
                    </div>
                </aside>
            </div>
        </main>

        <!-- Mobile Preview Modal -->
        <div x-show="mobilePreview" x-cloak class="fixed inset-0 z-50 bg-slate-950/80 p-3 lg:hidden" role="dialog" aria-modal="true" @keydown.escape.window="mobilePreview = false">
            <div class="flex h-full flex-col overflow-hidden rounded-2xl bg-slate-100 shadow-2xl">
                <div class="flex items-center justify-between border-b border-slate-200 bg-white px-4 py-3">
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-sm text-slate-900">A4 Live Preview</span>
                        <span class="text-xs text-slate-500" x-text="'(' + activeTemplateName() + ')'"></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="button" @click="downloadPdf(true)" class="text-xs font-bold text-slate-600">View</button>
                        <button type="button" @click="downloadPdf(false)" class="text-xs font-bold text-indigo-600">Download</button>
                        <button type="button" @click="mobilePreview = false" class="rounded-lg px-2.5 py-1 text-lg font-bold text-slate-500 hover:bg-slate-100" aria-label="Close preview">×</button>
                    </div>
                </div>
                <div class="flex-1 overflow-auto p-3">
                    <div :data-cv-template="template" :style="'--cv-accent:' + (cv.settings.accent || '#4f46e5')" class="mx-auto max-w-[760px] overflow-hidden rounded-sm bg-white shadow-xl">
                        @foreach ($templates as $templateOption)
                            <template x-if="template === @js($templateOption['slug'])">
                                @include('cv-preview.'.$templateOption['slug'])
                            </template>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.cv-template-switcher', ['templates' => $templates, 'defaultTemplate' => $defaultTemplate])
    @include('cv-preview.styles')

    <script>
        function cvBuilder(templates, defaultTemplate) {
            const id = () => Date.now() + Math.random();
            const blank = {
                education: () => ({ id: id(), degree: '', field: '', institution: '', location: '', startYear: '', endYear: '', totalMarks: '', obtainedMarks: '', percentage: '', description: '' }),
                experience: () => ({ id: id(), position: '', company: '', location: '', startDate: '', endDate: '', current: false, description: '' }),
                skill: (name = '') => ({ id: id(), name, category: 'Technical Skills', level: '' }),
                project: () => ({ id: id(), name: '', role: '', technologies: '', url: '', githubUrl: '', description: '' }),
                certification: () => ({ id: id(), name: '', organization: '', issueDate: '', expiryDate: '', noExpiry: false, credentialId: '', credentialUrl: '' }),
                language: () => ({ id: id(), name: '', proficiency: '' }),
                reference: () => ({ id: id(), name: '', position: '', company: '', email: '', phone: '', relationship: '' })
            };

            const initialCv = () => ({
                name: '',
                headline: '',
                location: '',
                email: '',
                phone: '',
                website: '',
                linkedin: '',
                github: '',
                photo: '',
                summary: '',
                fullAddress: '',
                nationality: '',
                domicile: '',
                dateOfBirth: '',
                cnicNumber: '',
                education: [blank.education()],
                experience: [blank.experience()],
                skills: [blank.skill()],
                projects: [],
                certifications: [],
                languages: [blank.language()],
                references: [],
                settings: {
                    template: defaultTemplate || 'classic',
                    accent: '#4f46e5',
                    atsMode: true,
                    showPersonalDetails: false,
                    referenceMode: 'request'
                }
            });

            return {
                templates,
                template: defaultTemplate || 'classic',
                cv: initialCv(),
                saveStatus: 'idle',
                saveTimer: null,
                downloading: false,
                mobilePreview: false,
                skillSearch: '',
                accentColors: ['#4f46e5', '#06b6d4', '#0f766e', '#10b981', '#7c3aed', '#e11d48', '#f59e0b', '#1e293b'],
                skillSuggestions: ['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'React', 'MySQL', 'Tailwind CSS', 'Docker', 'Git', 'RESTful APIs'],
                sections: [
                    { id: 'personal', title: 'Personal Information', subtitle: 'Name, headline, contact & optional details', open: true },
                    { id: 'summary', title: 'Professional Summary', subtitle: 'Compelling overview of your experience & strengths', open: false },
                    { id: 'experience', title: 'Work Experience', subtitle: 'Roles, companies & quantified achievement bullets', open: false },
                    { id: 'education', title: 'Education & Honors', subtitle: 'Degrees, institutions, honors & coursework', open: false },
                    { id: 'skills', title: 'Skills & Capabilities', subtitle: 'Categorized technical & professional competencies', open: false },
                    { id: 'projects', title: 'Key Projects', subtitle: 'Showcase real-world apps, tools & repositories', open: false },
                    { id: 'certifications', title: 'Certifications & Credentials', subtitle: 'Verified credentials, issuers & online links', open: false },
                    { id: 'languages', title: 'Languages', subtitle: 'Languages and fluency proficiency levels', open: false },
                    { id: 'references', title: 'References', subtitle: 'Professional contacts or availability declaration', open: false },
                    { id: 'design', title: 'Template & Design Style', subtitle: 'Choose from 9 templates, accents & ATS mode', open: false }
                ],

                init() {
                    this.loadDraft();

                    // Check URL parameter for ?template=slug
                    const params = new URLSearchParams(window.location.search);
                    const queryTemplate = params.get('template');
                    if (queryTemplate && this.templates.some(item => item.slug === queryTemplate)) {
                        this.template = queryTemplate;
                        this.cv.settings.template = queryTemplate;
                    }

                    window.addEventListener('template-selected', e => this.setTemplate(e.detail));

                    this.$watch('cv', () => this.markChanged(), { deep: true });
                },

                saveLabel() {
                    return this.saveStatus === 'saving' ? 'Saving...' : this.saveStatus === 'saved' ? 'Autosaved' : 'Draft ready';
                },

                markChanged() {
                    this.saveStatus = 'saving';
                    clearTimeout(this.saveTimer);
                    this.saveTimer = setTimeout(() => this.saveDraft(), 600);
                },

                saveDraft() {
                    localStorage.setItem('cvbuilder-draft', JSON.stringify(this.cv));
                    localStorage.setItem('cvbuilder-template', this.template);
                    this.saveStatus = 'saved';
                },

                loadDraft() {
                    try {
                        const draft = JSON.parse(localStorage.getItem('cvbuilder-draft') || 'null');
                        if (draft) {
                            this.cv = {
                                ...initialCv(),
                                ...draft,
                                settings: { ...initialCv().settings, ...(draft.settings || {}) }
                            };
                        }
                    } catch {
                        localStorage.removeItem('cvbuilder-draft');
                    }

                    const stored = localStorage.getItem('cvbuilder-template');
                    if (stored && this.templates.some(item => item.slug === stored)) {
                        this.template = stored;
                    }
                    this.migrateData();
                    this.saveStatus = localStorage.getItem('cvbuilder-draft') ? 'saved' : 'idle';
                },

                loadSampleData() {
                    if (!confirm('Load sample CV data? This will populate the form with a complete professional resume to preview all sections.')) {
                        return;
                    }

                    this.cv = {
                        name: 'Muhammad Hamza',
                        headline: 'Senior Full Stack Software Engineer',
                        location: 'Lahore, Pakistan',
                        email: 'hamza.dev@example.com',
                        phone: '+92 300 9876543',
                        website: 'https://hamzadev.me',
                        linkedin: 'linkedin.com/in/hamzadev',
                        github: 'github.com/hamzadev',
                        photo: '',
                        summary: 'Innovative Full-Stack Software Engineer with 6+ years of experience designing and scaling distributed web applications and RESTful APIs using Laravel, Vue.js, MySQL, and Docker. Proven record of boosting application throughput by 40% and leading high-performing cross-functional agile teams.',
                        fullAddress: 'DHA Phase 5, Lahore, Pakistan',
                        nationality: 'Pakistani',
                        domicile: 'Lahore',
                        dateOfBirth: '1996-08-14',
                        cnicNumber: '35201-1234567-3',
                        education: [
                            {
                                id: id(),
                                degree: 'Bachelor of Science',
                                field: 'Computer Science',
                                institution: 'Punjab University College of Information Technology (PUCIT)',
                                location: 'Lahore, Pakistan',
                                startYear: '2015',
                                endYear: '2019',
                                totalMarks: '4.00',
                                obtainedMarks: '3.78',
                                percentage: '89%',
                                description: 'Graduated Magna Cum Laude. Led university Computing & Web Development Society.'
                            }
                        ],
                        experience: [
                            {
                                id: id(),
                                position: 'Lead Backend Software Engineer',
                                company: 'TechSphere Global',
                                location: 'Lahore, Pakistan',
                                startDate: '2022-03',
                                endDate: '',
                                current: true,
                                description: '• Architected core microservices handling 2.5M+ requests daily with 99.98% service uptime.\n• Reduced database query latency by 55% using Redis caching and composite MySQL index strategies.\n• Led code reviews and mentored 7 engineers on Laravel best practices, testing, and CI/CD pipelines.'
                            },
                            {
                                id: id(),
                                position: 'Full Stack Web Developer',
                                company: 'NextGen Digital Studio',
                                location: 'Remote / Lahore',
                                startDate: '2019-07',
                                endDate: '2022-02',
                                current: false,
                                description: '• Developed and maintained 15+ high-volume SaaS applications using Laravel, Vue 3, and Tailwind CSS.\n• Integrated multi-vendor payment gateways including Stripe, PayPal, and local Pakistani payment channels.\n• Decreased automated build & deploy time by 60% with GitHub Actions.'
                            }
                        ],
                        skills: [
                            blank.skill('Laravel'),
                            blank.skill('PHP 8.4'),
                            blank.skill('Vue.js / React'),
                            blank.skill('MySQL & PostgreSQL'),
                            blank.skill('Tailwind CSS'),
                            blank.skill('Docker & Linux'),
                            blank.skill('RESTful APIs'),
                            blank.skill('Redis & Caching')
                        ],
                        projects: [
                            {
                                id: id(),
                                name: 'High-Volume E-Commerce Platform',
                                role: 'Lead Architect',
                                technologies: 'Laravel 12, MySQL, Redis, Tailwind',
                                url: 'https://ecommerce-core.demo',
                                githubUrl: 'https://github.com/hamzadev/ecommerce-core',
                                description: 'Engineered a multi-tenant ecommerce engine with automated invoice PDF generation, realtime inventory, and order analytics.'
                            },
                            {
                                id: id(),
                                name: 'Real-Time Telemetry & Analytics Dashboard',
                                role: 'Full Stack Creator',
                                technologies: 'Vue 3, Laravel API, Tailwind CSS',
                                url: 'https://analytics-dash.demo',
                                githubUrl: 'https://github.com/hamzadev/saas-dashboard',
                                description: 'Telemetry monitoring system displaying live transaction performance and automated daily incident reports.'
                            }
                        ],
                        certifications: [
                            {
                                id: id(),
                                name: 'AWS Certified Solutions Architect – Associate',
                                organization: 'Amazon Web Services',
                                issueDate: '2023-05',
                                expiryDate: '2026-05',
                                noExpiry: false,
                                credentialId: 'AWS-SAA-849204',
                                credentialUrl: 'https://aws.amazon.com/verify'
                            }
                        ],
                        languages: [
                            { id: id(), name: 'English', proficiency: 'Professional' },
                            { id: id(), name: 'Urdu', proficiency: 'Native' }
                        ],
                        references: [
                            {
                                id: id(),
                                name: 'Dr. Tariq Mahmood',
                                position: 'VP of Engineering',
                                company: 'TechSphere Global',
                                email: 'tariq@techsphere.com',
                                phone: '+92 300 1122334',
                                relationship: 'Former Direct Engineering Manager'
                            }
                        ],
                        settings: {
                            template: this.template,
                            accent: '#4f46e5',
                            atsMode: true,
                            showPersonalDetails: false,
                            referenceMode: 'request'
                        }
                    };

                    this.saveDraft();
                },

                clearData() {
                    if (confirm('Clear all fields to start with a blank CV?')) {
                        this.cv = initialCv();
                        this.saveDraft();
                    }
                },

                migrateData() {
                    if (typeof this.cv.skills === 'string') {
                        this.cv.skills = this.cv.skills.split(',').map(name => blank.skill(name.trim())).filter(item => item.name);
                    }
                    if (this.cv.languages) {
                        this.cv.languages.forEach(item => { item.proficiency ||= item.level || ''; });
                    }
                    if (this.cv.certifications) {
                        this.cv.certifications.forEach(item => { item.issueDate ||= item.date || ''; });
                    }
                },

                setTemplate(slug) {
                    if (this.templates.some(item => item.slug === slug)) {
                        this.template = slug;
                        this.cv.settings.template = slug;
                        this.markChanged();
                    }
                },

                activeTemplateName() {
                    return this.templates.find(item => item.slug === this.template)?.name || 'Classic';
                },

                completion() {
                    const checks = [
                        !!(this.cv.name && this.cv.email && this.cv.headline),
                        !!this.cv.summary,
                        this.cv.experience.some(x => x.position || x.company),
                        this.cv.education.some(x => x.degree || x.institution),
                        this.cv.skills.some(x => x.name),
                        this.cv.projects.some(x => x.name),
                        this.cv.certifications.some(x => x.name),
                        this.cv.languages.some(x => x.name),
                        this.cv.references.some(x => x.name)
                    ];
                    const weights = [15, 10, 20, 15, 15, 10, 5, 5, 5];
                    return Math.min(100, Math.round(checks.reduce((total, value, index) => total + (value ? weights[index] : 0), 0)));
                },

                completionHint() {
                    const comp = this.completion();
                    if (comp >= 90) return '✨ Outstanding! Your CV is fully populated and ready to download.';
                    if (comp >= 60) return '👍 Great progress! Consider adding projects and certifications.';
                    if (!this.cv.experience.some(x => x.position)) return 'Add at least one work experience entry.';
                    return 'Complete basic personal, summary, and experience details.';
                },

                wordCount() {
                    return (this.cv.summary || '').trim().split(/\s+/).filter(Boolean).length;
                },

                summaryAction(action) {
                    if (action === 'short' && this.cv.summary) {
                        this.cv.summary = this.cv.summary.split(/(?<=[.!?])\s+/).slice(0, 3).join(' ');
                    }
                    if (action === 'professional' && this.cv.summary) {
                        this.cv.summary = this.cv.summary.replace(/^I am /i, 'Results-driven professional with proven experience in ');
                    }
                    if (action === 'generate' && !this.cv.summary) {
                        this.cv.summary = `${this.cv.headline || 'Dedicated professional'} with expertise in ${this.skillList().slice(0, 3).join(', ') || 'software delivery and collaboration'}. Proven track record of optimizing workflows, achieving project milestones, and delivering measurable impact.`;
                    }
                    this.markChanged();
                },

                skillList() {
                    return this.cv.skills.filter(item => item && item.name).map(item => item.name);
                },

                addSkill(name = '') {
                    this.cv.skills.push(blank.skill(name));
                },

                addEducation() {
                    this.cv.education.push(blank.education());
                },

                addExperience() {
                    this.cv.experience.push(blank.experience());
                },

                addProject() {
                    this.cv.projects.push(blank.project());
                },

                addCertification() {
                    this.cv.certifications.push(blank.certification());
                },

                addLanguage() {
                    this.cv.languages.push(blank.language());
                },

                addReference() {
                    this.cv.references.push(blank.reference());
                },

                duplicateItem(collection, index) {
                    this.cv[collection].splice(index + 1, 0, { ...this.cv[collection][index], id: id() });
                },

                removeItem(collection, index) {
                    if (this.cv[collection].length > 1 || ['projects', 'references'].includes(collection)) {
                        this.cv[collection].splice(index, 1);
                    }
                },

                initials() {
                    return (this.cv.name || 'CV').split(' ').map(word => word[0]).join('').slice(0, 2).toUpperCase();
                },

                uploadPhoto(event) {
                    const file = event.target.files[0];
                    if (!file) return;
                    if (!['image/jpeg', 'image/png'].includes(file.type) || file.size > 2 * 1024 * 1024) {
                        alert('Please choose a JPG or PNG image smaller than 2 MB.');
                        event.target.value = '';
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = e => {
                        this.cv.photo = e.target.result;
                        this.markChanged();
                    };
                    reader.readAsDataURL(file);
                },

                contactList() {
                    const list = [];
                    if (this.cv.phone) list.push({ label: 'Phone', value: this.cv.phone });
                    if (this.cv.email) list.push({ label: 'Email', value: this.cv.email });
                    if (this.cv.location) list.push({ label: 'Location', value: this.cv.location });
                    if (this.cv.website) list.push({ label: 'Website', value: this.cv.website });
                    if (this.cv.linkedin) list.push({ label: 'LinkedIn', value: this.cv.linkedin });
                    if (this.cv.github) list.push({ label: 'GitHub', value: this.cv.github });
                    return list;
                },

                downloadPdf(openInNewTab = false) {
                    this.downloading = true;
                    fetch(@js(route('cv-builder.pdf')), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/pdf, application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            ...this.cv,
                            template: this.template,
                            color: this.cv.settings.accent || '#4f46e5'
                        })
                    })
                    .then(async response => {
                        const contentType = response.headers.get('content-type') || '';
                        if (!response.ok || !contentType.includes('application/pdf')) {
                            let errorMsg = 'PDF generation failed.';
                            try {
                                const data = await response.json();
                                errorMsg = data.message || Object.values(data.errors || {}).flat().join('\n') || errorMsg;
                            } catch {
                                const txt = await response.text();
                                if (txt && !txt.startsWith('<!doctype') && !txt.startsWith('<html')) {
                                    errorMsg = txt;
                                }
                            }
                            throw new Error(errorMsg);
                        }
                        return response.blob();
                    })
                    .then(blob => {
                        if (!blob || blob.size === 0) {
                            throw new Error('Generated PDF is empty. Please verify your details.');
                        }
                        const pdfBlob = new Blob([blob], { type: 'application/pdf' });
                        const url = URL.createObjectURL(pdfBlob);

                        if (openInNewTab) {
                            window.open(url, '_blank');
                            setTimeout(() => URL.revokeObjectURL(url), 120000);
                            return;
                        }

                        const link = document.createElement('a');
                        link.style.display = 'none';
                        link.href = url;
                        const safeName = (this.cv.name || 'cv-bulder').toLowerCase().replace(/[^a-z0-9]/g, '-').replace(/-+/g, '-');
                        link.download = `${safeName}-cv.pdf`;
                        document.body.appendChild(link);
                        link.click();
                        setTimeout(() => {
                            if (link.parentNode) link.parentNode.removeChild(link);
                            URL.revokeObjectURL(url);
                        }, 60000);
                    })
                    .catch(err => {
                        alert(err.message || 'The PDF could not be created. Please review your details and try again.');
                    })
                    .finally(() => {
                        this.downloading = false;
                    });
                }
            };
        }
    </script>
</x-app-layout>
