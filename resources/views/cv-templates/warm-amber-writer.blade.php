<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4 portrait; margin: 0; }
        * { box-sizing: border-box; }
        html, body { width: 210mm; height: 297mm; margin: 0; padding: 0; }
        body { overflow: hidden; color: #334155; background: #fff; font: 8pt/1.3 system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif; }
        .page { position: relative; width: 210mm; height: 297mm; overflow: hidden; }

        .watermark { position: absolute; inset: 0; z-index: 0; text-align: center; overflow: hidden; pointer-events: none; }
        .watermark span { display: inline-block; transform: rotate(-35deg); margin-top: 130mm; color: #fefce8; font-size: {{ $watermarkSize ?? 60 }}pt; font-weight: 900; white-space: nowrap; text-transform: uppercase; }

        .warm-amber-layout { display: table; width: 100%; height: 297mm; table-layout: fixed; }
        .sidebar, .main { display: table-cell; vertical-align: top; }
        .sidebar { width: 72mm; height: 297mm; background: #fffbeb; border-right: 1px solid #fde68a; color: #334155; padding: 12mm 7mm 10mm; }
        .main { width: 138mm; height: 297mm; background: #ffffff; padding: 12mm 10mm 10mm; }

        .photo-wrap { text-align: center; margin-bottom: 5mm; }
        .photo { width: 26mm; height: 26mm; border-radius: 50%; border: 3px solid #f59e0b; object-fit: cover; }
        .initials { display: inline-block; width: 26mm; height: 26mm; line-height: 26mm; border-radius: 50%; border: 3px solid #f59e0b; background: #fef3c7; color: #d97706; font-size: 14pt; font-weight: bold; text-align: center; }
        .name { color: #0f172a; font-size: 14pt; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; margin: 2mm 0 1mm; line-height: 1.1; }
        .headline { color: #ea580c; font-size: 7.2pt; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; }

        .side-section { margin-top: 6mm; border-top: 1px solid #fcd34d; padding-top: 3.5mm; }
        .side-heading { color: #0f172a; font-size: 7.5pt; font-weight: 900; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 3mm; }
        .contact-item { margin-bottom: 2.2mm; font-size: 6.8pt; color: #334155; word-break: break-all; }
        .contact-icon { display: inline-block; width: 4mm; color: #ea580c; font-weight: bold; }

        .skill-item { display: table; width: 100%; margin-bottom: 2mm; font-size: 6.8pt; }
        .skill-name { display: table-cell; vertical-align: middle; color: #0f172a; font-weight: 500; }
        .skill-dots { display: table-cell; vertical-align: middle; text-align: right; color: #f59e0b; font-size: 7pt; }

        .main-section { margin-bottom: 5.5mm; }
        .section-header { margin-bottom: 2.5mm; border-bottom: 1.5px solid #fef3c7; padding-bottom: 1.5mm; }
        .section-icon { display: inline-block; width: 5mm; height: 5mm; line-height: 5mm; background: #ea580c; color: #fff; border-radius: 1mm; text-align: center; font-size: 6pt; margin-right: 2mm; vertical-align: middle; }
        .section-title { display: inline-block; vertical-align: middle; color: #0f172a; font-size: 8.5pt; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; }

        .summary-text { font-size: 7.2pt; line-height: 1.45; color: #475569; }
        .item-entry { margin-bottom: 3.5mm; }
        .item-title { font-size: 8pt; font-weight: bold; color: #0f172a; margin-bottom: 0.5mm; }
        .item-meta { font-size: 6.8pt; font-weight: 600; color: #ea580c; margin-bottom: 1mm; }
        .item-desc { font-size: 7pt; line-height: 1.35; color: #475569; white-space: pre-line; }

        .project-cards { display: table; width: 100%; table-layout: fixed; }
        .project-card-cell { display: table-cell; width: 50%; padding-right: 2.5mm; }
        .project-card-cell:last-child { padding-right: 0; padding-left: 2.5mm; }
        .project-box { border: 1px solid #fde68a; background: #fffdf5; border-radius: 2mm; padding: 2.5mm 3mm; }
        .project-box-title { color: #0f172a; font-weight: bold; font-size: 7.2pt; margin-bottom: 1mm; }
        .project-box-desc { color: #475569; font-size: 6.5pt; line-height: 1.3; }
    </style>
</head>
<body>
    <div class="page">
        <div class="watermark"><span>{{ $watermarkText ?? 'CV' }}</span></div>

        <div class="warm-amber-layout">
            <!-- Left Column -->
            <div class="sidebar">
                <div class="photo-wrap">
                    @if (!empty($cv['photo']))
                        <img src="{{ $cv['photo'] }}" alt="Photo" class="photo">
                    @else
                        <span class="initials">{{ collect(explode(' ', trim($cv['name'] ?? 'TR')))->map(fn ($w) => substr($w, 0, 1))->join('') }}</span>
                    @endif
                    <div class="name">{{ $cv['name'] ?? 'Talha Raza' }}</div>
                    <div class="headline">{{ $cv['headline'] ?? 'Content Writer' }}</div>
                </div>

                <!-- Contact -->
                <div class="side-section">
                    <div class="side-heading">Contact</div>
                    @if (!empty($cv['phone']))
                        <div class="contact-item"><span class="contact-icon">☎</span> {{ $cv['phone'] }}</div>
                    @endif
                    @if (!empty($cv['email']))
                        <div class="contact-item"><span class="contact-icon">✉</span> {{ $cv['email'] }}</div>
                    @endif
                    @if (!empty($cv['location']) || !empty($cv['fullAddress']))
                        <div class="contact-item"><span class="contact-icon">⌖</span> {{ $cv['location'] ?? $cv['fullAddress'] }}</div>
                    @endif
                    @if (!empty($cv['linkedin']))
                        <div class="contact-item"><span class="contact-icon">in</span> {{ $cv['linkedin'] }}</div>
                    @endif
                </div>

                <!-- Skills -->
                <div class="side-section">
                    <div class="side-heading">Skills</div>
                    @php
                        $skillsToRender = !empty($cv['skillItems']) ? $cv['skillItems'] : (!empty($cv['skills']) ? collect(explode(',', $cv['skills']))->map(fn($s) => ['name' => trim($s), 'level' => ''])->all() : [
                            ['name' => 'Content Writing', 'level' => ''], ['name' => 'Blog Writing', 'level' => ''], ['name' => 'SEO Writing', 'level' => ''], ['name' => 'Research', 'level' => ''], ['name' => 'Editing', 'level' => ''], ['name' => 'WordPress', 'level' => '']
                        ]);
                    @endphp
                    @foreach ($skillsToRender as $skill)
                        @if (!empty($skill['name']))
                            <div class="skill-item">
                                <span class="skill-name">{{ $skill['name'] }}</span>
                                <span class="skill-dots">● ● ● ● ○</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Right Column -->
            <div class="main">
                <!-- About Me -->
                <div class="main-section">
                    <div class="section-header">
                        <span class="section-icon">★</span>
                        <span class="section-title">About Me</span>
                    </div>
                    <div class="summary-text">
                        {{ $cv['summary'] ?? 'Creative and detail-oriented Content Writer with a passion for creating engaging and SEO-friendly content. Skilled in writing blogs, articles and website content.' }}
                    </div>
                </div>

                <!-- Experience -->
                @if (!empty($cv['experience']))
                    <div class="main-section">
                        <div class="section-header">
                            <span class="section-icon">💼</span>
                            <span class="section-title">Experience</span>
                        </div>
                        @foreach ($cv['experience'] as $exp)
                            @if (!empty($exp['position']) || !empty($exp['company']))
                                <div class="item-entry">
                                    <div class="item-title">{{ $exp['position'] ?? 'Content Writer' }}</div>
                                    <div class="item-meta">{{ collect([$exp['company'] ?? 'Digital World', collect([$exp['startDate'] ?? '', !empty($exp['current']) ? 'Present' : ($exp['endDate'] ?? '')])->filter()->join(' – ')])->filter()->join(' | ') }}</div>
                                    @if (!empty($exp['description']))
                                        <div class="item-desc">{{ $exp['description'] }}</div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

                <!-- Projects (Side by Side Cards) -->
                @if (!empty($cv['projects']))
                    <div class="main-section">
                        <div class="section-header">
                            <span class="section-icon">📁</span>
                            <span class="section-title">Projects</span>
                        </div>
                        <div class="project-cards">
                            @foreach (array_slice($cv['projects'], 0, 2) as $proj)
                                @if (!empty($proj['name']))
                                    <div class="project-card-cell">
                                        <div class="project-box">
                                            <div class="project-box-title">{{ $proj['name'] }}</div>
                                            <div class="project-box-desc">{{ $proj['description'] ?? '' }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Education -->
                @if (!empty($cv['education']))
                    <div class="main-section">
                        <div class="section-header">
                            <span class="section-icon">🎓</span>
                            <span class="section-title">Education</span>
                        </div>
                        @foreach ($cv['education'] as $edu)
                            @if (!empty($edu['degree']) || !empty($edu['institution']))
                                <div class="item-entry">
                                    <div class="item-title">{{ $edu['degree'] ?? 'BA English' }}</div>
                                    <div style="font-size: 7.2pt; color: #334155;">{{ $edu['institution'] ?? 'Government College University, Faisalabad' }}</div>
                                    <div class="item-meta" style="color: #64748b;">{{ collect([!empty($edu['startYear']) && !empty($edu['endYear']) ? "{$edu['startYear']} – {$edu['endYear']}" : ($edu['startYear'] ?? $edu['endYear'] ?? ''), !empty($edu['obtainedMarks']) || !empty($edu['percentage']) ? 'CGPA: '.($edu['obtainedMarks'] ?? $edu['percentage']) : ''])->filter()->join(' | ') }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
