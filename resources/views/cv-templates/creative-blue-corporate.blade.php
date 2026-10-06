<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $cv['name'] ?? 'Professional CV' }}</title>
    <style>
        @page { size: A4; margin: 0; }
        * { box-sizing: border-box; }
        body { margin: 0; color: #1e293b; font: 10px/1.55 system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: #f8fafc; }
        .header { padding: 36px 32px; background: linear-gradient(135deg, #0891b2 0%, #1e3a8a 100%); color: #fff; position: relative; }
        .header .wave-shape { position: absolute; left: 0; bottom: 0; width: 100%; height: 50%; background: rgba(255,255,255,.2); border-radius: 0 0 50% 50%; }
        .identity { position: relative; z-index: 1; display: table; width: 100%; }
        .photo, .identity-main { display: table-cell; vertical-align: middle; }
        .photo { width: 110px; }
        .photo img { width: 88px; height: 88px; border: 3px solid #fff; border-radius: 50%; object-fit: cover; box-shadow: 0 4px 12px rgba(0,0,0,.2); }
        .identity-main { padding-left: 28px; }
        .title { color: #cfeefa; font-size: 8px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; }
        .name { margin: 6px 0 0; color: #fff; font-size: 28px; font-weight: 800; }
        .body { display: table; width: 100%; padding: 36px 32px; }
        .left, .right { display: table-cell; vertical-align: top; }
        .left { width: 35%; padding-right: 28px; border-right: 1px solid rgba(255,255,255,.2); }
        .right { padding-left: 28px; }
        .section { margin-bottom: 26px; }
        .heading { margin: 0 0 8px; padding-bottom: 4px; border-bottom: 2px solid #67e8f9; color: #67e8f9; font-size: 8px; letter-spacing: 1.5px; text-transform: uppercase; }
        .copy { color: #94a3b8; }
        .skills .pill { display: inline-block; margin: 0 6px 5px 0; padding: 4px 8px; background: #1e3a8a; color: #67e8f9; border-radius: 20px; font-size: .75rem; }
        .right .contact p { margin: 0 0 8px; }
        .right .contact b { color: #94a3b8; }
        .watermark { position: fixed; top: 0; left: 0; width: 794px; height: 1123px; z-index: -1; }
        .watermark span { display: block; width: 794px; height: 1123px; padding-top: 619px; color: #e2e8f0; font-size: 77px; font-weight: bold; line-height: 1.039; text-align: center; white-space: nowrap; transform: rotate(-30deg); }
    </style>
</head>
<body>
    <div class="watermark"><span>{{ $watermarkText ?? trim(($cv['name'] ?? '').' CV') }}</span></div>
    <header class="header"><div class="wave-shape"></div><div class="identity">
        @if (!empty($cv['photo']) && str_starts_with($cv['photo'], 'data:image/'))<div class="photo"><img src="{{ $cv['photo'] }}" alt="Profile photo"></div>@endif
        <div class="identity-main"><div class="title">{{ $cv['headline'] ?? 'Professional title' }}</div><h1 class="name">{{ $cv['name'] ?? 'Your Name' }}</h1></div>
    </div></header>
    <div class="body">
        <aside class="left">
            <section class="section contact"><h2 class="heading">Contact</h2>@foreach ([['Phone', 'phone'], ['Email', 'email'], ['Location', 'location'], ['Website', 'website'], ['LinkedIn', 'linkedin'], ['GitHub', 'github']] as [$label, $key]) @if (!empty($cv[$key]))<p><b>{{ $label }}:</b> {{ $cv[$key] }}</p>@endif @endforeach</section>
            @if (!empty($cv['skills']))<section class="section"><h2 class="heading">Skills</h2><div class="skills">@foreach (array_filter(array_map('trim', explode(',', $cv['skills']))) as $skill)<span class="pill"><b>✓</b> {{ $skill }}</span>@endforeach</div></section>@endif
            @if (!empty($cv['languages']))<section class="section"><h2 class="heading">Languages</h2>@foreach ($cv['languages'] as $language) @if (!empty($language['name']))<p class="copy"><strong>{{ $language['name'] }}</strong><br>{{ $language['level'] ?? '' }}</p>@endif @endforeach</section>@endif
        </aside>
        <main class="right">
            @if (!empty($cv['projects']))<section class="section"><h2 class="heading">Projects</h2>@foreach ($cv['projects'] as $project) @if (!empty($project['name']))<div class="item"><div class="item-title">{{ $project['name'] }}</div><div class="meta">{{ $project['role'] ?? '' }}{{ !empty($project['technologies']) ? ' / '.$project['technologies'] : '' }}</div>@if (!empty($project['description']))<div class="copy">{{ $project['description'] }}</div>@endif</div>@endforeach</section>@endif
            <section class="section"><h2 class="heading">About Me</h2><p class="copy">{{ $cv['summary'] ?? 'Your professional summary will appear here.' }}</p></section>
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
    </div>
</body>
</html>