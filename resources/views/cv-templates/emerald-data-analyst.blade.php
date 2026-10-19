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
        .watermark span { display: inline-block; transform: rotate(-35deg); margin-top: 130mm; color: #f0fdf4; font-size: {{ $watermarkSize ?? 60 }}pt; font-weight: 900; white-space: nowrap; text-transform: uppercase; }

        .emerald-analyst-layout { position: relative; width: 100%; height: 297mm; padding: 10mm 12mm; }

        .header-table { display: table; width: 100%; border-bottom: 2px solid #a7f3d0; padding-bottom: 5mm; margin-bottom: 5mm; }
        .header-left, .header-right { display: table-cell; vertical-align: middle; }
        .header-left { width: 60%; }
        .header-right { width: 40%; text-align: right; }

        .photo { width: 24mm; height: 24mm; border-radius: 50%; border: 3px solid #10b981; object-fit: cover; vertical-align: middle; margin-right: 4mm; display: inline-block; }
        .initials { display: inline-block; width: 24mm; height: 24mm; line-height: 24mm; border-radius: 50%; border: 3px solid #10b981; background: #d1fae5; color: #059669; font-size: 13pt; font-weight: bold; text-align: center; vertical-align: middle; margin-right: 4mm; }
        .header-titles { display: inline-block; vertical-align: middle; }
        .name { color: #0f172a; font-size: 15pt; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 0 1mm; }
        .headline { color: #059669; font-size: 7.5pt; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; }

        .contact-item { margin-bottom: 1.5mm; font-size: 6.8pt; color: #475569; }
        .contact-icon { display: inline-block; width: 4mm; color: #059669; font-weight: bold; }

        .section-header { margin-bottom: 2.5mm; border-bottom: 1.5px solid #d1fae5; padding-bottom: 1mm; }
        .section-icon { color: #059669; font-weight: bold; margin-right: 1.5mm; }
        .section-title { color: #0f172a; font-size: 8pt; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; }

        .summary-text { font-size: 7.2pt; line-height: 1.45; color: #475569; margin-bottom: 5mm; }

        .columns-table { display: table; width: 100%; table-layout: fixed; }
        .col-left, .col-right { display: table-cell; vertical-align: top; }
        .col-left { width: 48%; padding-right: 4mm; }
        .col-right { width: 52%; padding-left: 4mm; }

        .item-entry { margin-bottom: 3.5mm; }
        .item-title { font-size: 7.8pt; font-weight: bold; color: #0f172a; }
        .item-inst { font-size: 7pt; color: #334155; }
        .item-meta { font-size: 6.5pt; color: #059669; font-weight: 600; margin-bottom: 1mm; }
        .item-desc { font-size: 6.8pt; line-height: 1.35; color: #475569; white-space: pre-line; }

        .skill-item { margin-bottom: 2mm; }
        .skill-name { font-size: 6.8pt; color: #334155; font-weight: 600; margin-bottom: 0.8mm; }
        .skill-track { height: 1.5mm; background: #e2e8f0; border-radius: 1mm; overflow: hidden; }
        .skill-bar { height: 100%; background: #10b981; border-radius: 1mm; }

        .badges-table { display: table; width: 100%; margin-top: 5mm; border-top: 1px solid #e2e8f0; padding-top: 3.5mm; table-layout: fixed; }
        .badge-cell { display: table-cell; vertical-align: top; text-align: center; padding: 2mm; }
        .badge-box { border: 1px solid #a7f3d0; background: #f0fdf4; border-radius: 2mm; padding: 2.5mm 1.5mm; }
        .badge-icon { color: #059669; font-size: 8pt; }
        .badge-text { font-size: 6.5pt; font-weight: bold; color: #0f172a; margin-top: 1mm; }
    </style>
</head>
<body>
    <div class="page">
        <div class="watermark"><span>{{ $watermarkText ?? 'CV' }}</span></div>

        <div class="emerald-analyst-layout">
            <!-- Header Table -->
            <div class="header-table">
                <div class="header-left">
                    @if (!empty($cv['photo']))
                        <img src="{{ $cv['photo'] }}" alt="Photo" class="photo">
                    @else
                        <span class="initials">{{ collect(explode(' ', trim($cv['name'] ?? 'AI')))->map(fn ($w) => substr($w, 0, 1))->join('') }}</span>
                    @endif
                    <div class="header-titles">
                        <h1 class="name">{{ $cv['name'] ?? 'Ahsan Iqbal' }}</h1>
                        <div class="headline">{{ $cv['headline'] ?? 'Data Analyst' }}</div>
                    </div>
                </div>
                <div class="header-right">
                    @if (!empty($cv['phone']))
                        <div class="contact-item">{{ $cv['phone'] }} <span class="contact-icon">☎</span></div>
                    @endif
                    @if (!empty($cv['email']))
                        <div class="contact-item">{{ $cv['email'] }} <span class="contact-icon">✉</span></div>
                    @endif
                    @if (!empty($cv['location']) || !empty($cv['fullAddress']))
                        <div class="contact-item">{{ $cv['location'] ?? $cv['fullAddress'] }} <span class="contact-icon">⌖</span></div>
                    @endif
                    @if (!empty($cv['linkedin']))
                        <div class="contact-item">{{ $cv['linkedin'] }} <span class="contact-icon">in</span></div>
                    @endif
                </div>
            </div>

            <!-- About Me -->
            <div class="section-header">
                <span class="section-icon">★</span>
                <span class="section-title">About Me</span>
            </div>
            <div class="summary-text">
                {{ $cv['summary'] ?? 'Detail-oriented Data Analyst with experience in analyzing datasets, creating dashboards and generating insights to support business decisions.' }}
            </div>

            <!-- Columns Table -->
            <div class="columns-table">
                <!-- Left Column: Education & Skills -->
                <div class="col-left">
                    <!-- Education -->
                    @if (!empty($cv['education']))
                        <div class="section-header">
                            <span class="section-icon">🎓</span>
                            <span class="section-title">Education</span>
                        </div>
                        @foreach ($cv['education'] as $edu)
                            @if (!empty($edu['degree']) || !empty($edu['institution']))
                                <div class="item-entry">
                                    <div class="item-title">{{ $edu['degree'] ?? 'BS Statistics' }}</div>
                                    <div class="item-inst">{{ $edu['institution'] ?? 'Quaid-i-Azam University' }}</div>
                                    <div class="item-meta">{{ collect([!empty($edu['startYear']) && !empty($edu['endYear']) ? "{$edu['startYear']} – {$edu['endYear']}" : ($edu['startYear'] ?? $edu['endYear'] ?? ''), !empty($edu['obtainedMarks']) || !empty($edu['percentage']) ? 'CGPA: '.($edu['obtainedMarks'] ?? $edu['percentage']) : ''])->filter()->join(' | ') }}</div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                    <!-- Skills -->
                    <div class="section-header" style="margin-top: 4mm;">
                        <span class="section-icon">📊</span>
                        <span class="section-title">Skills</span>
                    </div>
                    @php
                        $skillsToRender = !empty($cv['skillItems']) ? $cv['skillItems'] : (!empty($cv['skills']) ? collect(explode(',', $cv['skills']))->map(fn($s) => ['name' => trim($s), 'level' => ''])->all() : [
                            ['name' => 'Excel', 'level' => ''], ['name' => 'SQL', 'level' => ''], ['name' => 'Python', 'level' => ''], ['name' => 'Power BI', 'level' => ''], ['name' => 'Data Visualization', 'level' => ''], ['name' => 'Statistics', 'level' => ''], ['name' => 'Machine Learning', 'level' => '']
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

                <!-- Right Column: Experience & Projects -->
                <div class="col-right">
                    <!-- Experience -->
                    @if (!empty($cv['experience']))
                        <div class="section-header">
                            <span class="section-icon">💼</span>
                            <span class="section-title">Experience</span>
                        </div>
                        @foreach ($cv['experience'] as $exp)
                            @if (!empty($exp['position']) || !empty($exp['company']))
                                <div class="item-entry">
                                    <div class="item-title">{{ $exp['position'] ?? 'Data Analyst Intern' }}</div>
                                    <div class="item-meta">{{ collect([$exp['company'] ?? 'Data Insights Pvt. Ltd.', collect([$exp['startDate'] ?? '', !empty($exp['current']) ? 'Present' : ($exp['endDate'] ?? '')])->filter()->join(' – ')])->filter()->join(' | ') }}</div>
                                    @if (!empty($exp['description']))
                                        <div class="item-desc">{{ $exp['description'] }}</div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    @endif

                    <!-- Projects -->
                    @if (!empty($cv['projects']))
                        <div class="section-header" style="margin-top: 4mm;">
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
                    @endif
                </div>
            </div>

            <!-- Key Skills / Expertise -->
            <div class="badges-table">
                <div class="badge-cell">
                    <div class="badge-box">
                        <div class="badge-icon">📊</div>
                        <div class="badge-text">Analytical Thinking</div>
                    </div>
                </div>
                <div class="badge-cell">
                    <div class="badge-box">
                        <div class="badge-icon">⚡</div>
                        <div class="badge-text">Problem Solving</div>
                    </div>
                </div>
                <div class="badge-cell">
                    <div class="badge-box">
                        <div class="badge-icon">🎯</div>
                        <div class="badge-text">Attention to Detail</div>
                    </div>
                </div>
                <div class="badge-cell">
                    <div class="badge-box">
                        <div class="badge-icon">💬</div>
                        <div class="badge-text">Effective Communication</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
