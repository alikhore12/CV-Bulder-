<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CV-BULDER: Create professional, ATS-friendly CVs and resumes online with 9 premium templates, AI-powered writing assistance, and instant PDF download.">
    <link rel="canonical" href="{{ url('/') }}">
    <meta property="og:title" content="CV-BULDER — Professional ATS Resume & CV Builder">
    <meta property="og:description" content="Build a polished, ATS-friendly CV in minutes with 9 recruiter-tested templates and instant PDF export.">
    <meta property="og:type" content="website">
    <title>CV-BULDER — Professional ATS Resume & CV Builder</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#080c14] text-slate-100 antialiased selection:bg-cyan-500 selection:text-white">
<div class="relative overflow-hidden">
    <!-- Ambient Background Glows -->
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-[300px] left-1/2 h-[750px] w-[1000px] -translate-x-1/2 rounded-full bg-gradient-to-tr from-indigo-600/20 via-violet-600/15 to-cyan-500/20 blur-[130px]"></div>
        <div class="absolute top-[40%] -left-[200px] h-[550px] w-[600px] rounded-full bg-cyan-600/10 blur-[120px]"></div>
        <div class="absolute top-[75%] -right-[200px] h-[550px] w-[600px] rounded-full bg-violet-600/15 blur-[120px]"></div>
    </div>

    <!-- Navigation Bar -->
    <header class="sticky top-0 z-40 border-b border-white/10 bg-[#080c14]/85 backdrop-blur-xl" x-data="{ open: false }">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8" aria-label="Main navigation">
            <a href="{{ url('/') }}" class="group flex items-center gap-3 transition-transform duration-200 hover:scale-105">
                <div class="relative flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-tr from-cyan-400 via-indigo-500 to-violet-600 p-[1.5px] shadow-lg shadow-indigo-500/25">
                    <div class="flex h-full w-full items-center justify-center rounded-[10px] bg-slate-950">
                        <svg class="h-5 w-5 text-cyan-400" width="20" height="20" style="width:20px;height:20px;max-width:20px;max-height:20px;display:inline-block;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col text-left leading-tight">
                    <span class="text-xl font-black tracking-wider text-white">CV-<span class="bg-gradient-to-r from-cyan-400 via-indigo-400 to-violet-400 bg-clip-text text-transparent">BULDER</span></span>
                    <span class="text-[9px] font-bold uppercase tracking-widest text-slate-400">Pro Studio</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <div class="hidden items-center gap-8 text-sm font-semibold text-slate-300 lg:flex">
                <a href="#templates" class="transition hover:text-cyan-400">Templates (9)</a>
                <a href="#features" class="transition hover:text-cyan-400">Features</a>
                <a href="#how-it-works" class="transition hover:text-cyan-400">How It Works</a>
                <a href="#faq" class="transition hover:text-cyan-400">FAQ</a>
            </div>

            <!-- Right Buttons -->
            <div class="hidden items-center gap-4 lg:flex">
                @auth
                    <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-slate-300 hover:text-white transition">My Profile</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-300 hover:text-white transition">Log in</a>
                @endauth
                <a href="{{ route('cv-builder') }}" class="group relative inline-flex items-center gap-2 overflow-hidden rounded-full bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 px-6 py-2.5 text-sm font-bold text-white shadow-lg shadow-indigo-500/25 transition-all duration-300 hover:scale-[1.03] hover:shadow-cyan-500/30 active:scale-[0.98]">
                    <span>Open CV-BULDER</span>
                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button type="button" class="rounded-xl border border-white/10 p-2 text-slate-300 lg:hidden hover:bg-white/5" @click="open = !open" aria-label="Toggle navigation">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </nav>

        <!-- Mobile Drawer -->
        <div x-show="open" x-cloak class="border-t border-white/10 bg-[#080c14]/95 px-6 py-5 lg:hidden">
            <div class="flex flex-col gap-4 text-sm font-medium text-slate-300">
                <a href="#templates" @click="open = false" class="py-1">Templates</a>
                <a href="#features" @click="open = false" class="py-1">Features</a>
                <a href="#how-it-works" @click="open = false" class="py-1">How It Works</a>
                <a href="#faq" @click="open = false" class="py-1">FAQ</a>
                <div class="pt-3 border-t border-white/10 flex flex-col gap-3">
                    @auth
                        <a href="{{ route('profile.edit') }}" class="text-slate-300">Profile</a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-300">Log in</a>
                    @endauth
                    <a href="{{ route('cv-builder') }}" class="rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 px-5 py-3 text-center font-bold text-white shadow-md">
                        Open CV-BULDER →
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="relative isolate pt-14 pb-20 lg:pt-24 lg:pb-32">
            <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
                <div>
                    <!-- Badge -->
                    <div class="mb-6 inline-flex items-center gap-2.5 rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-1.5 text-xs font-bold text-cyan-300 shadow-sm backdrop-blur">
                        <span class="flex h-2 w-2 rounded-full bg-cyan-400 animate-pulse"></span>
                        Next-Gen ATS Career Studio
                    </div>

                    <!-- Heading -->
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl lg:leading-[1.1]">
                        Build an ATS-Winning CV with <span class="bg-gradient-to-r from-cyan-400 via-indigo-300 to-violet-400 bg-clip-text text-transparent">CV-BULDER</span>
                    </h1>

                    <!-- Paragraph -->
                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-300">
                        Create a recruiter-ready, modern curriculum vitae in minutes. Choose from <span class="text-white font-semibold">9 professional templates</span>, refine bullet points with writing tools, preview changes live, and download crisp A4 PDFs instantly.
                    </p>

                    <!-- CTAs -->
                    <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ route('cv-builder') }}" class="group inline-flex items-center justify-center gap-2.5 rounded-xl bg-gradient-to-r from-cyan-500 via-indigo-600 to-violet-600 px-8 py-4 font-bold text-white shadow-xl shadow-indigo-500/25 transition-all duration-200 hover:scale-[1.03] hover:shadow-cyan-500/35 active:scale-[0.98]">
                            <span>Create My CV Now</span>
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#templates" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/15 bg-white/5 px-7 py-4 font-semibold text-white backdrop-blur transition hover:bg-white/10 hover:border-white/30">
                            <span>Explore 9 Templates</span>
                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                    </div>

                    <!-- Trust Stats Bar -->
                    <div class="mt-12 grid grid-cols-2 gap-4 border-t border-white/10 pt-8 sm:grid-cols-4">
                        <div>
                            <div class="text-2xl font-black text-white">100%</div>
                            <div class="text-xs font-medium text-slate-400">Free to Export</div>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-cyan-400">9 Templates</div>
                            <div class="text-xs font-medium text-slate-400">Recruiter Approved</div>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-indigo-400">98%</div>
                            <div class="text-xs font-medium text-slate-400">ATS Pass Rate</div>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-emerald-400">Instant</div>
                            <div class="text-xs font-medium text-slate-400">A4 PDF & Print</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual (Interactive Mockup) -->
                <div class="relative mx-auto w-full max-w-lg lg:max-w-none">
                    <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-cyan-500/20 via-indigo-500/20 to-violet-500/20 blur-2xl"></div>

                    <div class="relative rounded-2xl border border-white/20 bg-slate-900/90 p-5 shadow-2xl backdrop-blur-xl sm:p-7">
                        <!-- Window chrome -->
                        <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-5">
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-rose-500/80"></span>
                                <span class="h-3 w-3 rounded-full bg-amber-500/80"></span>
                                <span class="h-3 w-3 rounded-full bg-emerald-500/80"></span>
                                <span class="ml-2 text-xs font-semibold text-slate-400">CV-BULDER Live Canvas · A4</span>
                            </div>
                            <span class="rounded-full bg-emerald-500/20 px-2.5 py-0.5 text-[10px] font-bold text-emerald-300">ATS Ready</span>
                        </div>

                        <!-- Mini CV Canvas Preview -->
                        <div class="rounded-xl bg-white p-5 text-slate-900 shadow-md">
                            <div class="flex items-start justify-between border-b border-slate-200 pb-4">
                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-900">Muhammad Hamza</h3>
                                    <p class="text-xs font-bold text-indigo-600 mt-0.5">Lead Software Engineer</p>
                                </div>
                                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-indigo-500 to-cyan-500 text-white font-bold grid place-items-center text-sm shadow">
                                    MH
                                </div>
                            </div>

                            <div class="grid grid-cols-[0.85fr_1.4fr] gap-4 pt-4 text-[9px] leading-relaxed">
                                <div class="space-y-3 border-r border-slate-100 pr-3 text-slate-600">
                                    <div>
                                        <div class="font-extrabold uppercase text-slate-800 tracking-wider">Contact</div>
                                        <div>hamza@example.com</div>
                                        <div>Lahore, Pakistan</div>
                                        <div>linkedin.com/in/hamza</div>
                                    </div>
                                    <div>
                                        <div class="font-extrabold uppercase text-slate-800 tracking-wider">Skills</div>
                                        <div class="mt-1 flex flex-wrap gap-1">
                                            <span class="rounded bg-indigo-50 px-1.5 py-0.5 font-bold text-indigo-700">Laravel</span>
                                            <span class="rounded bg-indigo-50 px-1.5 py-0.5 font-bold text-indigo-700">Vue.js</span>
                                            <span class="rounded bg-indigo-50 px-1.5 py-0.5 font-bold text-indigo-700">MySQL</span>
                                            <span class="rounded bg-indigo-50 px-1.5 py-0.5 font-bold text-indigo-700">Docker</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-3 text-slate-600">
                                    <div>
                                        <div class="font-extrabold uppercase text-slate-800 tracking-wider">Professional Summary</div>
                                        <p class="mt-0.5 text-slate-500">Full-stack engineer with 6+ years driving scalable web platforms, high-performance APIs and mission-critical cloud deployments.</p>
                                    </div>
                                    <div>
                                        <div class="font-extrabold uppercase text-slate-800 tracking-wider">Experience</div>
                                        <div class="mt-1">
                                            <span class="font-bold text-slate-900">Senior Architect · TechScale</span>
                                            <div class="text-indigo-600 font-semibold">2021 — Present</div>
                                            <p class="text-slate-500 mt-0.5">• Scaled application throughput by 65% across 2M+ active transactions.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Badges -->
                        <div class="mt-5 flex items-center justify-between text-xs text-slate-400">
                            <div class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                <span>Realtime Live Synchronized</span>
                            </div>
                            <a href="{{ route('cv-builder') }}" class="font-bold text-cyan-400 hover:text-cyan-300">
                                Open in Builder →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Template Showcase Section -->
        <section id="templates" class="relative border-t border-white/10 bg-[#0b0f19] py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-400">Curated & ATS-Optimized</p>
                        <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                            9 Premium CV Templates
                        </h2>
                        <p class="mt-3 max-w-2xl text-base text-slate-400">
                            Handcrafted for modern hiring standards. Each layout ensures readability by automated ATS bots and human hiring managers alike.
                        </p>
                    </div>

                    <a href="{{ route('cv-builder') }}" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-5 py-2.5 text-sm font-semibold text-white hover:bg-white/15 transition">
                        <span>Launch Builder with Default</span>
                        <span>→</span>
                    </a>
                </div>

                <!-- Template Grid -->
                <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @php
                        $templateStyles = [
                            'classic' => ['bg' => 'from-slate-900 to-indigo-950', 'accent' => '#4f46e5', 'badge' => 'Classic Best-Seller'],
                            'modern' => ['bg' => 'from-teal-950 to-slate-900', 'accent' => '#0f766e', 'badge' => 'Executive Modern'],
                            'minimal' => ['bg' => 'from-slate-900 to-stone-900', 'accent' => '#334155', 'badge' => 'Clean Minimalist'],
                            'elegant' => ['bg' => 'from-amber-950/60 to-slate-900', 'accent' => '#d97706', 'badge' => 'Editorial Serif'],
                            'compact' => ['bg' => 'from-cyan-950 to-slate-900', 'accent' => '#06b6d4', 'badge' => 'Information Dense'],
                            'blue-cyan-wave' => ['bg' => 'from-blue-950 to-cyan-900', 'accent' => '#0284c7', 'badge' => 'Creative Wave'],
                            'black-yellow-sidebar' => ['bg' => 'from-stone-950 to-amber-950/40', 'accent' => '#f4c400', 'badge' => 'Editorial Contrast'],
                            'minimal-dark-sidebar' => ['bg' => 'from-zinc-950 to-slate-900', 'accent' => '#64748b', 'badge' => 'Corporate Sidebar'],
                            'navy-blue-geometric' => ['bg' => 'from-indigo-950 to-slate-950', 'accent' => '#6366f1', 'badge' => 'Geometric Impact'],
                        ];
                    @endphp

                    @foreach ($templates as $tmpl)
                        @php
                            $style = $templateStyles[$tmpl['slug']] ?? ['bg' => 'from-slate-900 to-indigo-950', 'accent' => '#6366f1', 'badge' => 'Professional'];
                        @endphp
                        <div class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-white/10 bg-slate-900/60 p-5 shadow-lg backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:border-cyan-400/40 hover:shadow-cyan-500/10">
                            <!-- Visual Preview Box -->
                            <div>
                                <div class="relative flex h-[252px] items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br {{ $style['bg'] }} p-4">
                                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_0%,rgba(255,255,255,0.08),transparent_60%)]"></div>

                                    <!-- Real High-Fidelity A4 Miniature Template Preview -->
                                    <x-cv-template-thumbnail :slug="$tmpl['slug']" size="lg" />

                                    <span class="absolute top-3 left-3 rounded-full border border-white/15 bg-black/50 px-2.5 py-0.5 text-[10px] font-bold text-white backdrop-blur shadow-sm">
                                        {{ $style['badge'] }}
                                    </span>
                                </div>

                                <div class="mt-5">
                                    <h3 class="text-lg font-bold text-white group-hover:text-cyan-400 transition-colors">
                                        {{ $tmpl['name'] }}
                                    </h3>
                                    <p class="mt-1.5 text-xs leading-relaxed text-slate-400">
                                        {{ $tmpl['description'] }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
                                <span class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">A4 Ready</span>
                                <a href="{{ route('cv-builder', ['template' => $tmpl['slug']]) }}" class="inline-flex items-center gap-1.5 rounded-lg bg-cyan-400/10 px-3.5 py-2 text-xs font-bold text-cyan-300 hover:bg-cyan-400 hover:text-slate-950 transition-all">
                                    <span>Use Template</span>
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Features Bento Grid -->
        <section id="features" class="relative border-t border-white/10 bg-[#080c14] py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-400">Engineered For Success</p>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Everything You Need to Stand Out
                    </h2>
                    <p class="mt-3 text-base text-slate-400">
                        CV-BULDER is packed with intelligent tools designed to turn messy job histories into polished career stories.
                    </p>
                </div>

                <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-7 backdrop-blur hover:border-cyan-400/30 transition-colors">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-tr from-cyan-500 to-indigo-600 text-xl text-white shadow-md shadow-cyan-500/20">
                            ✦
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-white">AI Writing Assistance</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">
                            Generate impact-driven summaries, concise role descriptions, and quantified achievements tailored to your domain.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-7 backdrop-blur hover:border-cyan-400/30 transition-colors">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-tr from-indigo-500 to-violet-600 text-xl text-white shadow-md shadow-indigo-500/20">
                            ⌁
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-white">ATS-Ready by Default</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">
                            Structured data schemas, proper heading hierarchies, and standard font stacks that Applicant Tracking Systems can easily parse.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-7 backdrop-blur hover:border-cyan-400/30 transition-colors">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-600 text-xl text-white shadow-md shadow-emerald-500/20">
                            ↗
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-white">Realtime Synchronized Preview</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">
                            Every keystroke instantly renders on the A4 paper canvas. Never guess how your final document will look before exporting.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-7 backdrop-blur hover:border-cyan-400/30 transition-colors">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-tr from-violet-500 to-rose-600 text-xl text-white shadow-md shadow-violet-500/20">
                            ↓
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-white">100% Free PDF Export</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">
                            Download high-resolution, print-ready vector PDF files with crisp text, correct page borders, and zero watermarks.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-7 backdrop-blur hover:border-cyan-400/30 transition-colors">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-tr from-amber-500 to-orange-600 text-xl text-white shadow-md shadow-amber-500/20">
                            🔒
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-white">Privacy-First Architecture</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">
                            Your personal information stays safely stored in your own browser's local cache. No creepy tracking or unwanted subscriptions.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-slate-900/60 p-7 backdrop-blur hover:border-cyan-400/30 transition-colors">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-tr from-sky-500 to-cyan-600 text-xl text-white shadow-md shadow-sky-500/20">
                            🎨
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-white">Custom Accent Colors & Photos</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">
                            Personalize your resume with curated color palettes, optional profile avatars, and flexible contact toggles.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="relative border-t border-white/10 bg-[#0b0f19] py-24">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto">
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-400">Frictionless Workflow</p>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        From Blank Screen to Hired in 4 Steps
                    </h2>
                </div>

                <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="relative rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur">
                        <div class="text-xs font-extrabold text-cyan-400">STEP 01</div>
                        <h3 class="mt-3 text-base font-bold text-white">Fill Your Details</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-400">
                            Add your contact, experience, education, skills, projects, and certifications into structured fields.
                        </p>
                    </div>

                    <div class="relative rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur">
                        <div class="text-xs font-extrabold text-indigo-400">STEP 02</div>
                        <h3 class="mt-3 text-base font-bold text-white">Select a Template</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-400">
                            Browse 9 recruiter-tested templates and pick the layout that aligns with your role and personality.
                        </p>
                    </div>

                    <div class="relative rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur">
                        <div class="text-xs font-extrabold text-violet-400">STEP 03</div>
                        <h3 class="mt-3 text-base font-bold text-white">Refine & Tailor</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-400">
                            Use writing assistance to make bullets punchy and customize the accent color for a distinctive look.
                        </p>
                    </div>

                    <div class="relative rounded-2xl border border-white/10 bg-slate-900/50 p-6 backdrop-blur">
                        <div class="text-xs font-extrabold text-emerald-400">STEP 04</div>
                        <h3 class="mt-3 text-base font-bold text-white">Download PDF & Apply</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-400">
                            Export your print-perfect A4 PDF with one click and start landing interviews with confidence.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="relative border-t border-white/10 bg-[#080c14] py-24" x-data="{ active: null }">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">
                <div class="text-center">
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-400">Frequently Asked Questions</p>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Got Questions? We’ve Got Answers.
                    </h2>
                </div>

                <div class="mt-12 space-y-4">
                    <div class="rounded-xl border border-white/10 bg-slate-900/60 p-5">
                        <button type="button" @click="active = active === 1 ? null : 1" class="flex w-full items-center justify-between text-left font-bold text-white">
                            <span>Is CV-BULDER really 100% free to use?</span>
                            <span class="text-cyan-400" x-text="active === 1 ? '−' : '+'"></span>
                        </button>
                        <div x-show="active === 1" x-cloak class="mt-3 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-3">
                            Yes! You can choose templates, edit all sections, preview in real time, and export unlimited high-resolution PDFs without paywalls or hidden watermarks.
                        </div>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-slate-900/60 p-5">
                        <button type="button" @click="active = active === 2 ? null : 2" class="flex w-full items-center justify-between text-left font-bold text-white">
                            <span>Are these templates ATS-compliant?</span>
                            <span class="text-cyan-400" x-text="active === 2 ? '−' : '+'"></span>
                        </button>
                        <div x-show="active === 2" x-cloak class="mt-3 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-3">
                            Absolutely. Our templates follow standard section names, clean HTML markup, readable typography, and structured grids that automated parsing tools (Workday, Greenhouse, Taleo) easily process.
                        </div>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-slate-900/60 p-5">
                        <button type="button" @click="active = active === 3 ? null : 3" class="flex w-full items-center justify-between text-left font-bold text-white">
                            <span>Where is my CV data saved?</span>
                            <span class="text-cyan-400" x-text="active === 3 ? '−' : '+'"></span>
                        </button>
                        <div x-show="active === 3" x-cloak class="mt-3 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-3">
                            Your drafts are saved directly in your browser's private local storage. When you generate a PDF, it is processed securely and directly delivered to your computer.
                        </div>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-slate-900/60 p-5">
                        <button type="button" @click="active = active === 4 ? null : 4" class="flex w-full items-center justify-between text-left font-bold text-white">
                            <span>Can I switch templates without losing my progress?</span>
                            <span class="text-cyan-400" x-text="active === 4 ? '−' : '+'"></span>
                        </button>
                        <div x-show="active === 4" x-cloak class="mt-3 text-sm text-slate-400 leading-relaxed border-t border-white/5 pt-3">
                            Yes! All your entered experience, education, skills, and summary automatically transfer between all 9 templates seamlessly with 1 click.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA Banner -->
        <section class="relative border-t border-white/10 bg-gradient-to-r from-cyan-950/60 via-indigo-950/60 to-violet-950/60 py-20">
            <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-8 px-6 text-center sm:flex-row sm:text-left lg:px-8">
                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Your Next Career Milestone Begins Here.
                    </h2>
                    <p class="mt-2 text-slate-300">
                        Join ambitious professionals landing offers at world-class companies.
                    </p>
                </div>
                <a href="{{ route('cv-builder') }}" class="shrink-0 rounded-full bg-white px-8 py-4 font-bold text-slate-950 shadow-2xl transition hover:bg-cyan-100 hover:scale-105">
                    Launch CV-BULDER Free →
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-[#060910] py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-tr from-cyan-400 to-indigo-600 text-xs font-black text-white">
                        CV
                    </div>
                    <span class="font-extrabold tracking-wider text-white">CV-<span class="text-cyan-400">BULDER</span></span>
                </div>
                <div class="flex gap-6 text-xs text-slate-400">
                    <a href="{{ route('cv-builder') }}" class="hover:text-white transition">CV Builder</a>
                    <a href="#templates" class="hover:text-white transition">Templates</a>
                    <a href="#features" class="hover:text-white transition">Features</a>
                    <a href="#how-it-works" class="hover:text-white transition">How It Works</a>
                    <a href="{{ route('login') }}" class="hover:text-white transition">Sign In</a>
                </div>
                <div class="text-xs text-slate-500">
                    © {{ date('Y') }} CV-BULDER. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
