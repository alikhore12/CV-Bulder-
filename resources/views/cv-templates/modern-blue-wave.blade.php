<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #1e293b; font: 10px/1.55 system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: #fff; }
        .header { height: 165px; position: relative; overflow: hidden; padding: 40px 44px; background: #fff; }
        .wave-shape { position: absolute; left: -5%; top: -10%; width: 110%; height: 200%; background: linear-gradient(180deg, #1e3a8a 0%, #0891b2 100%); border-radius: 50% 50% 0 0; transform: skewY(-6deg); z-index: 0; }
        .wave-shape-two { position: absolute; right: -10%; bottom: -20%; width: 110%; height: 180%; background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); border-radius: 50% 50% 0 0; transform: skewY(6deg); z-index: 0; opacity: .5; }
        .identity { position: relative; z-index: 1; display: table; width: 100%; }
        .photo, .identity-main { display: table-cell; vertical-align: middle; }
        .photo { width: 120px; }
        .photo img { width: 96px; height: 96px; border: 4px solid #fff; border-radius: 50%; object-fit: cover; box-shadow: 0 4px 12px rgba(0,0,0,.15); }
        .title { color: #0f172a; font-size: 9px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; }
        .name { margin: 8px 0 0; color: #1e293b; font-size: 28px; font-weight: 800; }
        .body { display: table; width: 100%; padding: 44px 44px; }
        .left, .right { display: table-cell; vertical-align: top; }
        .left { width: 32%; padding-right: 32px; border-right: 1px solid #e2e8f0; }
        .right { padding-left: 32px; }
        .section { margin-bottom: 28px; }
        .heading { margin: 0 0 10px; padding-bottom: 6px; border-bottom: 3px solid #1e3a8a; color: #1e3a8a; font-size: 9px; letter-spacing: 2px; text-transform: uppercase; }
        .copy { color: #64748b; font-size: .87rem; line-height: 1.5; }
        .contact p { margin: 0 0 10px; }
        .contact b, .meta, .skills b { color: #1e3a8a; }
        .skills span { display: inline-block; margin: 0 12px 7px 0; }
        .awards div { background: #f1f5f9; padding: 8px 12px; margin: 6px 0; border-radius: 6px; }
        .footer { height: 24px; background: #1e293b; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #cbd5e1; font-size: 77px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <header class="header"><div class="wave-shape"></div><div class="wave-shape-two"></div><div class="identity">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="identity-main"><div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div><h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1></div>
    </div></header>
    <div class="body">
        <aside class="left">
            <section class="section contact"><h2 class="heading">Contact</h2>@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin'], ['GitHub', 'github']] as [$label, $key]) @if (!empty($cv[$key]))<p><b>{{ $label }}:</b> {{ $cv[$key] }}</p>@endif @endforeach</section>
            @if (!empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span><b>✓</b> {{ $skill }}</span>@endforeach</div></section>@endif
            @if (!empty($cv['awards']))<section class="section"><h2 class="heading">Awards</h2><div>@foreach ($cv['awards'] as $award) <div>{{ $award }}</div>@endforeach</div></section>@endif
        </aside>
        <main class="right">
            @if (!empty($cv['projects']))<section class="section"><h2 class="heading">Projects</h2>@foreach ($cv['projects'] as $project) @if (!empty($project['name']))<div class="item"><div class="item-title">{{ $project['name'] }}</div><div class="meta">{{ $project['role'] ?? '' }}{{ !empty($project['technologies']) ? ' / '.$project['technologies'] : '' }}</div>@if (!empty($project['description']))<div class="copy">{{ $project['description'] }}</div>@endif</div>@endforeach</section>@endif
            <section class="section"><h2 class="heading">Profile</h2><p class="copy">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
            <section class="section"><h2 class="heading">Education</h2>
                @foreach ($cv['education'] ?? [] as $education)
                    @if (!empty($education['degree']) || !empty($education['institution']))
                        <div class="item"><div class="item-title">{{ $education['degree'] ?? 'Degree name' }}{{ !empty($education['field']) ? ' / '.$education['field'] : '' }}</div>
                            <div class="meta">{{ $education['institution'] ?? '' }}{{ !empty($education['startYear']) || !empty($education['endYear']) ? ' · '.($education['startYear'] ?? '').' – '.($education['endYear'] ?? '') : '' }}</div>
                            @if (!empty($education['totalMarks']) || !empty($education['obtainedMarks']) || !empty($education['percentage']))<div class="meta">@if (!empty($education['obtainedMarks']))Obtained: {{ $education['obtainedMarks'] }} · @endif @if (!empty($education['totalMarks']))Total: {{ $education['totalMarks'] }} · @endif @if (!empty($education['percentage']))Percentage: {{ $education['percentage'] }}@endif</div>@endif
                            @if (!empty($education['description']))<div class="copy">{{ $education['description'] }}</div>@endif
                        </div>
                    @endif
                @endforeach
            </section>
            <section class="section"><h2 class="heading">Experience</h2>@foreach ($cv['experience'] ?? [] as $experience) @if (!empty($experience['position']) || !empty($experience['company']))<div class="item"><div class="item-title">{{ $experience['position'] ?? 'Job position' }}</div><div class="meta">{{ $experience['company'] ?? '' }} · {{ $experience['startDate'] ?? '' }} – {{ !empty($experience['current']) ? 'Present' : ($experience['endDate'] ?? '') }}</div><div class="copy">{{ $experience['description'] ?? '' }}</div></div>@endif @endforeach</section>
            @if (!empty($cv['certifications']))<section class="section"><h2 class="heading">Certifications</h2>@foreach ($cv['certifications'] as $certification) @if (!empty($certification['name']))<div class="item"><div class="item-title">{{ $certification['name'] }}</div><div class="meta">{{ $certification['organization'] ?? '' }} · {{ $certification['date'] ?? '' }}</div></div>@endif @endforeach</section>@endif
        </main>
    </div><footer class="footer"></footer>
</body>
</html>