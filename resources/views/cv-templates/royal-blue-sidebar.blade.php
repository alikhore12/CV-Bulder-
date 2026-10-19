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
        .watermark span { display: inline-block; transform: rotate(-35deg); margin-top: 130mm; color: #f1f5f9; font-size: {{ $watermarkSize ?? 60 }}pt; font-weight: 900; white-space: nowrap; text-transform: uppercase; }

        .royal-sidebar-layout { display: table; width: 100%; height: 297mm; table-layout: fixed; }
        .sidebar, .main { display: table-cell; vertical-align: top; }
        .sidebar { width: 72mm; height: 297mm; background: #0b325b; color: #fff; padding: 12mm 7mm 10mm; position: relative; }
        .main { width: 138mm; height: 297mm; background: #ffffff; padding: 12mm 10mm 10mm; }

        .photo-wrap { text-align: center; margin-bottom: 5mm; }
        .photo { width: 26mm; height: 26mm; border-radius: 50%; border: 3px solid #ffffff; object-fit: cover; }
        .initials { display: inline-block; width: 26mm; height: 26mm; line-height: 26mm; border-radius: 50%; border: 3px solid #ffffff; background: #1e4a78; color: #38bdf8; font-size: 14pt; font-weight: bold; text-align: center; }
        .name { color: #fff; font-size: 14pt; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; margin: 2mm 0 1mm; line-height: 1.1; }
        .headline { color: #38bdf8; font-size: 7pt; font-weight: bold; text-transform: uppercase; letter-spacing: 1.5px; }

        .side-section { margin-top: 6mm; border-top: 1px solid rgba(255,255,255,0.15); padding-top: 3.5mm; }
        .side-heading { color: #ffffff; font-size: 7.5pt; font-weight: 900; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 3mm; }
        .contact-item { margin-bottom: 2.2mm; font-size: 6.8pt; color: #e2e8f0; word-break: break-all; }
        .contact-icon { display: inline-block; width: 4mm; color: #38bdf8; font-weight: bold; }

        .skill-item { margin-bottom: 2.5mm; }
        .skill-name { font-size: 6.8pt; color: #e2e8f0; font-weight: 600; margin-bottom: 1mm; }
        .skill-track { height: 1.5mm; background: #082547; border-radius: 1mm; overflow: hidden; }
        .skill-bar { height: 100%; background: #00b4d8; border-radius: 1mm; }

        .main-section { margin-bottom: 5.5mm; }
        .section-header { margin-bottom: 2.5mm; border-bottom: 1.5px solid #e2e8f0; padding-bottom: 1.5mm; }
        .section-icon { display: inline-block; width: 5mm; height: 5mm; line-height: 5mm; background: #0b325b; color: #fff; border-radius: 1mm; text-align: center; font-size: 6pt; margin-right: 2mm; vertical-align: middle; }
        .section-title { display: inline-block; vertical-align: middle; color: #0b325b; font-size: 8.5pt; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; }

        .summary-text { font-size: 7.2pt; line-height: 1.45; color: #475569; }
        .item-entry { margin-bottom: 3.5mm; }
        .item-title { font-size: 8pt; font-weight: bold; color: #0b325b; margin-bottom: 0.5mm; }
        .item-meta { font-size: 6.8pt; font-weight: 600; color: #00b4d8; margin-bottom: 1mm; }
        .item-desc { font-size: 7pt; line-height: 1.35; color: #475569; white-space: pre-line; }

        .cert-list { list-style: none; padding: 0; margin: 0; }
        .cert-item { font-size: 7pt; color: #334155; margin-bottom: 1.5mm; }
        .cert-bullet { color: #00b4d8; font-weight: bold; margin-right: 1.5mm; }
    </style>
</head>
<body>
    <div class="page">
        <div class="watermark"><span>{{ $watermarkText ?? 'CV' }}</span></div>

        <div class="royal-sidebar-layout">
            <!-- Left Sidebar -->
            <div class="sidebar">
                <div class="photo-wrap">
                    @if (!empty($cv['photo']))
                        <img src="{{ $cv['photo'] }}" alt="Photo" class="photo">
                    @else
                        <span class="initials">{{ collect(explode(' ', trim($cv['name'] ?? 'MH')))->map(fn ($w) => substr($w, 0, 1))->join('') }}</span>
                    @endif
                    <div class="name">{{ $cv['name'] ?? 'Muhammad Hamza' }}</div>
                    <div class="headline">{{ $cv['headline'] ?? 'Software Engineer' }}</div>
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
                    @if (!empty($cv['github']))
                        <div class="contact-item"><span class="contact-icon">gh</span> {{ $cv['github'] }}</div>
                    @endif
                </div>

                <!-- Skills -->
                <div class="side-section">
                    <div class="side-heading">Skills</div>
                    @php
                        $skillsToRender = !empty($cv['skillItems']) ? $cv['skillItems'] : (!empty($cv['skills']) ? collect(explode(',', $cv['skills']))->map(fn($s) => ['name' => trim($s), 'level' => ''])->all() : [
                            ['name' => 'HTML', 'level' => ''], ['name' => 'CSS', 'level' => ''], ['name' => 'JavaScript', 'level' => ''], ['name' => 'React.js', 'level' => ''], ['name' => 'Node.js', 'level' => ''], ['name' => 'MongoDB', 'level' => ''], ['name' => 'SQL', 'level' => ''], ['name' => 'Git & GitHub', 'level' => '']
                        ]);
                    @endphp
                    @foreach ($skillsToRender as $skill)
                        @if (!empty($skill['name']))
                            <div class="skill-item">
                                <div class="skill-name">{{ $skill['name'] }}</div>
                                <div class="skill-track"><div class="skill-bar" style="width: {{ $skill['level'] === 'Expert' ? '95%' : ($skill['level'] === 'Advanced' ? '85%' : ($skill['level'] === 'Intermediate' ? '70%' : '80%')) }};"></div></div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Languages -->
                @if (!empty($cv['languages']))
                    <div class="side-section">
                        <div class="side-heading">Languages</div>
                        @foreach ($cv['languages'] as $lang)
                            @if (!empty($lang['name']))
                                <div class="skill-item">
                                    <div class="skill-name">{{ $lang['name'] }} <small style="color: #38bdf8; float: right;">{{ $lang['level'] ?? 'Fluent' }}</small></div>
                                    <div class="skill-track"><div class="skill-bar" style="width: 85%;"></div></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right Main Area -->
            <div class="main">
                <!-- About Me -->
                <div class="main-section">
                    <div class="section-header">
                        <span class="section-icon">★</span>
                        <span class="section-title">About Me</span>
                    </div>
                    <div class="summary-text">
                        {{ $cv['summary'] ?? 'Motivated and detail-oriented Software Engineer with a strong foundation in building web applications and problem solving. Passionate about learning new technologies and delivering high-quality solutions.' }}
                    </div>
                </div>

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
                                    <div class="item-title">{{ $edu['degree'] ?? 'BS Computer Science' }}</div>
                                    <div style="font-size: 7.2pt; color: #334155;">{{ $edu['institution'] ?? 'University of Lahore' }}</div>
                                    <div class="item-meta">{{ collect([!empty($edu['startYear']) && !empty($edu['endYear']) ? "{$edu['startYear']} – {$edu['endYear']}" : ($edu['startYear'] ?? $edu['endYear'] ?? ''), !empty($edu['obtainedMarks']) || !empty($edu['percentage']) ? 'CGPA: '.($edu['obtainedMarks'] ?? $edu['percentage']) : ''])->filter()->join(' | ') }}</div>
                                    @if (!empty($edu['description']))
                                        <div class="item-desc">{{ $edu['description'] }}</div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

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
                                    <div class="item-title">{{ $exp['position'] ?? 'Software Engineer Intern' }}</div>
                                    <div class="item-meta">{{ collect([$exp['company'] ?? 'ABC Tech Solutions', collect([$exp['startDate'] ?? '', !empty($exp['current']) ? 'Present' : ($exp['endDate'] ?? '')])->filter()->join(' – ')])->filter()->join(' | ') }}</div>
                                    @if (!empty($exp['description']))
                                        <div class="item-desc">{{ $exp['description'] }}</div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

                <!-- Projects -->
                @if (!empty($cv['projects']))
                    <div class="main-section">
                        <div class="section-header">
                            <span class="section-icon">📁</span>
                            <span class="section-title">Projects</span>
                        </div>
                        @foreach ($cv['projects'] as $proj)
                            @if (!empty($proj['name']))
                                <div class="item-entry">
                                    <div class="item-title">{{ $proj['name'] }}</div>
                                    @if (!empty($proj['description']))
                                        <div class="item-desc">{{ $proj['description'] }}</div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

                <!-- Certifications -->
                @if (!empty($cv['certifications']))
                    <div class="main-section">
                        <div class="section-header">
                            <span class="section-icon">🏅</span>
                            <span class="section-title">Certifications</span>
                        </div>
                        <ul class="cert-list">
                            @foreach ($cv['certifications'] as $cert)
                                @if (!empty($cert['name']))
                                    <li class="cert-item"><span class="cert-bullet">▪</span> <strong>{{ $cert['name'] }}</strong> @if(!empty($cert['organization'])) – {{ $cert['organization'] }} @endif</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
